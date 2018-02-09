<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>.::.@yield('title').::.</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/article.css') }}"/>
        <script type="text/javascript" src="{{ asset('js/article.js') }}" ></script>
    </head>
    <body>    
       @yield('content')
    </body>
</html>



