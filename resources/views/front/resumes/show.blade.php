@extends('front.layouts.master')
@section('title', 'Resume - ' . auth()->user()->fullname())
@section('content')
    <section>
        <div class="resume">
            <div class="row">
                <div class="col-md-4">
                    <aside class="resume__sidebar">
                        <div class="resume__header">

                        </div>
                        <div class="resume__body">
                            <div class="resume__avatar">
                                <img src="{{ asset('img/avatar.JPG') }}" alt="">
                            </div>
                            <h1 class="resume__fullname">
                                <span>
                                {{ auth()->user()->firstname }}    
                                </span>
                                <span>
                                {{ auth()->user()->lastname }}    
                                </span>    
                            </h1>
                            <p class="resume__profession">{{ $resume->profession }}</p>
                
                            <div class="resume__block resume__block-contact">
                            <h2 class="resume__title">Contact</h2>
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

                            <div class="resume__block resume__block-skills">
                            <h2 class="resume__title">Skills</h2>
                                <ul>
                                    @foreach ($resume->skills as $skill)
                                    <li>
                                        <span>{{ $skill->name }}</span>
                                        @if ($skill->level)
                                        <div class="levels">
                                            @for($i = 0; $i < $skill->level; $i++)
                                            <span class="level level--filled"></span>
                                            @endfor
                                            @for($i = 0; $i < 5- $skill->level; $i++)
                                            <span class="level"></span>
                                            @endfor
                                        </div>
                                        @endif
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-8">
                    <div class="resume__main">
                        <div class="resume__block">
                            <h3 class="resume__title">Profile</h3>
                            <p class="resume__description">{{ $resume->description }}</p>
                        </div>

                        <div class="resume__block">
                            <h3 class="resume__title">Experiences</h3>
                            <div class="resume__description">
                                <ul>
                                    @foreach ($resume->experiences as $exp)
                                        <li>
                                            <div class="resume__subtitle">
                                                <div>
                                                    <span>
                                                        {{ $exp->employeer }}    
                                                    </span> 
                                                    // 
                                                    <span>
                                                        {{ $exp->title }}
                                                    </span>
                                                </div>
                                                <div>
                                                    {{ date('Y', strtotime($exp->start_date)) . ' - ' .  date('Y', strtotime($exp->end_date)) }}
                                                </div>
                                            </div>
                                            <p class="resume__text">{{ $exp->tasks }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        </div>
                        <div class="resume__block">
                            <h3 class="resume__title">Education</h3>
                            <div class="resume__description">
                                <ul>
                                    @foreach ($resume->educations as $edu)
                                    <li>
                                        <div class="resume__subtitle">
                                            <div>
                                                <span>
                                                    {{ $edu->school_name }}    
                                                </span> 
                                                // 
                                                <span>
                                                    {{ $edu->field }}
                                                </span>
                                                @if ($edu->degree)
                                                // 
                                                <span>
                                                    {{ $edu->degree }}
                                                </span>
                                                @endif
                                            </div>
                                            <div>
                                                {{ date('Y', strtotime($edu->start_date)) . ' - ' .  date('Y', strtotime($edu->end_date)) }}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection