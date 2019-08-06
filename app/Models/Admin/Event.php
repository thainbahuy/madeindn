<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $table = 'Event';

    public function getAllEvents($limit)
    {
        return DB::table($this->table)
            ->select('id', 'jp_name', 'name', 'image_link', 'sort_description', 'jp_sort_description', 'date_time','begin_time', 'end_time', 'position')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderByDesc('id')
            ->paginate($limit);
    }

    public function getEventById($id)
    {
        return DB::table($this->table)
            ->select('jp_name', 'name', 'date_time', 'overview', 'image_link', 'jp_overview', 'location', 'jp_location', 'begin_time', 'end_time', 'social_link')
            ->where('id', $id)
            ->first();
    }

    public function deleteEventById($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
