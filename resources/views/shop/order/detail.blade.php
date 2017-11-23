@extends('layouts.shop', [
    'title' => '积分兑换',
    'tar_bar' => 'index',
    'active' => 'beans'
])
@section('content')
    <div class="orderUserInfo">
        <div class="info_box">
            <p>
                <span>订单编号：</span>
                {{$order->order_sn}}
            </p>

            <p>
                <span>下单时间：</span>
                {{$order->created_at}}
            </p>
        </div>
        <div class="info_box">
            <p>
                <span>收货人：</span>
                {{$order->address_name}} {{$order->address_phone}}
            </p>

            <p>
                <span>地址：</span>
                {{$order->address_province.$order->address_city.$order->address_district.$order->address_detail}}
            </p>
        </div>
    </div>
    <div class="goodOrders">
        <p class="head">商品列表</p>

        <div class="good">
            <div class="good_img">
                <img src="{{$order->product->logo}}"
                     alt="">
            </div>
            <div class="good_info">
                <p class="title">{{$order->product->name}}</p>

                <p class="speci">{{$order->product->spec}}</p>

                <p class="price">{{$order->product->integral}}M豆
                    <span>￥{{$order->product->price}}</span>
                </p>
            </div>
            <div class="num">x1</div>
        </div>
    </div>
    <div class="orderMessage">
        <div class="message_list">
            <dl>
                <dt>商品合计</dt>
                <dd class="red_color">￥{{$order->product->price}}</dd>
            </dl>
            <dl>
                <dt>运费</dt>
                <dd>0.00</dd>
            </dl>
            <dl>
                <dt>M豆抵扣</dt>
                <dd class="red_color">-{{$order->product->integral}}M豆</dd>
            </dl>
        </div>
        <div class="pay_num">实付款：
            <span>￥{{$order->product->price}}</span>
        </div>
    </div>
@endsection
