<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'info_customer';
    protected $fillable = ['email_customer', 'mobile_customer', 'content_customer', 'product_id'];

    public function project()
    {
        return $this->belongsTo('App\Models\Admin\Project', 'product_id', 'id');
    }

    public function showInfoProjectDetails()
    {
        return Customer::select('id', 'email_customer', 'mobile_customer', 'content_customer', 'product_id', 'created_at')
            ->orderByDesc('id');
    }

    public function deleteInfoProjectCustomer($id){
        return DB::table($this->table)
            ->where('id',$id)
            ->delete();
    }

    public function countContatInProject()
    {
        return DB::table($this->table)
            ->count();
    }
}
