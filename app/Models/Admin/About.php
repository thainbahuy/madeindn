<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class About extends Model
{
    protected $table = 'More';
    protected $fillable = ['name', 'jp_name', 'position', 'description', 'jp_description', 'image_link'];

    public function getAllAbout()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'description', 'jp_description', 'position', 'image_link', 'created_at')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function addAbout($name, $jp_name, $position, $description, $jp_description, $image_link)
    {
        $this->name = $name;
        $this->jp_name = $jp_name;
        $this->position = $position;
        $this->description = $description;
        $this->jp_description = $jp_description;
        $this->image_link = $image_link;
        return $this->save();
    }

    public function getAbout($id)
    {
        return DB::table($this->table)
            ->select('id', 'name', 'image_link', 'position', 'created_at')
            ->where('id', $id)
            ->first();
    }

    public function deleteAbout($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    function getAboutDetail($id)
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'description', 'jp_description', 'position', 'image_link')
            ->where('id', $id)
            ->first();
    }

    public function editAbout($id, $name, $jp_name, $position, $description, $jp_description, $image_link)
    {
        $infoAbout = $this->findOrFail($id);
        $infoAbout->name = $name;
        $infoAbout->jp_name = $jp_name;
        $infoAbout->position = $position;
        $infoAbout->description = $description;
        $infoAbout->jp_description = $jp_description;
        $infoAbout->image_link = $image_link;
        return $infoAbout->save();
    }
}