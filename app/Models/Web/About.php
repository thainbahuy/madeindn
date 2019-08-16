<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class About extends Model
{
    protected $table = 'more';

    public function getAllAbout()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'description', 'jp_description', 'position', 'image_link')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function getAboutById($id)
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'description', 'jp_description', 'position', 'image_link')
            ->where('id', $id)
            ->first();
    }
}
