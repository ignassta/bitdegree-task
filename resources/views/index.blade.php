@extends('layouts.main-layout')

@section('content')

<top-statistics>
    <img slot="top-statistics-left-img" src="images/purple-medal-icon.png">
    <div class="top-statistics-text" slot="top-statistics-left-text">{{ __('Certificates Earned') }}</div>
    <img slot="top-statistics-middle-img" src="images/green-book-icon.png">
    <div class="top-statistics-text" slot="top-statistics-middle-text">{{ __('Courses Completed') }}</div>
    <img slot="top-statistics-right-img" src="images/golden-clock-icon.png">
    <div class="top-statistics-text" slot="top-statistics-right-text">{{ __('Hours Spent Studying') }}</div>
</top-statistics>

@endsection
