<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'info_email_customer';
    protected $fillable = ['email_customer','mobile_customer','content_customer','product_id'];

}
