<?php

namespace App\Models\Web;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    protected $table = 'partner_background';

    public function getListBackground()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'image_link', 'position')
            ->orderByRaw('ISNULL(position), position ASC')
            ->orderByDesc('id')
            ->get();
    }

}
