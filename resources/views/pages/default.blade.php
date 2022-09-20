@extends('index')

@section('content')
<!-- Intro -->
<div class="intro" style="background-image: url(/images/intro/main-bg.jpg)">
    <div class="intro-main-descr">
        <h2 class="animate__animated animate__fadeInUp">{{__('intro_h2')}}</h2>
        <h3 class="animate__animated animate__fadeInLeft">{{__('intro_h3')}}</h3>
    </div>
    <form action="{{route('locale.search-tours', ['locale' => app()->getLocale()])}}" method="GET" class="intro-main-searchtour">
        <div class="intro-main-searchtour-item">  
            <input type="text" name="keyword" placeholder="{{__('keyword')}}" value="{{request('keyword')}}">
            <i class="fas fa-search"></i>
        </div>
        <div class="intro-main-searchtour-item">  
            <select name="destination" class="destination">
                <option value="">{{__('all_destinations')}}</option>
                @foreach($destinations as $destination)
                <option value="{{$destination->slug}}">{{$destination['title_'.app()->getLocale().'']}}</option>
                @endforeach
            </select>
        </div>
        <div class="intro-main-searchtour-item">  
            <select name="duration" class="duration">
                <option value="">{{__('any')}}</option>
                <option value="2">2 days</option>
                <option value="3">3 days</option>
                <option value="4">4 days</option>
                <option value="5">5 days</option>
                <option value="5plus">5+ days</option>
            </select>
        </div>
        <button type="submit">{{__('search_btn')}}</button>
    </form>
</div>

<!-- Main -->
<main class="page-content">
    <!-- Page Content -->
    <div class="top-destinations">
        <header>
            <h2 class="top-destinations-title">{{__('topdest_title')}}</h2>
            <h3 class="top-destinations-all"><a href="{{route('locale.destinations', ['locale' => app()->getLocale()])}}">{{__('topdest_all')}}</a></h3>
        </header>
        <div class="card-container">
            @foreach($datas['top_destinations'] as $data)
                @foreach($data as $destination)
                <div class="card">
                    <a href="{{route('locale.destination', ['locale' => app()->getLocale(), 'slug' => $destination->slug])}}">
                        <img src="{{ asset('/storage/images/destinations/'.$destination->img.'') }}" alt="{{$destination->slug}}">
                        <div class="top-destination-info">
                            <div class="top-destination-name">
                                {{ $destination['title_'.app()->getLocale().''] }}
                            </div>
                            <div class="top-destination-quantity">
                                @inject('tour', 'App\Models\Tour')
                                @php $tour_count = $tour->count($destination->id) @endphp
                                @if($tour_count > 1)
                                {{$tour_count}} {{__('tours_quantity')}}
                                @else
                                {{$tour_count}} {{__('tour_quantity')}}
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="our-services">
        <div class="row-service">
            <div class="service"><img src="images/services/service-1.png" alt="service-1">{{__('hotels')}}</div>
            <div class="service"><img src="images/services/service-2.png" alt="service-2">{{__('booking')}}</div>
            <div class="service"><img src="images/services/service-3.png" alt="service-3">{{__('customer')}}</div>
            <div class="service"><img src="images/services/service-4.png" alt="service-4">{{__('price')}}</div>
        </div>
    </div>
    <div class="top-tourpackages">
        <header>
            <h2 class="top-tourpackages-title">{{__('toptours_title')}}</h2>
            <h3 class="top-tourpackages-all"><a href="{{route('locale.tours', ['locale' => app()->getLocale()])}}">{{__('toptours_all')}}</a></h3>
        </header>
        <div class="card-container">
            @foreach($datas['top_tours'] as $tour)
            <div class="card">
                <div class="card-head">
                    <a href="{{route('locale.tour', ['locale' => app()->getLocale(), 'destination' => $tour->destination->slug, 'tour_id' => $tour->id])}}">
                        <img src="{{ asset('storage/images/tours/thumbs/'.$tour->img.'') }}" alt="{{$tour['title_'.app()->getLocale().'']}}">
                    </a>
                    @if($tour->discount != 0)
                        <div class="ribbon discount">{{$tour->discount.'%'}} {{__('off')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="title"><a href="{{route('locale.tour', ['locale' => app()->getLocale(), 'destination' => $tour->destination->slug, 'tour_id' => $tour->id])}}">{{$tour['title_'.app()->getLocale().'']}}</a></div>
                    <div class="destination"><i class="fas fa-map-marker-alt"></i>{{$tour->destination['title_'.app()->getLocale().'']}}</div>
                    <div class="info">
                        <div class="category">{{$tour->category['title_'.app()->getLocale().'']}}</div>
                        <div class="price">
                            @if($tour->discount != 0)
                                <span class="discount">{{$tour->price.'$'}}</span>
                            @endif
                            @if($tour->discount != 0)
                                {{$tour->price - ($tour->price * $tour->discount / 100).'$'}}
                            @else
                                {{$tour->price.'$'}}
                            @endif
                        </div>
                    </div>
                    <div class="descr">
                        <div class="rating">
                            <i class="fas fa-star{{($tour->rating >= 1 && $tour->rating != 1.5) ? ' active' : ''}}{{($tour->rating == 1.5) ? ' half-active' : ''}}"></i>
                            <i class="fas fa-star{{($tour->rating >= 2 && $tour->rating != 2.5) ? ' active' : ''}}{{($tour->rating == 2.5) ? ' half-active' : ''}}"></i>
                            <i class="fas fa-star{{($tour->rating >= 3 && $tour->rating != 3.5) ? ' active' : ''}}{{($tour->rating == 3.5) ? ' half-active' : ''}}"></i>
                            <i class="fas fa-star{{($tour->rating >= 4 && $tour->rating != 4.5) ? ' active' : ''}}{{($tour->rating == 4.5) ? ' half-active' : ''}}"></i>
                            <i class="fas fa-star{{($tour->rating >= 5) ? ' active' : ''}}"></i>
                            <span class="rating-quantity">
                            @inject('review', 'App\Models\Review')
                            @php $review_count = $review->count($tour->id) @endphp
                            @if($review_count > 1)
                            ({{$review_count}} {{__('reviews')}})
                            @else
                            ({{$review_count}} {{__('review')}})
                            @endif
                            </span>
                        </div>
                        <div class="duration"><i class="fas fa-clock"></i> {{$tour['duration_'.app()->getLocale().'']}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection