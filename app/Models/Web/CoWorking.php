<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CoWorking extends Model
{
    protected $table = 'Co_working';

    public function getAllCoworking()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'image_link')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id','DESC')
            ->get();
    }

    public function getCoworking($id)
    {
        return DB::table($this->table)
            ->select('id', 'overview', 'jp_overview', 'image_link', 'location', 'jp_location', 'social_link', 'name', 'jp_name')
            ->where('id', $id)
            ->first();
    }
}
