@extends('layouts.shop', [
    'title' => '积分兑换',
    'tar_bar' => 'index',
    'active' => 'beans'
])
@section('content')
    <div class="exchangeDetail">
        <p class="time">时间：{{$beansLog->created_at}}</p>

        <div class="detail">
            @if($beansLog->type == 1)
                <p>M豆变动：<span>+ {{$beansLog->beans}}</span></p>
            @else
                <p>M豆变动：<span>- {{$beansLog->beans}}</span></p>
            @endif
            <p>{{$beansLog->description}}</p>
        </div>
    </div>
@endsection

