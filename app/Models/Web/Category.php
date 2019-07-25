<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'Category';

    public function getAllCategory()
    {
        return DB::table($this->table)
            ->select('name')
            ->get();
    }
}
