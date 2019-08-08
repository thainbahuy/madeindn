<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name', 'overview', 'author_name', 'author_email', 'author_phone', 'status', 'jp_name', 'jp_overview', 'category_id', 'position'];

    public function category()
    {
        return $this->belongsTo('App\Models\Web\Category', 'category_id', 'id');
    }

    public function info_customer()
    {
        return $this->hasMany('App\Models\Admin\Customer');
    }


    public function getAllProject()
    {
        return Project::select('id', 'name', 'author_name', 'image_link', 'status', 'jp_name', 'category_id', 'position', 'created_at')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id', 'DESC');
    }

    public function getProjectById($id)
    {
        return Project::select('id', 'name', 'author_name', 'author_email', 'author_phone', 'image_link', 'status', 'jp_name', 'overview', 'jp_overview', 'author_description', 'author_description_jp', 'category_id', 'position')
            ->where('id', $id)
            ->first();
    }

    public function deleteProject($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function addProject($name, $overview, $author_name, $author_email, $author_phone, $status, $name_jp, $overview_jp, $category_id, $image_link, $author_description, $author_description_jp, $position)
    {
        $this->name = $name;
        $this->overview = $overview;
        $this->author_name = $author_name;
        $this->author_email = $author_email;
        $this->author_phone = $author_phone;
        $this->status = $status;
        $this->jp_name = $name_jp;
        $this->jp_overview = $overview_jp;
        $this->category_id = $category_id;
        $this->image_link = $image_link;
        $this->author_description = $author_description;
        $this->author_description_jp = $author_description_jp;
        $this->position = $position;

        return $this->save();
    }

    public function editProject($id, $name, $overview, $author_name, $author_email, $author_phone, $status, $name_jp, $overview_jp, $category_id, $image_link, $author_description, $author_description_jp, $position)
    {
        $infoCoworking = $this->findOrfail($id);

        $infoCoworking->name = $name;
        $infoCoworking->overview = $overview;
        $infoCoworking->author_name = $author_name;
        $infoCoworking->author_email = $author_email;
        $infoCoworking->author_phone = $author_phone;
        $infoCoworking->status = $status;
        $infoCoworking->jp_name = $name_jp;
        $infoCoworking->jp_overview = $overview_jp;
        $infoCoworking->category_id = $category_id;
        $infoCoworking->image_link = $image_link;
        $infoCoworking->author_description = $author_description;
        $infoCoworking->author_description_jp = $author_description_jp;
        $infoCoworking->position = $position;

        return $infoCoworking->save();
    }

    public function changeStatus($id, $status)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => $status]);
    }

}
