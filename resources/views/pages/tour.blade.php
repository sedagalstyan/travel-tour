@extends('index')

@section('content')
<!-- Intro -->
@php
$img = asset('storage/images/tours/'.$datas['tour']->img.'')
@endphp
<div class="intro small-height" style="background-image: url({{$img}})">
    <div class="background-overlay"></div>
    <div class="intro-tour-header">
        <div class="tour-title">{{$datas['tour']['title_'.app()->getLocale().'']}}</div>
        <div class="tour-rating">
            <i class="fas fa-star{{($datas['tour']->rating >= 1 && $datas['tour']->rating != 1.5) ? ' active' : ''}}{{($datas['tour']->rating == 1.5) ? ' half-active' : ''}}"></i>
            <i class="fas fa-star{{($datas['tour']->rating >= 2 && $datas['tour']->rating != 2.5) ? ' active' : ''}}{{($datas['tour']->rating == 2.5) ? ' half-active' : ''}}"></i>
            <i class="fas fa-star{{($datas['tour']->rating >= 3 && $datas['tour']->rating != 3.5) ? ' active' : ''}}{{($datas['tour']->rating == 3.5) ? ' half-active' : ''}}"></i>
            <i class="fas fa-star{{($datas['tour']->rating >= 4 && $datas['tour']->rating != 4.5) ? ' active' : ''}}{{($datas['tour']->rating == 4.5) ? ' half-active' : ''}}"></i>
            <i class="fas fa-star{{($datas['tour']->rating >= 5) ? ' active' : ''}}"></i>
            <span class="rating-quantity">
            @inject('review', 'App\Models\Review')
            @php $review_count = $review->count($datas['tour']->id) @endphp
            @if($review_count > 1)
            ({{$review_count}} {{__('reviews')}})
            @else
            ({{$review_count}} {{__('review')}})
            @endif
            </span>
        </div>
    </div>
</div>

<!-- Tour Nav -->
<nav class="nav-tour">
    <ul>
        <li class="active"><a href="#details">{{__('tour_details')}}</a></li>
        <li><a href="#itinerary">{{__('tour_itinerary')}}</a></li>
        <li><a href="#reviews">{{__('tour_reviews')}}</a></li>
    </ul>
