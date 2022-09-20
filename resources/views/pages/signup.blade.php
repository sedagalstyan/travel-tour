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
    <div class="signup-container">
        <form action="{{route('locale.signup-submit', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
            @csrf
            <div class="name{{ $errors->has('name') ? ' has-error' : ''}}">
                <label>{{__('name')}} <input type="text" name="name" value="{{old('name')}}"></label>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="surname{{ $errors->has('surname') ? ' has-error' : ''}}">
                <label>{{__('surname')}} <input type="text" name="surname" value="{{old('surname')}}"></label>
                @error('surname')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="email{{ $errors->has('email') ? ' has-error' : ''}}">
                <label>{{__('email')}} <input type="email" name="email" value="{{old('email')}}"></label>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="password{{ $errors->has('password') ? ' has-error' : ''}}">
                <label>{{__('password')}} 
                    <span><input type="password" name="password" value="{{old('password')}}"><i class="fas fa-eye-slash"></i></span>
                </label>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">{{__('signup')}}</button>
            <div class="log-in">
                <a href="{{route('locale.login', ['locale' => app()->getLocale()])}}">{{__('have_account')}} <span>{{__('login')}}</span></a>
            </div>
        </form>
    </div>
</main>
@endsection