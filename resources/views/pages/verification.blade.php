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
    <div class="verification-container">
        <form action="{{route('locale.verificate', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
            @csrf
            <div class="otp-code">
                <label>OTP Code 
                    <input type="otp-code" name="otp-code" value="{{old('otp-code')}}">
                </label>
                @error('otp-code')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="send-again"><a href="{{route('locale.otpcode', ['locale' => app()->getLocale()])}}">Send the code again</a></div>
            <button type="submit">Verificate</button>
        </form>
    </div>
</main>
@endsection