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

    public function addCategory($name, $name_jp, $position){
        $this->name = $name;
        $this->jp_name = $name_jp;
        $this->position = $position;
        return $this->save();
    }

    public function getCategoryById($id)
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'position')
            ->where('id', $id)
            ->first();
    }

    public function editCategory($id, $name, $name_jp, $position){
        $infoCategory = $this->findOrfail($id);
        $infoCategory->name = $name;
        $infoCategory->jp_name = $name_jp;
        $infoCategory->position = $position;
        return $infoCategory->save();
    }

}
