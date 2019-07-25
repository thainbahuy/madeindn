<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'Project';

    public function getAllProject()
    {
        return DB::table($this->table)
            ->select('name', 'author_name')
            ->take(6)->get();
    }
}
