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
    <div class="contact-container">
        <form action="{{route('locale.contact-msg', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
            @csrf
            <div class="name{{ $errors->has('name') ? ' has-error' : ''}}">
                <label>{{__('name')}} <input type="text" name="name"></label>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="surname{{ $errors->has('surname') ? ' has-error' : ''}}">
                <label>{{__('surname')}} <input type="text" name="surname"></label>
                @error('surname')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="email{{ $errors->has('email') ? ' has-error' : ''}}">
                <label>{{__('email')}} <input type="email" name="email"></label>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="message{{ $errors->has('message') ? ' has-error' : ''}}">
                <label>{{__('message')}} <textarea name="message"></textarea></label>
                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"><i class="fas fa-paper-plane"></i>{{__('send')}}</button>
        </form>
    </div>
</main>
@endsection