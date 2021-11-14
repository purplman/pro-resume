<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResumeContactRequest;
use App\Http\Requests\StoreResumeDescriptionRequest;
use App\Http\Requests\StoreResumeEducationRequest;
use App\Http\Requests\StoreResumeExperienceRequest;
use App\Http\Requests\StoreResumeLanguageRequest;
use App\Http\Requests\StoreResumeSkillRequest;
use App\Models\Resume;
use App\Services\ResumeService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->resumeService = new ResumeService;
        $this->userService   = new userService;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function template()
    {
        $templates = $this->resumeService->getTemplates();
        return view('front.resumes.create.template', compact('templates'));
    }


    /**
     * Set a template for the resume.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handleTemplate(Request $request)
    {
        $this->resumeService->setTemplate($request->id);
        return redirect()->route('resumes.create.contact');
    }

    /**
     * Show the form to enter contact details.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('front.resumes.create.contact');
    }

    /**
     * Store contact details.
     *
     * @param  \Illuminate\Http\Requests\StoreResumeContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handleContact(StoreResumeContactRequest $request)
    {
        $this->resumeService->storeContacts($request);
        $this->resumeService->updateProfession($request->profession);
        return redirect()->route('resumes.create.experience');
    }

    /**
     * Show the form to enter work history details.
     *
     * @return \Illuminate\Http\Response
     */
    public function experience()
    {
        return view('front.resumes.create.experience');
    }

    /**
     * Store work history details.
     *
     * @param  \Illuminate\Http\Requests\StoreResumeExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handleExperience(StoreResumeExperienceRequest $request)
    {
        $this->resumeService->storeExperiences($request);
        return redirect()->route('resumes.create.education');
    }

    /**
     * Show the form to enter education details.
     *
     * @return \Illuminate\Http\Response
     */
    public function education()
    {
        return view('front.resumes.create.education');
    }

    /**
     * Store education details
     *
     * @param  \Illuminate\Http\Requests\StoreResumeEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handleEducation(StoreResumeEducationRequest $request)
    {
        $this->resumeService->storeEducation($request);
        return redirect()->route('resumes.create.skill');
    }

    /**
     * Show the form to enter skill details.
     *
     * @return \Illuminate\Http\Response
     */
    public function skill()
    {
        return view('front.resumes.create.skill');
    }

    /**
     * Store skill details.
     *
     * @param  \Illuminate\Http\Requests\StoreResumeSkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handleSkill(StoreResumeSkillRequest $request)
    {
        $this->resumeService->storeSkills($request);
        return redirect()->route('resumes.create.language');
    }

    /**
     * Show the form to enter language details.
     *
     * @return \Illuminate\Http\Response
     */
    public function language()
    {
        return view('front.resumes.create.language');
    }

    /**
     * Store language details.
     *
     * @param  \Illuminate\Http\Requests\StoreResumeLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handleLanguage(StoreResumeLanguageRequest $request)
    {
        $this->resumeService->storeLanguages($request);
        return redirect()->route('resumes.create.description');
    }
    
    /**
     * Show the form to enter description.
     *
     * @return \Illuminate\Http\Response
     */
    public function description()
    {
        return view('front.resumes.create.description');
    }

    /**
     * Store language details.
     *
     * @param  \Illuminate\Http\Requests\StoreResumeDescriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handleDescription(StoreResumeDescriptionRequest $request)
    {
        $this->resumeService->updateDescription($request->description);
        return redirect()->route('home');
    }


    // ------------------------------------------------- to be handled later 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $resume = Resume::where('user_id', auth()->id())->with('contact', 'experiences', 'educations', 'skills', 'languages')->first();
        return view('front.resumes.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
