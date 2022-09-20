<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head')
        <title>{{$title[0]['title_'.app()->getLocale().'']}}</title>
    </head>
    <body>

        @include('inc.nav')
        
        @yield('content')

        @include('inc.flash-message')
        
        <!-- Up button -->
        <a href="#" class="up animate__animated animate__shakeY animate__slow"><i class="fas fa-chevron-up"></i></a>
         
        @include('inc.footer')
        
        @include('inc.scripts')

    </body>
</html>
