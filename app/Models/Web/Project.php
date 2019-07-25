<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name', 'overview', 'author_name', 'author_email', 'author_phone', 'status', 'jp_name', 'jp_overview', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Web\Category', 'category_id', 'id');
    }

    public function getAllProject()
    {
//        return DB::table($this->table)
//            ->select('name','author_name', 'status', 'jp_name', 'category_id')
//            ->get();

        return Project::select('name','author_name', 'status', 'jp_name', 'category_id')->paginate(10);
    }
}
