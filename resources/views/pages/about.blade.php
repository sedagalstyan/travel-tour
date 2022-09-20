@extends('index')

@section('content')
<!-- Intro -->
<div class="intro small-height" style="background-image: url(/images/intro/search-tour.jpg)">
    <div class="background-overlay"></div>
    <h2>{{$title[0]['title_'.app()->getLocale().'']}}</h2>
</div>

<!-- Main -->
<main class="page-content">
    <!-- Page Content -->
    <div class="about-us">
        <div class="image">
            <img src="/images/about.jpg" alt="About us">
        </div>
        <p><b>Travel Tour</b> {{__('about_us')}}</p>
    </div>
</main>
@endsection