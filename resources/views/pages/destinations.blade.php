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
    <div class="all-destinations">
        <div class="card-container">
            @foreach($destinations as $destination)
            <div class="card">
                <a href="{{route('locale.destination', ['locale' => app()->getLocale(), 'slug' => $destination['slug']])}}">
                    <img src="{{ asset('/storage/images/destinations/'.$destination['img'].'') }}" alt="{{$destination['slug'.app()->getLocale().'']}}">
                    <div class="top-destination-info">
                        <div class="top-destination-name">
                        {{$destination['title_'.app()->getLocale().'']}}
                        </div>
                        <div class="top-destination-quantity">
                            @inject('tour', 'App\Models\Tour')
                            {{$tour->count($destination['id'])}} tours
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection