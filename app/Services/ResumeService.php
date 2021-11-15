<?php 

namespace App\Services;

use App\Models\Template;
use Exception;

class ResumeService {

    // Response status codes
    const CREATED = 201;

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
     * Update resume template_id column
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
        for($i = 0; $i < count($skill->names); $i++) {
            auth()->user()->resume->skills()->create([
                'resume_id'   => auth()->user()->resume->id,
                'name'  =>  $skill->names[$i],
                'level' =>  $skill->levels[$i],
            ]);
        }
        return response('Skills added succesfully', self::CREATED);
    }

    /**
     * Store languages.
     *
     * @param  String $id
     * @return \Illuminate\Http\Response
     */
    public static function storeLanguages($language) 
    {
        for($i = 0; $i < count($language->names); $i++) {
            auth()->user()->resume->languages()->create([
                'resume_id'   => auth()->user()->resume->id,
                'name'  =>  $language->names[$i],
                'level' =>  $language->levels[$i],
            ]);
        }
        return response('Languages added succesfully', self::CREATED);
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