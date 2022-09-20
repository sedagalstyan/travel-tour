<header>
    <div class="toggle"><i class="fas fa-bars"></i></div>
    <h1><span>Travel</span>Tour</h1>
    <ul>
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
        <li class="nav-item logout"><a href="{{route('locale.admin.logout', ['locale' => app()->getLocale()])}}"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</header>