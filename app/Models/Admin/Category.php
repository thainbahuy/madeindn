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

}
