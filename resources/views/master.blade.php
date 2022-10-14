<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layout.head')
    <body class="antialiased">
        <div class="container">
            @include('layout.header')
              @yield('content')
            </div>
    </body>
</html>
