<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResumeContactRequest;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Services\{
    UserService,
    ResumeService
};

class ResumeController extends Controller
{

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = ResumeService::getTemplates();
        return view('front.resumes.create.template', compact('templates'));
    }


    /**
     * Set a template for the new resume.
     *
     * @return \Illuminate\Http\Response
     */

    public function setTemplate($id)
    {
        ResumeService::setTemplate($id);
        return redirect()->route('resumes.create.contact');
    }


    public function contact()
    {

        return view('front.resumes.create.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResumeContactRequest $request)
    {
        $contacts   = $request->except('profession');
        $profession = $request->profession; 

        session()->put('profession', $profession);

        $createContacts = UserService::storeContacts($contacts);

        return $createContacts;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        //
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
