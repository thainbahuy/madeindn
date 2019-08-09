<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Background extends Model
{
    protected $table = 'background';
    protected $fillable = ['image_link', 'home', 'event'];

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

    public function getBackgroundHome(){
        return DB::table($this->table)
            ->select('id', 'image_link', 'home', 'event','created_at')
            ->where('home', 1)
            ->first();
    }

    public function changeBackgroundHome($new_link)
    {
        return DB::table($this->table)
            ->where('home', '1')
            ->update(['image_link' => $new_link]);
    }
}
