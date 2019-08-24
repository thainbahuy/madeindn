<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name', 'name_ascii', 'position'];

    public function projects()
    {
        return $this->hasMany('App\Models\Web\Project');
    }

    public function deleteCategory($id){
        return DB::table($this->table)
            ->where('id',$id)
            ->delete();
    }

    public function addCategory($name, $name_jp, $position, $slug_name){
        $this->name = $name;
        $this->jp_name = $name_jp;
        $this->position = $position;
        $this->slug_name = $slug_name;
        return $this->save();
    }

    public function getCategoryById($id)
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'position')
            ->where('id', $id)
            ->first();
    }

    public function editCategory($id, $name, $name_jp, $position,$slug_name){
        $infoCategory = $this->findOrfail($id);
        $infoCategory->name = $name;
        $infoCategory->slug_name = $slug_name;
        $infoCategory->jp_name = $name_jp;
        $infoCategory->position = $position;
        return $infoCategory->save();
    }

    public function getAllCategory() {
        return DB::table($this->table)->select('id','name','jp_name','position','created_at')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id','DESC');
    }

}
