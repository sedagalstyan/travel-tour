@extends('admin.index')
@section('content')
<div class="forms">
    <form action="{{route('locale.admin.pages-titles.update', ['locale' => app()->getLocale(), 'pages_title' => $page_title['id']])}}" method="POST" class="validation">
        @csrf
        @method('PUT')
        <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
            <label>Title EN <input type="text" name="title_en" value="{{$page_title['title_en']}}"></label>
            @error('title_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
            <label>Title HY <input type="text" name="title_hy" value="{{$page_title['title_hy']}}"></label>
            @error('title_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="page{{ $errors->has('page') ? ' has-error' : ''}}">
            <label>Page <input type="text" name="page" value="{{$page_title['page']}}"></label>
            @error('page')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection