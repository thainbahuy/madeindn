<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Background extends Model
{
    protected $table = 'background';
    public function getBackgroundEvent(){
        return DB::table($this->table)
            ->where('event','1')
            ->select('image_link')
            ->first();
    }

    public function updateBackground($image_link){
        return DB::table($this->table)
            ->where('event','1')
            ->update(['image_link' => $image_link]);
    }
}
