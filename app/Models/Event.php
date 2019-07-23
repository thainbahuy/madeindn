<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $table = 'Event';

    public function getAllEvents($page)
    {
        $offset = 5*$page;
        return DB::table($this->table)
            ->select('name', 'image_link', 'sort_description', 'date_time')
            ->offset($offset)
            ->limit(5)
            ->get();
    }
}
