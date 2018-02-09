<!DOCTYPE  html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>.::.@yield('title').::.</title>
    <link rel="stylesheet" href="{{ asset("plugin/bootstrap-3.3.7/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <script type="text/javascript" src="{{ asset("plugin/jquery-3.2.1.js") }}"></script>
    <script type="text/javascript" src="{{ asset("plugin/bootstrap-3.3.7/js/popper.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("plugin/bootstrap-3.3.7/js/bootstrap.min.js") }}"></script>
    @include('admin.template.partials.head')
    <!--@yield('header')-->
</head>
    <body>
      @include('flash::message')
      @yield('content')
    </body>
    @include('admin.template.partials.footer')
</html>