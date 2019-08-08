<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name', 'overview', 'author_name', 'author_email', 'author_phone', 'status', 'jp_name', 'jp_overview', 'category_id', 'position'];

    public function info_customer()
    {
        return $this->hasMany('App\Models\Admin\Customer','id', 'product_id');
    }


}
