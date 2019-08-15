<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'Category';
    protected $fillable = ['name', 'name_ascii', 'position'];

    public function projects()
    {
        return $this->hasMany('App\Models\Web\Project');
    }

    public function getCategoryProject(){
        return DB::table($this->table)->select('id','name','jp_name')->whereIn('id',function($query) {
            $query->select('category_id')->from('Project')
                ->orderByRaw('ISNULL(position), position ASC')
                ->orderBy('id','DESC');
        })->get();
    }
}
