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
        $('#topNav .swiper-slide').click(function () {
            $("#topNav  .active").removeClass('active');
            $("#topNav .swiper-slide").eq($(this).index()).addClass('active');
            $(".goodContent .goodList").css("display", "none");
            $(".goodContent .goodList").eq($(this).index()).css("display", "block");
        })
//
//        $(window).scroll(function () {
//            var goodsListHeight = $('.goodContent').height();
//            var goodsListTop = $('.goodContent').offset().top;
//
//            if ($(window).scrollTop() >= goodsListTop && $(window).scrollTop() <= (goodsListHeight + goodsListTop)) {
//                $('#topNav').addClass('fixNav');
//            } else {
//                $('#topNav').removeClass('fixNav');
//            }
//        });
    </script>
@endsection