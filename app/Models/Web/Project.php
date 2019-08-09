<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helpers;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name', 'overview', 'author_name', 'author_email', 'author_phone', 'status', 'jp_name', 'jp_overview', 'category_id', 'position'];

    function __construct()
    {
        $this->config = Helpers::getConfig()['HomePage'];
    }

    public function activeProject($q)
    {
        return $q->where('status', 1)->where('category_id', '<>', null);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Web\Category', 'category_id', 'id');
    }

    public function getAllProject()
    {
        return Project::select('id', 'name', 'author_name', 'image_link', 'status', 'jp_name', 'category_id')
            ->where(function ($q) {
                $this->activeProject($q);
            })
            ->where(function ($q) {
                $this->activeProject($q);
            })
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id','DESC')
            ->paginate(10);
    }

    public function getProjectByCategory($id)
    {
        return Project::select('id', 'name', 'author_name', 'image_link', 'status', 'jp_name', 'category_id')
            ->where('category_id', $id)
            ->where(function ($q) {
                $this->activeProject($q);
            })->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id','DESC')
            ->paginate($this->config['listProjectPaginate']);
    }

    public function getProjectById($id)
    {
        return Project::select('id', 'name', 'author_name', 'image_link', 'status', 'jp_name', 'overview', 'jp_overview', 'author_description', 'author_description_jp')
            ->where('id', $id)
            ->where(function ($q) {
                $this->activeProject($q);
            })->first();
    }

    public function getProjectSearch($request)
    {
        $filters = [
            'key_word' => $request->get('key_word'),
            'category' => $request->get('category'),
        ];

        return Project::select('id', 'name', 'author_name', 'image_link', 'status', 'jp_name', 'category_id')
            ->where(function ($query) use ($filters) {
                if (!empty($filters['category'])) {
                    $query->where('category_id', $filters['category']);
                }
                if (!empty($filters['key_word'])) {
                    $query->where('name', 'like', '%' . $filters['key_word'] . '%')
                        ->orWhere('author_name', ' like', '%' . $filters['key_word'] . '%')
                        ->orWhere('author_email', ' like', '%' . $filters['key_word'] . '%')
                        ->orWhere('author_phone', ' like', '%' . $filters['key_word'] . '%')
                        ->orWhere('jp_name', ' like', '%' . $filters['key_word'] . '%');
                }
            })
            ->where(function ($q) {
                $this->activeProject($q);
            })
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id','DESC')
            ->paginate($this->config['listProjectPaginate']);
    }
}
