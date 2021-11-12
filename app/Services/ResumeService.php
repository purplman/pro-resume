<?php 

namespace App\Services;

use App\Models\Template;

class ResumeService {

    public static function getTemplates()
    {
        return Template::all();
    }

    public static function setTemplate($id) 
    {
        auth()->user()->resume()->update([
            'template_id' => $id
        ]);

        return true;
    }

}