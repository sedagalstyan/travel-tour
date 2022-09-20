@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.destinations.store', ['locale' => app()->getLocale()])}}" method="POST" class="validation" enctype="multipart/form-data">
        @csrf
        <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
            <label>Destination EN <input type="text" name="title_en" value="{{old('title_en')}}"></label>
            @error('title_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
            <label>Destination HY <input type="text" name="title_hy" value="{{old('title_hy')}}"></label>
            @error('title_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="slug{{ $errors->has('slug') ? ' has-error' : ''}}">
            <label>Slug <input type="text" name="slug" value="{{old('slug')}}"></label>
            @error('slug')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="img{{ $errors->has('img') ? ' has-error' : ''}}">
            <label>Image <input type="file" name="img" value="{{old('img')}}"></label>
            @error('img')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add</button>
    </form>
</div>
@endsection