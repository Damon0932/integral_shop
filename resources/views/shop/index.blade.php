@extends('layouts.shop', [
    'title'   => '商城首页',
    'tar_bar' => 'index',
    'active' => 'shop',
])

@section('content')
    <div class="myBalance">
        <img src="images/logo.png" class="logo" alt="">

        <div class="balance">
            <div class="balance_text">
                <a href="" class="rule">M豆规则？</a>
                <a href="" class="detail">查看明细</a>
            </div>
            <p>{{session('med_beans')}}</p>

            <p>可用M豆</p>
        </div>
    </div>
    <div id="topNav">
        <div class="swiper-wrapper">
            <div class="swiper-slide active">全部</div>
            <div class="swiper-slide">0-199</div>
            <div class="swiper-slide">200-499</div>
            <div class="swiper-slide">300-597</div>
            <div class="swiper-slide">500-799</div>
            <div class="swiper-slide">799-899</div>
        </div>
    </div>
    <article class="goodList">
        @foreach($products as $product)
            <a class="goodItem" href="{{route('product.show',['id' => $product->id])}}">
                <div class="imgBox">
                    <img src="{{$product->logo}}" alt="">
                </div>
                <div class="info">
                    <p class="title">{{$product->name}}</p>

                    <p class="price">
                        <span>{{$product->integral}}豆</span>
                        <em>￥{{$product->price}}</em>
                    </p>
                    @if(session('med_beans') >= $product->integral)
                        <a href="" class="exchange">立即兑换</a>
                    @else
                        <a href="#" class="notenough">M豆不足</a>
                    @endif
                </div>
            </a>
        @endforeach
    </article>

    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
    <script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script>
        var navTop = $('#topNav').offset().top;
        $(window).scroll(function () {
            var yheight = getScrollTop();
            if (yheight > navTop) {
                $("#topNav").addClass("fixNav")
            } else {
                $("#topNav").removeClass("fixNav");
            }
        })
        function getScrollTop() {
            var scrollPos;
            if (window.pageYOffset) {
                scrollPos = window.pageYOffset;
            }
            else if (document.compatMode && document.compatMode != 'BackCompat') {
                scrollPos = document.documentElement.scrollTop;
            }
            else if (document.body) {
                scrollPos = document.body.scrollTop;
            }
            return scrollPos;
        }

        var mySwiper = new Swiper('#topNav', {
            freeMode: true,
            slidesPerView: 'auto',
            freeModeSticky: true,
        });

        swiperWidth = mySwiper.container[0].clientWidth
        maxTranslate = mySwiper.maxTranslate();
        maxWidth = -maxTranslate + swiperWidth / 2

        $(".swiper-container").on('touchstart', function (e) {
            e.preventDefault()
        })

        mySwiper.on('tap', function (swiper, e) {
            slide = swiper.slides[swiper.clickedIndex]
            slideLeft = slide.offsetLeft
            slideWidth = slide.clientWidth
            slideCenter = slideLeft + slideWidth / 2
            // 被点击slide的中心点
            mySwiper.setWrapperTransition(300)
            if (slideCenter < swiperWidth / 2) {
                mySwiper.setWrapperTranslate(0)
            } else if (slideCenter > maxWidth) {
                mySwiper.setWrapperTranslate(maxTranslate)
            } else {
                nowTlanslate = slideCenter - swiperWidth / 2
                mySwiper.setWrapperTranslate(-nowTlanslate)
            }
            $("#topNav  .active").removeClass('active')
            $("#topNav .swiper-slide").eq(swiper.clickedIndex).addClass('active')
        })

    </script>
@endsection