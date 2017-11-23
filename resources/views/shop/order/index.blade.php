@extends('layouts.shop', [
    'title' => '兑换记录',
    'tar_bar' => 'index',
    'active' => 'order'
])

@section('content')
    <div class="orderTab">
        <div class="tab_item active" data-index="0">
            全部
        </div>
        <div class="tab_item" data-index="1">
            待发货
        </div>
        <div class="tab_item" data-index="2">
            待收货
        </div>
        <div class="tab_item" data-index="3">
            已完成
        </div>
    </div>
    <div class="order_cont">
        <div>
            @if(is_null($orders))
                <div class="noData">
                    <img src="/images/nodata.png" class="nodata_img" alt="">

                    <p class="nodata_text">没有相关订单!</p>
                </div>
            @else
                @foreach($orders as $order)
                    <div class="order_list">
                        <div class="order_hd">
                            <p>
                                <span class="hd_label">订 单 号：</span>{{$order->order_sn}}</p>

                            <p>
                                <span class="hd_label">下单时间：</span>{{$order->created_at}}</p>
                            <span class="order_status">{{$order->status_name}}</span>
                        </div>
                        <div class="order_bd">
                            <div class="img">
                                <img src="{{$order->product->logo}}" alt="">
                            </div>
                            <div class="info">
                                <p class="title">{{$order->product->name}}</p>

                                <p class="speci">{{$order->product->spec}}</p>

                                <p class="price">{{$order->product->integral}}M豆</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div style="display:none">

        </div>
        <div style="display:none">

        </div>
        <div style="display:none">

        </div>
    </div>
    <script>
        $(function ($) {
            var widget = $('.orderTab');
            var tabs = widget.find('tab_item'),
                    content = widget.find('.order_cont > div');
            tabs.on('click', function (e) {
                e.preventDefault();
                var index = $(this).data('index');
                tabs.removeClass('active');
                content.css('display', 'none');
                $(this).addClass('active');
                content.eq(index).css('display', 'block');
            });
        });
    </script>
@endsection



