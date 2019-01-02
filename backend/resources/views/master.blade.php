<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $appData->description }}">
    <title>{{ $appData->name }}</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('partials.navbar')
    <div class="wrapper">
        @yield('content')
    </div>
    <script id="dsq-count-scr" src="//{{ $appData->disqus }}.disqus.com/count.js" async></script>
  </body>
</html>

