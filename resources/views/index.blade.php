@extends('layouts.main-layout')
@section('content')

    <top-statistics-component>
        <img slot="top-statistics-left-img" src="images/purple-medal-icon.png">
        <div class="top-statistics-text" slot="top-statistics-left-text">{{ __('Certificates Earned') }}</div>
        <img slot="top-statistics-middle-img" src="images/green-book-icon.png">
        <div class="top-statistics-text" slot="top-statistics-middle-text">{{ __('Courses Completed') }}</div>
        <img slot="top-statistics-right-img" src="images/golden-clock-icon.png">
        <div class="top-statistics-text" slot="top-statistics-right-text">{{ __('Hours Spent Studying') }}</div>
    </top-statistics-component>

<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-12">

                    <progression-component>
                        <template slot="progression-header">{{ __('Progression') }}</template>
                        <img id="progression-award-icon" slot="progression-award-icon" src="images/golden-award-icon.png">
                        <template slot="progression-second-header">{{ __('Mastered On BitDegree') }}</template>
                    </progression-component>

                </div>
                <div class="col-12">

                    <recomendations-component></recomendations-component>

                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div class="col-12">

                    <about-me-component></about-me-component>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