</nav>
<!-- Main -->
<main class="page-content">
    <!-- Page Content -->
    <div class="tour-container">
        <div class="tour">
            <div class="tour-info">
                <div class="item">
                    <div class="duration">
                        <i class="fas fa-clock"></i>{{$datas['tour']['duration_'.app()->getLocale().'']}}
                    </div>
                    <div class="availability">
                        <i class="fas fa-calendar-alt"></i>
                        {{\Carbon\Carbon::parse($datas['tour']->availability)->translatedFormat('M d, Y')}}
                    </div>
                </div>
                <div class="item">
                    <div class="from">
                        <i class="fas fa-plane-departure"></i> {{$datas['tour']['from_'.app()->getLocale().'']}}
                    </div>
                    <div class="to">
                        <i class="fas fa-plane-arrival"></i> {{$datas['tour']['to_'.app()->getLocale().'']}}
                    </div>
                </div>
                <div class="item">
                    <div class="min-age">
                        <i class="fas fa-user"></i> {{__('tour_minage')}}: {{$datas['tour']->min_age}}
                    </div>
                    <div class="max-people">
                        <i class="fas fa-users"></i> {{__('tour_maxpeople')}}: {{$datas['tour']->max_people}}
                    </div>
                </div>
            </div>
            <div class="tabs">
                <div id="details">
                    <header>{{__('tour_details')}}</header>
                    <p>{{$datas['tour']['descr_'.app()->getLocale().'']}}</p>
                    <div class="location">
                        <div class="title">{{__('dep_ret')}}</div>
                        <div class="descr">{{__('dep_ret_loc')}}</div>
                    </div>
                    <div class="time">
                        <div class="title">{{__('dep_time')}}</div>
                        <div class="descr">{{__('dep_time_descr')}}</div>
                    </div>
                    <div class="includes">
                        <div class="title">{{__('price_inc')}}</div>
                        <div class="descr">
                            <ul>
                                <li><i class="fas fa-check"></i>{{__('price_inc1')}}</li>
                                <li><i class="fas fa-check"></i>{{__('price_inc2')}}</li>
                                <li><i class="fas fa-check"></i>{{__('price_inc3')}}</li>
                                <li><i class="fas fa-check"></i>{{__('price_inc4')}}</li>
                                <li><i class="fas fa-check"></i>{{__('price_inc5')}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="excludes">
                        <div class="title">{{__('price_exc')}}</div>
                        <div class="descr">
                            <ul>
                                <li><i class="fas fa-times"></i>{{__('price_exc1')}}</li>
                                <li><i class="fas fa-times"></i>{{__('price_exc2')}}</li>
                                <li><i class="fas fa-times"></i>{{__('price_exc3')}}</li>
                                <li><i class="fas fa-times"></i>{{__('price_exc4')}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="complementaries">
                    <div class="title">{{__('complem')}}</div>
                    <div class="descr">
                        <ul>
                            <li><i class="fas fa-check"></i>{{__('complem1')}}</li>
                            <li><i class="fas fa-check"></i>{{__('complem2')}}</li>
                            <li><i class="fas fa-check"></i>{{__('complem3')}}</li>
                            <li><i class="fas fa-check"></i>{{__('complem4')}}</li>
                        </ul>
                    </div>
                </div>
                </div>
                <div id="itinerary">
                    <header>{{__('tour_itinerary')}}</header>
                    <div class="days">
                        <div class="days-container">
                            @foreach($datas['tour']['days_'.app()->getLocale().'']['days'] as $key => $days)
                                @php $key += 1; @endphp
                                <div class="days-title">{{__('day').' '.$key.' - '.$days['title']}}</div>
                                <div class="days-descr">{{$days['descr']['info']}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="reviews">
                    <header>{{__('tour_reviews')}}</header>
                    <div class="reviews-quantity">
                        <span class="quantity">
                        @inject('review', 'App\Models\Review')
                        @php $review_count = $review->count($datas['tour']->id) @endphp
                        @if($review_count > 1)
                        {{$review_count}} {{__('reviews')}}
                        @else
                        {{$review_count}} {{__('review')}}
                        @endif
                        </span>
                        <div class="rating">
                            <input type="hidden" name="rating" value="">
                            <div class="review-rating">
                                <i class="fas fa-star{{($datas['tour']->rating >= 1 && $datas['tour']->rating != 1.5) ? ' active' : ''}}{{($datas['tour']->rating == 1.5) ? ' half-active' : ''}}"></i>
                                <i class="fas fa-star{{($datas['tour']->rating >= 2 && $datas['tour']->rating != 2.5) ? ' active' : ''}}{{($datas['tour']->rating == 2.5) ? ' half-active' : ''}}"></i>
                                <i class="fas fa-star{{($datas['tour']->rating >= 3 && $datas['tour']->rating != 3.5) ? ' active' : ''}}{{($datas['tour']->rating == 3.5) ? ' half-active' : ''}}"></i>
                                <i class="fas fa-star{{($datas['tour']->rating >= 4 && $datas['tour']->rating != 4.5) ? ' active' : ''}}{{($datas['tour']->rating == 4.5) ? ' half-active' : ''}}"></i>
                                <i class="fas fa-star{{($datas['tour']->rating >= 5) ? ' active' : ''}}"></i>
                            </div>
                        </div>
                    </div>
                    @include('pages.review')

                    @inject('review', 'App\Models\Review')

                    @auth
                    @php $hasReview = $review->hasReview(auth()->user()->id, $datas['tour']->id) @endphp
                    @if($hasReview->isEmpty())
                    <div class="write-review-title">{{__('writereview')}}</div>
                    <form action="{{route('locale.review.store', ['locale' => app()->getLocale(), 'tour' => $datas['tour']->id])}}" class="write-review" method="POST">
                        @csrf
                        <div class="write-review-rating rating">
                            <input type="hidden" name="rating" value="">
                            <i class="fas fa-star" data-value="1"></i>
                            <i class="fas fa-star" data-value="2"></i>
                            <i class="fas fa-star" data-value="3"></i>
                            <i class="fas fa-star" data-value="4"></i>
                            <i class="fas fa-star" data-value="5"></i>
                        </div>
                        <textarea name="review" placeholder="Write your review here..."></textarea>
                        <button>{{__('send')}}</button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        <aside>
            <div class="booking">
                <header>{{__('tour_price')}}</header>
                <div class="price"><i class="fas fa-tag"></i>
                @if($datas['tour']->discount != 0)
                    <span class="discount">{{$datas['tour']->price.'$'}}</span>
                @endif
                @if($datas['tour']->discount != 0)
                    {{$datas['tour']->price - ($datas['tour']->price * $datas['tour']->discount / 100).'$'}}
                @else
                    {{$datas['tour']->price.'$'}}
                @endif
                </div>
                <div class="booking-container">
                    <form action="">
                        <div class="available-seats">
                        {{__('available_seats')}}: {{$datas['tour']->available_seats}}
                        </div>
                        <div class="rooms-number">
                            <i class="fas fa-bed"></i>
                            <select name="room-number">
                                <option value="">{{__('rooms_num')}}</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                                <option value="">7</option>
                                <option value="">8</option>
                                <option value="">9</option>
                                <option value="">10</option>
                            </select>
                        </div>
                        <div class="rooms"></div>
                        <button type="submit">{{__('book')}}</button>
                    </form>
                </div>
            </div>
            <div class="services">
                <ul>
                    <li><img src="/images/services/service-1.png" alt="service-1">{{__('hotels')}}</li>
                    <li><img src="/images/services/service-2.png" alt="service-2">{{__('booking')}}</li>
                    <li><img src="/images/services/service-3.png" alt="service-3">{{__('customer')}}</li>
                    <li><img src="/images/services/service-4.png" alt="service-4">{{__('price')}}</li>
                </ul>
            </div>
        </aside>
    </div>
</main>
@endsection

<script>
    var translations = {
        room: "@lang('room')",
        adult: "@lang('adult')",
        child: "@lang('child')"
    };
</script>