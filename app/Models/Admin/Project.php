<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'Project';
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
        return Project::select('id', 'name', 'author_name', 'author_email', 'author_phone', 'image_link', 'status', 'jp_name', 'overview', 'jp_overview', 'author_description', 'author_description_jp', 'category_id', 'position','author_avatar')
            ->where('id', $id)
            ->first();
    }

    public function deleteProject($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function addProject($name, $overview, $author_name, $author_email, $author_phone, $status, $name_jp, $overview_jp, $category_id, $image_link, $author_description, $author_description_jp, $position,$author_image)
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
        $this->author_avatar = $author_image;

        return $this->save();
    }

    public function editProject($id, $name, $overview, $author_name, $author_email, $author_phone, $status, $name_jp, $overview_jp, $category_id, $image_link, $author_description, $author_description_jp, $position,$author_image)
    {
        $infoProject = $this->findOrfail($id);

        $infoProject->name = $name;
        $infoProject->overview = $overview;
        $infoProject->author_name = $author_name;
        $infoProject->author_email = $author_email;
        $infoProject->author_phone = $author_phone;
        $infoProject->status = $status;
        $infoProject->jp_name = $name_jp;
        $infoProject->jp_overview = $overview_jp;
        $infoProject->category_id = $category_id;
        $infoProject->image_link = $image_link;
        $infoProject->author_description = $author_description;
        $infoProject->author_description_jp = $author_description_jp;
        $infoProject->position = $position;
        $infoProject->author_avatar = $author_image;

        return $infoProject->save();
    }

    public function changeStatus($id, $status)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => $status]);
    }

}
