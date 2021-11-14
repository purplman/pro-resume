@extends('front.layouts.master')
@section('title', 'Resume - ' . auth()->user()->fullname())
@section('content')
    <section>
        <div class="resume">
            <div class="row">
                <div class="col-md-4">
                    <h1>{{ auth()->user()->fullname() }}</h1>
                    <p>{{ $resume->profession }}</p>

                    <h3>Contact</h3>
                    <ul>
                        <li>
                            <span>Phone</span>
                            <span>{{ $resume->contact->phone }}</span>
                        </li>
                        <li>
                            <span>Email</span>
                            <span>{{ $resume->contact->email }}</span>
                        </li>
                        <li>
                            <span>Address</span>
                            <span>{{ $resume->contact->address }}</span>
                        </li>
                        <li>
                            <span>Linkedin</span>
                            <span>{{ $resume->contact->linkedin }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <h3>Profile</h3>
                    <p>{{ $resume->description }}</p>

                    <h3>Experiences</h3>
                    <ul>
                        @foreach ($resume->experiences as $exp)
                            <li>
                                <h6>{{ $exp->employeer }} // {{ $exp->title }}</h6>
                                <p>{{ $exp->tasks }}</p>
                            </li>
                        @endforeach
                    </ul>
                    <h3>Education</h3>
                    <ul>
                        @foreach ($resume->educations as $edu)
                            <li>
                                <h6>{{ $edu->school_name }} // {{ $edu->field }} {{ $edu->degree ? '// ' . $edu->degree : ''}}</h6>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection