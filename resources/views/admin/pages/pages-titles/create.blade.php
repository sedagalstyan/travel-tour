@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.pages-titles.store', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
        @csrf
        <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
            <label>Title EN <input type="text" name="title_en" value="{{old('title_en')}}"></label>
            @error('title_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
            <label>Title HY <input type="text" name="title_hy" value="{{old('title_hy')}}"></label>
            @error('title_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="page{{ $errors->has('page') ? ' has-error' : ''}}">
            <label>Page <input type="text" name="page" value="{{old('page')}}"></label>
            @error('page')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add</button>
    </form>
</div>
@endsection