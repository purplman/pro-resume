<?php 

namespace App\Services;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Template;
use Exception;

class ResumeService {

    /**
     * Get all resume templates
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function getTemplates()
    {
        $templates = Template::all();
        if(count($templates)) {
            return $templates;
        }
        else {
            throw new Exception('No templates found', 404);
        }
    }

    /**
     * Get all resume templates
     *
     * @param  String $id
     * @return Boolean
     */
    public static function setTemplate($id) 
    {
        auth()->user()->resume->update([
            'template_id' => $id
        ]);
        return true;
    }

    /**
     * Store contact details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function storeContacts($contacts)
    {
        auth()->user()->resume->contact()->updateOrCreate(
        [
            'resume_id' => auth()->user()->resume->id,
        ],
        [
            'email'     => $contacts->email,
            'phone'     => $contacts->phone,
            'city'      => $contacts->city,
            'address'   => $contacts->address,
            'linkedin'  => $contacts->linkedin,
        ]);
        return true;
    }

    /**
     * Update resume profession column
     *
     * @param  String $id
     * @return Boolean
     */
    public static function updateProfession($profession) 
    {
        auth()->user()->resume->update([
            'profession' => $profession
        ]);
        return true;
    }
    
    /**
     * Store experience.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeExperiences($experience) 
    {
        auth()->user()->resume->experiences()->create([
            'resume_id'  => auth()->user()->resume->id,
            'title'      => $experience->title,
            'employeer'  => $experience->employeer,
            'start_date' => $experience->start_date,
            'end_date'   => $experience->end_date,
            'current'    => $experience->current ? 1 : 0,
            'tasks'      => $experience->tasks
        ]);
        return true;
    }

    /**
     * Store education.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeEducation($education) 
    {
        auth()->user()->resume->educations()->create([
            'school_name' => $education->school_name,
            'field'       => $education->field,
            'start_date'  => $education->start_date,
            'end_date'    => $education->end_date,
            'current'     => $education->current ? 1 : 0,
        ]);
        return true;
    }

    /**
     * Store skills.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeSkills($skill) 
    {
        auth()->user()->resume->skills()->create([
            'resume_id'   => auth()->user()->resume->id,
            'name'  =>  $skill->name,
            'level' =>  $skill->level,
        ]);
        return true;
    }

    /**
     * Store languages.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeLanguages($language) 
    {
        auth()->user()->resume->languages()->create([
            'resume_id'   => auth()->user()->resume->id,
            'name'  =>  $language->name,
            'level' =>  $language->level,
        ]);
        return true;
    }

    /**
     * Update resume description column
     *
     * @param  String $id
     * @return Boolean
     */
    public static function updateDescription($description) 
    {
        auth()->user()->resume->update([
            'description' => $description
        ]);
        return true;
    }
}