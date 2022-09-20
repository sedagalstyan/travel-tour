@foreach($datas['reviews'] as $review)
<div class="review">
    <div class="review-avatar">
        <img src="{{ asset('/storage/images/users/'.$review->user->avatar.'') }}">
    </div>
    <div class="review-detail">
        <div class="review-detail-name">{{$review->user->name.' '.$review->user->surname}}</div>
        <div class="review-detail-descr">{{$review->review}}</div>
        <div class="review-detail-info">
            <div class="rating">
                <i class="fas fa-star{{($review->rating >= 1) ? ' active' : ''}}"></i>
                <i class="fas fa-star{{($review->rating >= 2) ? ' active' : ''}}"></i>
                <i class="fas fa-star{{($review->rating >= 3) ? ' active' : ''}}"></i>
                <i class="fas fa-star{{($review->rating >= 4) ? ' active' : ''}}"></i>
                <i class="fas fa-star{{($review->rating >= 5) ? ' active' : ''}}"></i>
            </div>
            @if(isset(auth()->user()->id) && $review->user->id == auth()->user()->id)
            <form action="{{route('locale.review.destroy', ['locale' => app()->getLocale(), 'review' => $review->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="del-btn" type="submit"><i class="fas fa-trash"></i>{{__('delete')}}</button>
            </form>
            @endif
        </div>
        <div class="review-detail-createdat">{{\Carbon\Carbon::parse($review->created_at)->translatedFormat('F j, Y, g:i a')}}</div>
    </div>
</div>
@endforeach