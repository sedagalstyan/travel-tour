@extends('index')

@section('content')
<!-- Intro -->
<div class="intro small-height" style="background-image: url(/images/intro/search-tour.jpg)">
    <div class="background-overlay"></div>
    <h2>{{$title[0]['title_'.app()->getLocale().'']}}</h2>
</div>
<!-- Main -->
<main class="page-content">
    <div class="all-tourpackages">
        <div class="card-container">
        @foreach($datas['tours'] as $tour)
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
        {{$datas['tours']->links('vendor.pagination.custom')}}
    </div>
</main>
@endsection