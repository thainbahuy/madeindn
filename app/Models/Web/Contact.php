<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['name', 'email', 'mobile', 'title', 'content'];

    public function addContact($name,$email,$mobile,$title,$content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->title = $title;
        $this->content = $content;

        return $this->save();
    }
}

