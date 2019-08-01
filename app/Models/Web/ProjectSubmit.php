<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helpers;

class ProjectSubmit extends Model
{
    protected $table = 'project_submit';
    protected $fillable = ['author_name', 'author_email', 'author_phone', 'author_address', 'content', 'name', 'image_link', 'content_link'];

    public function addProject($request) {
        $image_startup = $request->file('image_startup');
        if (!is_null($image_startup)) {
            $request->fileName = rand(1, 5000) . $image_startup->getClientOriginalName();
            $image_startup->move( Helpers::getFileFromStorage("project_submit/image_project"), $request->fileName);
        } else {
            $request->fileName = '';
        }

        $files_startup = $request->file('files_startup');
        $arry_link = array();
        if ($files_startup) {
            foreach ($files_startup as $key => $valueFiles) {
                $name_file = rand(10000, 50000) . $valueFiles->getClientOriginalName();
                array_push($arry_link, $name_file);
                $valueFiles->move(Helpers::getFileFromStorage("project_submit/link_project"), $name_file);
            }
        }

        $request->content_link = json_encode($arry_link);
        $this->author_name = $request->name;
        $this->author_email = $request->email;
        $this->author_phone = $request->phone;
        $this->author_address = $request->address;
        $this->content = $request->content;
        $this->name = $request->name_startup;
        $this->link_driver = $request->link_driver;
        $this->image_link = $request->fileName;
        $this->content_link = $request->content_link;

        return $this->save();
    }
}
