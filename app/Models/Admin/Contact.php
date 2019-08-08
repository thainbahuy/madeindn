<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['name', 'email', 'mobile', 'title', 'content'];

    public function showInfoContact(){
        return DB::table($this->table)
            ->select('id', 'name', 'email', 'mobile', 'title', 'content', 'created_at')
            ->orderByDesc('id');
    }

    public function deleteInfoCustomer($id){
        return DB::table($this->table)
            ->where('id',$id)
            ->delete();
    }
}

