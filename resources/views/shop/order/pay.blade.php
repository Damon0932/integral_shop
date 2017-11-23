@extends('layouts.shop', [
    'title' => '支付',
    'tar_bar' => 'pay'
])
@section('content')
    <form action="{{route('order.store')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="address_phone" value="{{$defaultAddress?$defaultAddress->receiver_phone : ''}}">
        <input type="hidden" name="receiver_name" value="{{$defaultAddress?$defaultAddress->receiver_name : ''}}">
        <input type="hidden" name="province" value="{{$defaultAddress?$defaultAddress->province : ''}}">
        <input type="hidden" name="city" value="{{$defaultAddress?$defaultAddress->city : ''}}">
        <input type="hidden" name="district" value="{{$defaultAddress?$defaultAddress->district : ''}}">
        <input type="hidden" name="address" value="{{$defaultAddress?$defaultAddress->address : ''}}">

        <div class="userOrder">
            @if(is_null($defaultAddress))
                <a href="{{route('address.create')}}" class="noaddress"><img src="/images/address.png" alt="">添加地址</a>
            @else
                <i class="iconfont icon-location"></i>
                <a href="{{route('address.index')}}" class="userInfo">
                    <p>
                        <span>收货人：</span>
                        {{$defaultAddress->receiver_name}}
                    </p>

                    <p>
                        <span>手机号：</span>
                        {{$defaultAddress->receiver_phone}}
                    </p>

                    <p>
                        <span>收货地址：</span>
                        {{$defaultAddress->province.$defaultAddress->city.$defaultAddress->district.$defaultAddress->address}}
                    </p>
                </a>
                <div class="orderArrow"></div>

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
            @if(is_null($defaultAddress))
                <a href="javascript:;" class="go_pay" style="background-color:#AAAAAA;color:white">请添加地址</a>
            @else
                <a href="javascript:;" class="go_pay" id="go_pay">去付款</a>
            @endif
        </div>

        <div class="dialog dialog-open  dialog-modal" id="dialog" style="display:none">
            <div class="dialog-overlay"></div>
            <div class="dialog-content">
                <div class="dialog-content-hd">
                    <h3 class="dialog-content-title">提示</h3>
                </div>
                <div class="dialog-content-bd content-scroll">确认支付？</div>
                <div class="dialog-content-ft side">
                    <button class="dialog-btn dialog-btn-confirm" type="submit">确定</button>
                    <button class="dialog-btn dialog-btn-cancel" type="button">取消</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $('#go_pay').click(function () {
            $('#dialog').css('display', 'block');
        })
        $('.dialog-btn-cancel').click(function () {
            $('#dialog').css('display', 'none');
        })
    </script>
@endsection