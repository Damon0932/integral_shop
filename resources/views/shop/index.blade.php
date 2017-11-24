@extends('layouts.shop', [
    'title' => '商城首页',
    'tar_bar' => 'index',
    'active' => 'product',
])

@section('content')
    <div class="myBalance">
        <img src="/images/logo.png" class="logo" alt="">

        <div class="balance">
            <div class="balance_text">
                <a href="#" class="rule">M豆规则？</a>
                <a href="{{route('beans.index')}}" class="detail">查看明细</a>
            </div>
            <p>{{session('med_user')['beans']}}</p>

            <p>可用M豆</p>
        </div>
    </div>
    <div id="topNav">
        <div class="swiper-wrapper">
            <div class="swiper-slide active">全部</div>
            @foreach($filterArrays as $filterArray)
                <div class="swiper-slide">{{$filterArray[0]}}-{{$filterArray[1]}}</div>
            @endforeach
        </div>
    </div>
    <div class="goodContent">
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
                        @if(session('med_user')['beans'] >= $product->integral)
                            <span class="exchange">立即兑换</span>
                        @else
                            <span class="notenough">M豆不足</span>
                        @endif
                    </div>
                </a>
            @endforeach
        </article>
        @foreach($productArrays as $productArray)
            <article class="goodList" style="display:none">
                @foreach($productArray as $product)
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
                            @if(session('med_user')['beans'] >= $product->integral)
                                <span class="exchange">立即兑换</span>
                            @else
                                <span class="notenough">M豆不足</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </article>
        @endforeach
    </div>
    <script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script>
       $(window).scroll(function () {
			var goodsListHeight = $('.goodContent').height(); 
			var goodsListTop = $('.goodContent').offset().top;

			if ($(window).scrollTop() >= goodsListTop && $(window).scrollTop() <= (goodsListHeight + goodsListTop)) {
			  $('#topNav').addClass('fixNav');
			} else {
			  $('#topNav').removeClass('fixNav');
			}
		});

        var mySwiper = new Swiper('#topNav', {
            freeMode: true,
            slidesPerView: 'auto',
            freeModeSticky: true,
            onTap: function (swiper, e) {
                console.log(swiper.clickedIndex)
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
                $("#topNav  .active").removeClass('active');
                $("#topNav .swiper-slide").eq(swiper.clickedIndex).addClass('active');
                $(".goodContent .goodList").css("display", "none");
                $(".goodContent .goodList").eq(swiper.clickedIndex).css("display", "block");
            }
        });
        swiperWidth = mySwiper.container[0].clientWidth
        maxTranslate = mySwiper.maxTranslate();
        maxWidth = -maxTranslate + swiperWidth / 2

        $(".swiper-container").on('touchstart', function (e) {
            e.preventDefault()
        })

    </script>
@endsection