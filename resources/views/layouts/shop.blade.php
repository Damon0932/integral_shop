<!DOCTYPE html>
<html>

<head>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no,email=no" name="format-detection">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts/iconfont.css">
    <link href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet">
    <script src="/js/zepto.min.js"></script>
    <script src="/js/flexible.js"></script>
</head>

<body touchstart>

@yield('content')
@include('layouts.tab_bar')

</body>

</html>