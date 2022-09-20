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
    <div class="tours-wrapper">
        <aside>
            <header>{{__('tour_search')}}</header>
            <form action="">
                <div class="search-item">
                    <div class="search-item-title">{{__('keyword')}}</div>
                    <div class="search-item-wrapper">
                        <input type="text" name="keyword" value="{{ request('keyword') }}">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="search-item">
                    <div class="search-item-title">{{__('destination')}}</div>
                    <div class="search-item-wrapper">
                        <select name="destination" class="destination">
                            <option value="">{{__('all_destinations')}}</option>
                            @if(request('destination'))
                                @foreach($destinations as $destination)
                                <option value="{{$destination->slug}}" {{($destination->slug == request('destination')) ? 'selected' : '' }}>{{$destination['title_'.app()->getLocale().'']}}</option>
                                @endforeach
                            @else
                                @foreach($destinations as $destination)
                                <option value="{{$destination->slug}}">{{$destination['title_'.app()->getLocale().'']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="search-item">
                    <div class="search-item-title">{{__('duration')}}</div>
                    <div class="search-item-wrapper">
                        <select name="duration" class="duration">
                        @if(request('duration'))
                            <option value="">{{__('any')}}</option>
                            <option value="2" {{('2' == request('duration')) ? 'selected' : '' }}>{{__('2days')}}</option>
                            <option value="3" {{('3' == request('duration')) ? 'selected' : '' }}>{{__('3days')}}</option>
                            <option value="4" {{('4' == request('duration')) ? 'selected' : '' }}>{{__('4days')}}</option>
                            <option value="5" {{('5' == request('duration')) ? 'selected' : '' }}>{{__('5days')}}</option>
                            <option value="5plus" {{('5plus' == request('duration')) ? 'selected' : '' }}>{{__('5+days')}}</option>
                        @else
                            <option value="">{{__('any')}}</option>
                            <option value="2">{{__('2days')}}</option>
                            <option value="3">{{__('3days')}}</option>
                            <option value="4">{{__('4days')}}</option>
                            <option value="5">{{__('5days')}}</option>
                            <option value="5plus">{{__('5+days')}}</option>
                        @endif
                        </select>
                    </div>
                </div>
                <div class="search-item">
                    <div class="search-item-title">{{__('month')}}</div>
                    <div class="search-item-wrapper">
                        <select name="month" class="month">
                        @if(request('month'))
                            <option value="">{{__('any')}}</option>
                            <option value="1" {{('1' == request('month')) ? 'selected' : '' }}>{{__('january')}}</option>
                            <option value="2" {{('2' == request('month')) ? 'selected' : '' }}>{{__('february')}}</option>
                            <option value="3" {{('3' == request('month')) ? 'selected' : '' }}>{{__('march')}}</option>
                            <option value="4" {{('4' == request('month')) ? 'selected' : '' }}>{{__('april')}}</option>
                            <option value="5" {{('5' == request('month')) ? 'selected' : '' }}>{{__('may')}}</option>
                            <option value="6" {{('6' == request('month')) ? 'selected' : '' }}>{{__('june')}}</option>
                            <option value="7" {{('7' == request('month')) ? 'selected' : '' }}>{{__('july')}}</option>
                            <option value="8" {{('8' == request('month')) ? 'selected' : '' }}>{{__('august')}}</option>
                            <option value="9" {{('9' == request('month')) ? 'selected' : '' }}>{{__('september')}}</option>
                            <option value="10" {{('10' == request('month')) ? 'selected' : '' }}>{{__('october')}}</option>
                            <option value="11" {{('11' == request('month')) ? 'selected' : '' }}>{{__('november')}}</option>
                            <option value="12" {{('12' == request('month')) ? 'selected' : '' }}>{{__('december')}}</option>
                        @else
                            <option value="">{{__('any')}}</option>
                            <option value="1">{{__('january')}}</option>
                            <option value="2">{{__('february')}}</option>
                            <option value="3">{{__('march')}}</option>
                            <option value="4">{{__('april')}}</option>
                            <option value="5">{{__('may')}}</option>
                            <option value="6">{{__('june')}}</option>
                            <option value="7">{{__('july')}}</option>
                            <option value="8">{{__('august')}}</option>
                            <option value="9">{{__('september')}}</option>
                            <option value="10">{{__('october')}}</option>
                            <option value="11">{{__('november')}}</option>
                            <option value="12">{{__('december')}}</option>
                        @endif
                        </select>
                    </div>
                </div>
                <div class="search-item">
                    <div class="search-item-wrapper">
                        <div class="prices">
                            <div class="min-price">
                                <div class="min-price-title">{{__('min_price')}}</div>
                                <input type="text" name="min_price" value="{{ request('min_price') }}">
                            </div>
                            <div class="max-price">
                                <div class="max-price-title">{{__('max_price')}}</div>
                                <input type="text" name="max_price" value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-item">
                    <div class="search-item-title">{{__('tour_search')}}</div>
                    <div class="search-item-wrapper rating">
                        <input type="hidden" name="rating" value="">
                        <i class="fas fa-star{{(request('rating') >= 1) ? ' active' : ''}}" data-value="1"></i>
                        <i class="fas fa-star{{(request('rating') >= 2) ? ' active' : ''}}" data-value="2"></i>
                        <i class="fas fa-star{{(request('rating') >= 3) ? ' active' : ''}}" data-value="3"></i>
                        <i class="fas fa-star{{(request('rating') >= 4) ? ' active' : ''}}" data-value="4"></i>
                        <i class="fas fa-star{{(request('rating') >= 5) ? ' active' : ''}}" data-value="5"></i>
                    </div>
                </div>
                <div class="type-filter">
                    <header>
                        <div class="search-item-title">{{__('type_filter')}}</div>
                        <i class="fas fa-minus"></i>
                    </header>
                    <div class="search-item active">
                        <div class="search-item-title">{{__('tour_age')}}</div>
                        <div class="search-item-wrapper">
                            @if(request('min_age'))
                                @foreach(request('min_age') as $req_age)
                                <label><input type="checkbox" name="min_age[]" value="2+" {{('2+' == $req_age) ? 'checked' : '' }}> 2+</label>
                                <label><input type="checkbox" name="min_age[]" value="5+" {{('5+' == $req_age) ? 'checked' : '' }}> 5+</label>
                                <label><input type="checkbox" name="min_age[]" value="10+" {{('10+' == $req_age) ? 'checked' : '' }}> 10+</label>
                                <label><input type="checkbox" name="min_age[]" value="12+" {{('12+' == $req_age) ? 'checked' : '' }}> 12+</label>
                                <label><input type="checkbox" name="min_age[]" value="15+" {{('15+' == $req_age) ? 'checked' : '' }}> 15+</label>
                                @endforeach
                            @else
                                <label><input type="checkbox" name="min_age[]" value="2+"> 2+</label>
                                <label><input type="checkbox" name="min_age[]" value="5+"> 5+</label>
                                <label><input type="checkbox" name="min_age[]" value="10+"> 10+</label>
                                <label><input type="checkbox" name="min_age[]" value="12+"> 12+</label>
                                <label><input type="checkbox" name="min_age[]" value="15+"> 15+</label>
                            @endif
                        </div>
                    </div>
                    <div class="search-item active">
                        <div class="search-item-title">{{__('categories')}}</div>
                        <div class="search-item-wrapper">
                            @if(request('category'))
                                @foreach(request('category') as $req_cat)
                                    @foreach($datas['category'] as $category)
                                    <label><input type="checkbox" name="category[]" value="{{$category->slug}}" {{($category->slug == $req_cat) ? 'checked' : '' }}> {{$category['title_'.app()->getLocale().'']}}</label>
                                    @endforeach
                                @endforeach
                            @else
                                @foreach($datas['category'] as $category)
                                <label><input type="checkbox" name="category[]" value="{{$category->slug}}"> {{$category['title_'.app()->getLocale().'']}}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit">{{__('submit')}}</button>
            </form>
        </aside>
        <div class="tours">
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
                    <div class="info">
                        <i class="fas fa-map-marker-alt"></i>{{$tour->destination['title_'.app()->getLocale().'']}} - {{$tour->category['title_'.app()->getLocale().'']}}
                    </div>
                    <div class="duration"><i class="fas fa-clock"></i>{{$tour['duration_'.app()->getLocale().'']}}</div>
                    <div class="availability">
                        <i class="fas fa-calendar-alt"></i>
                        {{\Carbon\Carbon::parse($tour->availability)->translatedFormat('M d, Y')}}
                    </div>
                    <div class="descr">
                        <p>{{mb_substr($tour['descr_'.app()->getLocale().''], 0, 144).'...'}}</p>
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
                    <div class="rating">
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
                    </div>
                </div>
            </div>
            @endforeach
            {{$datas['tours']->links('vendor.pagination.custom')}}
        </div>
    </div>
</main>
@endsection