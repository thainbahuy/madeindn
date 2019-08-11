<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helpers;

class ProjectSubmit extends Model
{
    protected $table = 'project_submit';
    protected $fillable = ['author_name', 'author_email', 'author_phone', 'author_address', 'content', 'name', 'image_link', 'content_link'];


    public function showAllProject()
    {
        return DB::table($this->table)
            ->select('id', 'author_name', 'name', 'author_email', 'created_at')
            ->orderByDesc('id');
    }

    public function showDetailProjectById($id)
    {
        return DB::table($this->table)
            ->select('id', 'author_name', 'name', 'author_phone', 'author_address', 'content', 'content_link', 'link_driver', 'author_email', 'created_at')
            ->where('id', $id)
            ->first();
    }

    public function deleteProjectSubmit($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function coutProjectCustomer()
    {
        return DB::table($this->table)
            ->count();
    }

}
