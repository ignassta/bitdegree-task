@extends('layouts.main-layout')
@section('content')

<div class="container" id="top-statistics-holder">
    <div class="row">
        <div class="col-lg-4 text-right">
            <img  src="{{ asset('images/green-book-icon.png') }}" alt="">
            <div class="top-statistics-count">{{ $coursesStats['courses_total'] }}</div>
            <div class="top-statistics-text">{{ __('Courses Completed') }}</div>
        </div>
        <div class="col-lg-4 text-center">
            <img src="{{ asset('images/purple-medal-icon.png') }}" alt="">
            <div class="top-statistics-count">{{ $coursesStats['certificates_total'] }}</div>
            <div class="top-statistics-text">{{ __('Certificates Earned') }}</div>
        </div>
        <div class="col-lg-4 text-left">
            <img src="{{ asset('images/golden-clock-icon.png') }}" alt="">
            <div class="top-statistics-count">{{ $coursesStats['courses_duration_sum'] }}</div>
            <div class="top-statistics-text">{{ __('Hours Spent Studying') }}</div>
        </div>
    </div>
</div>
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-12">
                    <div class="column" id="progression-holder">
                        <h2>{{ __('Progression') }}</h2>
                        <div id="progression-inner-holder">
                            <img id="progression-award-icon" src="{{ asset('images/golden-award-icon.png') }}" alt="">
                            <p id="progression-lvl">Level {{ $xpStats['lvl'] }}</p>
                            <p id="progression-xp">{{ $xpStats['current_xp'] }} / {{ $xpStats['xp_to_lvl_up'] }} XP</p>
                            <div id="progression-rewards-holder">

                                @foreach($userBadges as $userBadge)

                                    <img title="{{ $userBadge->title }}" src="{{ asset($userBadge->link) }}" alt="">

                                @endforeach

                            </div>
                            <h2 id="progression-second-header">{{ __('Mastered On BitDegree') }}</h2>
                            <div class="progress-bar-holder">

                                @foreach($userProgresses as $userProgress)

                                <div class="progress-subject">{{ $userProgress['group-title'] }}</div>
                                <div class="progress-lvl">{{ group_completion_to_words($userProgress['completion-ratio']) }}</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: {{ $userProgress['completion-ratio'] }}%; background-color: {{ random_color() }};"
                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="recomendations-holder" class="column">
                        <h2>"{{ $usersRandomLecturer->quote_title }}</h2>
                        <p>{{ $usersRandomLecturer->quote }}"</p>
                        <div id="recomendations-person-holder">
                            <img id="recomendations-photo-holder" src="{{asset('images/man-photo.png')}}" alt="">
                            <div id="recomendations-name-holder">
                                <p>{{ $usersRandomLecturer->name }}</p>
                                <p>{{ $usersRandomLecturer->profession }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div class="col-12">
                    <div class="column" id="about-me-holder">
                        <p>{{ $user->about }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div id="featured-certificate-holder" class="column">
                        <div id="certificates-medal-holder">
                            <img id="certificates-medal" src="{{ asset('images/purple-medal-icon.png') }}" alt="">
                            <div id="certificates-count">{{ $coursesStats['certificates_total'] }}</div>
                        </div>
                        <div id="certificates-count-text">{{ __('Certificates Earned') }}</div>
                        <div id="featured-certificate-header">{{ __('Featured Certificate') }}</div>
                        <img id="featured-certificate-img" src="{{ asset('images/certificate-img.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-12">
                    <div id="earned-certificates-holder">
                        <h2 id="earned-certificates-header">{{ __('Certificates Earned') }}</h2>

                        @foreach($certificates as $certificate)

                        <div id="earned-certificates-inner-holder" class="row column">
                            <div class="col-2 earned-certificate-left-img-holder d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/olive-branches-icon.png') }}" alt="">
                            </div>
                            <div class="col-xl-6 col-10 earned-certificate-title-holder">
                                <p>{{ $certificate->title }}</p>
                                <div class="certificate-info">
                                    <span><i class="fa fa-user"></i>{{ $user->name }}</span>
                                    <span><i class="fa fa-calendar"></i>2019-02-10</span>
                                </div>
                            </div>
                            <div class="col-xl-4 download-btn-holder d-flex align-items-center justify-content-end">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary">{{ __('Download') }}</button>
                                    <button type="button" class="btn btn-secondary"><img src="{{ asset('images/download-icon.png') }}" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 download-btn-holder-mob d-flex align-items-center justify-content-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary">{{ __('Download') }}</button>
                                    <button type="button" class="btn btn-secondary"><img src="{{ asset('images/download-icon.png') }}" alt=""></button>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="text-center">
                            <button id="show-all-btn">{{ __('See All Certificates') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
