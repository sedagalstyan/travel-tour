@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.users.store', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
        @csrf
        <div class="name{{ $errors->has('name') ? ' has-error' : ''}}">
            <label>Name <input type="text" name="name" value="{{old('name')}}"></label>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="surname{{ $errors->has('surname') ? ' has-error' : ''}}">
            <label>Surname <input type="text" name="surname" value="{{old('surname')}}"></label>
            @error('surname')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="email{{ $errors->has('email') ? ' has-error' : ''}}">
            <label>Email <input type="email" name="email" value="{{old('email')}}"></label>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="password{{ $errors->has('password') ? ' has-error' : ''}}">
            <label>Password 
                <span><input type="text" name="password" value="{{old('password')}}"></span>
            </label>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add</button>
    </form>
</div>
@endsection