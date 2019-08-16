<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CoWorking extends Model
{
    protected $table = 'co_working';

    public function getAllCoworking()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'jp_name', 'image_link', 'position', 'created_at')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function getCoworking($id)
    {
        return DB::table($this->table)
            ->select('id', 'overview', 'jp_overview', 'image_link', 'location', 'jp_location', 'social_link', 'name', 'jp_name', 'position')
            ->where('id', $id)
            ->first();
    }

    public function deleteCoworking($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function addCoworking($name, $name_jp, $overview, $overview_jp, $location, $location_jp, $image_link, $postion, $social_link)
    {
        $this->name = $name;
        $this->jp_name = $name_jp;
        $this->overview = $overview;
        $this->jp_overview = $overview_jp;
        $this->location = $location;
        $this->jp_location = $location_jp;
        $this->image_link = $image_link;
        $this->position = $postion;
        $this->social_link = $social_link;

        return $this->save();
    }

    public function editCoworking($id, $name, $name_jp, $overview, $overview_jp, $location, $location_jp, $image_link, $postion, $social_link)
    {
        $infoCoworking = $this->findOrFail($id);

        $infoCoworking->name = $name;
        $infoCoworking->jp_name = $name_jp;
        $infoCoworking->overview = $overview;
        $infoCoworking->jp_overview = $overview_jp;
        $infoCoworking->location = $location;
        $infoCoworking->jp_location = $location_jp;
        $infoCoworking->image_link = $image_link;
        $infoCoworking->position = $postion;
        $infoCoworking->social_link = $social_link;

        return $infoCoworking->save();
    }

    public function coutCoworking()
    {
        return DB::table($this->table)
            ->count();
    }
}
