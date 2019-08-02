<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helpers;

class ProjectSubmit extends Model
{
    protected $table = 'project_submit';
    protected $fillable = ['author_name', 'author_email', 'author_phone', 'author_address', 'content', 'name', 'image_link', 'content_link'];

    public function addProject($request)
    {
        $request->content_link = json_encode($request->content_link);
        $this->author_name = $request->name;
        $this->author_email = $request->email;
        $this->author_phone = $request->phone;
        $this->author_address = $request->address;
        $this->content = $request->content;
        $this->name = $request->name_startup;
        $this->link_driver = $request->link_driver;
        $this->image_link = $request->new_name;
        $this->content_link = $request->content_link;
        return $this->save();
    }
}
