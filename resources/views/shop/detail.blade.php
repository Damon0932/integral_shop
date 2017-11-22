<!DOCTYPE html>
<html>

<head>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no,email=no" name="format-detection">
    <title>详情</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet">
    <script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/flexible.js"></script>
</head>

<body>
<section class="goodDetails">
    <div class="goodSlide swiper-container">
        <div class="swiper-wrapper">
            @foreach($product->banners as $banner)
                <div class="swiper-slide">
                    <img src="{{$banner->image}}">
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="detailHeader">
        <p class="detail_title">{{$product->name}}</p>

        <p class="detail_price">{{$product->integral}}M豆<span>￥{{$product->price}}</span></p>

        <div class="detail_params">
            <span class="speci">规格：{{$product->spec}}</span>
            <span class="sales">已售：{{$product->sale_count}}</span>
        </div>
    </div>
    <div class="detailImg">
        <div class="detail_header"><i class="iconfont icon-image"></i>图文详情</div>
        <div class="img_list">
            {!! $product->detail !!}
        </div>
    </div>
</section>
<div class="exchangeBox">
    @if(session('med_beans') >= $product->integral)
        <a href="" class="exchange_btn">立即兑换</a>
    @else
        <a href="" class="exchange_btn disabled">M豆不足</a>
    @endif

</div>
<script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
<script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
    })
</script>
</body>

</html>