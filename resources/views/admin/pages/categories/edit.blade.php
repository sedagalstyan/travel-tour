@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.categories.update', ['locale' => app()->getLocale(), 'category' => $category['id']])}}" method="POST" class="validation">
        @csrf
        @method('PUT')
        <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
            <label>Category En <input type="text" name="title_en" value="{{$category['title_en']}}"></label>
            @error('title_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
            <label>Category HY <input type="text" name="title_hy" value="{{$category['title_hy']}}"></label>
            @error('title_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="slug{{ $errors->has('slug') ? ' has-error' : ''}}">
            <label>Slug <input type="text" name="slug" value="{{$category['slug']}}"></label>
            @error('slug')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add</button>
    </form>
</div>
@endsection