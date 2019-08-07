<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class About extends Model
{
    protected $table = 'More';

    public function getAllAbout()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'description', 'jp_description', 'position')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id','DESC')
            ->get();
    }
}
