<!-- Meta -->
<meta charset="UTF-8">
@if(isset($datas['metas']))
    @foreach($datas['metas'] as $metas)
    <meta name="keywords" content="{{$metas['keyword_'.app()->getLocale().'']}}">
    <meta name="description" content="{{$metas['descr_'.app()->getLocale().'']}}">
    @endforeach
@endif
<meta name="author" content="Galstyan">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Optional -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.2.0/css/flag-icons.min.css"/>
<!-- Main -->
<link rel="stylesheet" href="/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="/jquery-ui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="/font-awesome/css/all.min.css">
<link rel="stylesheet" href="/font-awesome/css/fontawesome.min.css">
<link rel="stylesheet" href="/css/main.css">