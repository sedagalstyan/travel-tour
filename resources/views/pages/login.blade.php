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
    <div class="login-container">
        <form action="{{route('locale.login-submit', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
            @csrf
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
            <div class="additional">
                <div class="remember">
                    <label><input type="checkbox" name="remember"> {{__('rememberme')}}</label>
                </div>
                <div class="forgot-pass">
                    <a href="">{{__('forgotpass')}}</a>
                </div>
            </div>
            <button type="submit">{{__('login')}}</button>
            <div class="sign-up">
                <a href="{{route('locale.signup', ['locale' => app()->getLocale()])}}">{{__('havenot_account')}} <span>{{__('signup')}}</span></a>
            </div>
        </form>
    </div>
</main>
@endsection