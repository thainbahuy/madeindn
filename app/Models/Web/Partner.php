<?php

namespace App\Models\Web;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    protected $table = 'Partner_Background';

    public function getListBackground()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'image_link', 'position')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderByDesc('id')
            ->get();
    }

//    public function getBackgroundById($id)
//    {
//        return DB::table($this->table)
//            ->where('id', $id)
//            ->select('image_link')
//            ->first();
//    }
//
//    public function addNewPartnerBackground($name, $image_link, $position)
//    {
//        return DB::table($this->table)
//            ->insert(
//                [
//                    'name' => $name,
//                    'image_link' => $image_link,
//                    'position' => $position,
//                    'created_at' => new DateTime,
//                    'updated_at' => new DateTime,
//                ]);
//
//    }
//
//    public function deletePartnerBackground($id)
//    {
//        return DB::table($this->table)
//            ->where('id', $id)
//            ->delete();
//    }
}
