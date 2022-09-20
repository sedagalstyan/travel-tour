@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.users.update', ['locale' => app()->getLocale(), 'user' => $user['id']])}}" method="POST" enctype="multipart/form-data" class="validation">
        @csrf
        @method('PUT')
        <div class="avatar{{ $errors->has('image') ? ' has-error' : ''}}">
            <label>Change avatar <input type="file" name="avatar" value="{{$user['avatar']}}"></label>
            @error('avatar')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="name{{ $errors->has('name') ? ' has-error' : ''}}">
            <label>Name <input type="text" name="name" value="{{$user['name']}}"></label>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="surname{{ $errors->has('surname') ? ' has-error' : ''}}">
            <label>Surname <input type="text" name="surname" value="{{$user['surname']}}"></label>
            @error('surname')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="email{{ $errors->has('email') ? ' has-error' : ''}}">
            <label>Email <input type="email" name="email" value="{{$user['email']}}"></label>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="password{{ $errors->has('password') ? ' has-error' : ''}}">
            <label>Password 
                <span><input type="text" name="password" value="{{$user['password']}}"></span>
            </label>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection