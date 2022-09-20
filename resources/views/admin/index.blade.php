<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.inc.head')
        <title>{{$title[0]['title_'.app()->getLocale().'']}}</title>
    </head>
    <body>

        <div class="container">
            <aside>
                @include('admin.inc.nav')
            </aside>
            <main>
                @include('admin.inc.header')
                <div class="content">
                    @yield('content')
                </div>
            </main>
        </div>

        @include('inc.flash-message')

        @include('admin.inc.footer')

        @include('inc.scripts')
    </body>
</html>