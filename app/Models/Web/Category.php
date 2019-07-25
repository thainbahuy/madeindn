<?php

namespace App\Models\Web;

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

    public function getAllCategory()
    {
        return DB::table($this->table)
            ->select('name', 'jp_name', 'id')
            ->get();
    }
}
