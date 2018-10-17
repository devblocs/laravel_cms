@php
    // creating a full name for the authenticated user
    $fullname = Auth::user()->fname . " " . Auth::user()->lname;
@endphp
<!doctype html>
<html lang="en">
  @include('partials._head')
  <body>
    <div clas="container-fluid">
        @include('partials._navbar')
        <div class="more-space"></div>
        @yield('content')
    </div>

    @include('partials._footer_scripts')
  </body>
</html>