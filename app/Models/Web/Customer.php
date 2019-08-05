<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'info_customer';
    protected $fillable = ['email_customer','mobile_customer','content_customer','product_id'];

    public function postCustomer($request , $id){
        $this->email_customer = $request->email;
        $this->mobile_customer = $request->phone;
        $this->content_customer = $request->content_message;
        $this->product_id = $id;

        return $this->save();
    }
}
