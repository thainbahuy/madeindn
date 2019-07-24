<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $table = 'Event';

    public function getAllEvents()
    {
        return DB::table($this->table)
            ->select('id', 'jp_name', 'name', 'image_link', 'sort_description', 'jp_sort_description', 'date_time')
            ->paginate(5);
    }

    public function getEventById($id)
    {
        return DB::table($this->table)
            ->select('date_time', 'overview', 'image_link', 'jp_overview', 'location', 'jp_location','begin_time','end_time')
            ->where('id', $id)
            ->first();
    }
}
