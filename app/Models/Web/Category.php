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

    public function getCategoryProject(){
        return DB::table("category")->select('id','name','jp_name')->whereIn('id',function($query) {
            $query->select('category_id')->from('project')
                ->orderByRaw('ISNULL(position), position ASC')
                ->orderBy('id','DESC');
        })->get();
    }
}
