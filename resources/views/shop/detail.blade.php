@extends('layouts.shop', [
    'title'   => '商品详情',
    'tar_bar' => 'detail'
])

@section('content')
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
                <span class="sales">已售：{{$product->sale_counts}}</span>
            </div>
        </div>
        <div class="detailImg">
            <div class="detail_header"><i class="iconfont icon-image"></i>图文详情</div>
            <div class="img_list">
                {!! $product->detail !!}
            </div>
        </div>
    </section>

    <script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
        })
    </script>
@endsection