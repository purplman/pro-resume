<?php 

namespace App\Services;

use App\Models\Template;
use Exception;

class ResumeService {

    // Response status codes
    const CREATED = 201;
    const ACCEPTED = 202;

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
        return response('Contact details added succesfully', self::CREATED);
    }
    
    /**
     * Store experience.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeExperiences($experience) 
    {
        for($i = 0; $i < count($experience->title); $i++) {
            auth()->user()->resume->experiences()->create([
                'resume_id'  => auth()->user()->resume->id,
                'title'      => $experience->title[$i],
                'employeer'  => $experience->employeer[$i],
                'start_date' => $experience->start_date[$i],
                'end_date'   => $experience->end_date[$i],
                'tasks'      => $experience->tasks[$i],
                'current'    => isset($experience->current[$i]) ? 1 : 0
            ]);
        }
        return response('Work history added succesfully', self::CREATED);
    }

    /**
     * Store education.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeEducation($education) 
    {
        for($i = 0; $i < count($education->school_name); $i++) {
            auth()->user()->resume->educations()->create([
                'school_name' => $education->school_name[$i],
                'field'       => $education->field[$i],
                'degree'      => $education->degree[$i],
                'start_date'  => $education->start_date[$i],
                'end_date'    => $education->end_date[$i],
                'current'     => isset($education->current[$i]) ? 1 : 0,
            ]);
        }
        return response('Education history added succesfully', self::CREATED);
    }

    /**
     * Store skills.
     *
     * @param  String $id
     * @return Boolean
     */
    public static function storeSkills($skill) 
    {
        for($i = 0; $i < count($skill->name); $i++) {
            auth()->user()->resume->skills()->create([
                'resume_id'   => auth()->user()->resume->id,
                'name'  =>  $skill->name[$i],
                'level' =>  $skill->level[$i],
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
        for($i = 0; $i < count($language->name); $i++) {
            auth()->user()->resume->languages()->create([
                'resume_id'   => auth()->user()->resume->id,
                'name'  =>  $language->name[$i],
                'level' =>  $language->level[$i],
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
        return response('Your resume is ready to review', self::ACCEPTED);
    }
}