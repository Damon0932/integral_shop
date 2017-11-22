@extends('layouts.shop', [
    'title' => '积分',
    'tar_bar' => 'index',
    'active' => 'beans'
])

@section('content')
    <div class="headBalance">
        <p>当前可用M豆</p>

        <div class="balance_num">2500</div>
        <a href="" class="rollin_btn">积分转入</a>
    </div>
    <div class="integral_hd">
        <div class="left">变动记录</div>
        <a href="">查看全部</a>
    </div>
    <div class="integral_list">
        <div class="integral_item">
            <a href="">
                <h4 class="title">微信红包</h4>

                <p class="time">2017-01-28 17:25:10</p>

                <p class="sum income">+ 2.88</p>
            </a>
        </div>
        <div class="integral_item">
            <a href="">
                <h4 class="title">微信红包</h4>

                <p class="time">2017-01-28 17:25:10</p>

                <p class="sum">- 2.88</p>
            </a>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
@endsection

