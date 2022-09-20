<!-- Body Background Overlay -->
<div class="body-background-overlay"></div>

<!-- Nav -->
<nav class="main-nav">
    <ul class="nav-items">
        <li class="logo"><h1><a href="/{{app()->getLocale()}}"><i class="fas fa-plane"></i><span>Travel</span>Tour</a></h1></li>
        <li class="nav-item"><a href="/{{app()->getLocale()}}">{{__('home')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.about', ['locale' => app()->getLocale()])}}">{{__('about')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.destinations', ['locale' => app()->getLocale()])}}">{{__('destinations')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.tours', ['locale' => app()->getLocale()])}}">{{__('tours')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.contact', ['locale' => app()->getLocale()])}}">{{__('contact')}}</a></li>
        <li class="nav-item search-nav-item"><i class="fas fa-search"></i></li>
        @unless(auth()->check())
            <li class="nav-item login-btn"><a href="{{route('locale.login', ['locale' => app()->getLocale()])}}"><i class="fas fa-lock"></i>{{__('login')}}</a></li>
            <li class="nav-item signup-btn"><a href="{{route('locale.signup', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>{{__('signup')}}</a></li>
        @else
            <li class="nav-item">{{__('welcome')}}, {{auth()->user()->name}}</span>
            <li class="nav-item"><a href="{{route('locale.logout', ['locale' => app()->getLocale()])}}">{{__('logout')}}</a></span>
        @endunless
        <li class="toggle"><i class="fas fa-bars"></i></li>
        <li class="nav-item dropdown">
            <div class="dropdown-toggle">
                <span class="{{config('languages')[App::getLocale()]['flag']}}"></span>  {{ config('languages')[App::getLocale()]['display'] }}
                <i class="fas fa-angle-down"></i>
            </div>
            <div class="dropdown-menu">
                <div class="dropdown-item">
                    @foreach(config('languages') as $locale => $lang)
                        @php
                        $currentUrl = '/'.request()->path();
                        $selectedLang = app()->getLocale();
                        
                        @endphp
                        @if(app()->getLocale() != $locale)
                            @php $url = str_replace($selectedLang, $locale, $currentUrl); @endphp
                            <a href="{{ $url }}"><span class="{{ $lang['flag'] }}"></span> {{ $lang['display'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
    </ul>
    <form action="">
        <div class="search">
            <input type="text"><i class="fas fa-search"></i>
        </div>
    </form>
</nav>

<!-- Small Nav -->
<nav class="small-nav animate__animated">
    <ul class="nav-items">
        <li class="toggle"><i class="fas fa-times"></i></li>
        <li class="nav-item"><a href="/{{app()->getLocale()}}">{{__('home')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.about', ['locale' => app()->getLocale()])}}">{{__('about')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.destinations', ['locale' => app()->getLocale()])}}">{{__('destinations')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.tours', ['locale' => app()->getLocale()])}}">{{__('tours')}}</a></li>
        <li class="nav-item"><a href="">{{__('blog')}}</a></li>
        <li class="nav-item"><a href="{{route('locale.contact', ['locale' => app()->getLocale()])}}">{{__('contact')}}</a></li>
        <li class="nav-item dropdown">
            <div class="dropdown-toggle">
                <span class="{{config('languages')[App::getLocale()]['flag']}}"></span>  {{ config('languages')[App::getLocale()]['display'] }}
                <i class="fas fa-angle-down"></i>
            </div>
            <div class="dropdown-menu">
                <div class="dropdown-item">
                    @foreach(config('languages') as $locale => $lang)
                        @php
                        $currentUrl = '/'.request()->path();
                        $selectedLang = app()->getLocale();
                        
                        @endphp
                        @if(app()->getLocale() != $locale)
                            @php $url = str_replace($selectedLang, $locale, $currentUrl); @endphp
                            <a href="{{ $url }}"><span class="{{ $lang['flag'] }}"></span> {{ $lang['display'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
        <li class="nav-item login-btn"><a href="{{route('locale.login', ['locale' => app()->getLocale()])}}"><i class="fas fa-lock"></i>{{__('login')}}</a></li>
        <li class="nav-item signup-btn"><a href="{{route('locale.signup', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>{{__('signup')}}</a></li>
    </ul>
</nav>