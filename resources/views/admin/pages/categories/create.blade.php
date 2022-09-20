@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.categories.store', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
        @csrf
        <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
            <label>Category En <input type="text" name="title_en" value="{{old('title_en')}}"></label>
            @error('title_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
            <label>Category HY <input type="text" name="title_hy" value="{{old('title_hy')}}"></label>
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
        <button type="submit">Add</button>
    </form>
</div>
@endsection