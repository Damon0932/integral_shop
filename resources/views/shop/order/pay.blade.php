@extends('layouts.shop', [
    'title' => '支付',
    'tar_bar' => 'pay'
])
@section('content')
    <div class="userOrder">
		@if()
        <i class="iconfont icon-location"></i>
        <a href="" class="userInfo">
            <p>
                <span>收货人：</span>
                马云
            </p>
            <p>
                <span>手机号：</span>
                13469968705
            </p>
            <p>
                <span>收货地址：</span>
                湖北神武汉市洪山区光谷大道777号
            </p>
        </a>
        <div class="orderArrow"></div>
		@else
		<a class="noaddress"><img src="images/address.png" alt="">添加地址</a>
		@endif
    </div>
    <div class="goodOrders">
        <p class="head">商品列表</p>

        <div class="good">
            <div class="good_img">
                <img src="{{$product->logo}}" alt="">
            </div>
            <div class="good_info">
                <p class="title">{{$product->name}}

                <p class="speci">{{$product->spec}}</p>

                <p class="price">{{$product->integral}}M豆
                    <span>￥{{$product->price}}</span>
                </p>
            </div>
            <div class="num">x1</div>
        </div>
    </div>
    <div class="payMent">
        <dl>
            <dt>商品合计</dt>
            <dd class="red_color">￥{{$product->price}}</dd>
        </dl>
        <dl>
            <dt>运费</dt>
            <dd>0.00</dd>
        </dl>
        <dl>
            <dt>M豆抵扣</dt>
            <dd class="red_color">-{{$product->integral}}M豆</dd>
        </dl>
    </div>
    <div class="payGood">
        <div class="total">
            实付款：
      <span class="price">
        <small>￥</small>{{$product->price}}
      </span>
        </div>
        {{--改成 form 表单--}}
        <a href="javascript:;" class="go_pay">去付款</a>
    </div>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
@endsection