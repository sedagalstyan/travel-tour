@extends('index')

@section('content')
<!-- Main -->
<main class="page-content">
    <form action="{{route('locale.profile.update', ['locale' => app()->getLocale(), 'profile' => $user->id])}}" method="POST" enctype="multipart/form-data" class="validation edit-profile hide-overflow">
        @csrf
        @method('PUT')
        <div class="avatar{{ $errors->has('image') ? ' has-error' : ''}}">
            <label>{{__('change_avatar')}}<input type="file" name="avatar" value="{{$user->avatar}}"></label>
            @error('avatar')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="name{{ $errors->has('name') ? ' has-error' : ''}}">
            <label>{{__('name')}} <input type="text" name="name" value="{{$user->name}}"></label>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="surname{{ $errors->has('surname') ? ' has-error' : ''}}">
            <label>{{__('surname')}} <input type="text" name="surname" value="{{$user->surname}}"></label>
            @error('surname')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="email{{ $errors->has('email') ? ' has-error' : ''}}">
            <label>{{__('email')}} <input type="email" name="email" value="{{$user->email}}"></label>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="password{{ $errors->has('password') ? ' has-error' : ''}}">
            <label>{{__('newpass')}}
                <span><input type="text" name="password" value=""></span>
            </label>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">{{__('update')}}</button>
    </form>
</main>
@endsection