@extends('layouts.shop', [
    'title' => '积分',
    'tar_bar' => 'index',
    'active' => 'beans'
])
@section('content')
    <div class="headBalance">
        <p>当前可用M豆</p>

        <div class="balance_num">{{session('med_user')['beans']}}</div>
        <a href="{{route('beans.create')}}" class="rollin_btn">积分转入</a>
    </div>
    <div class="integral_hd">
        <div class="left">变动记录</div>
        <a href="{{route('beans.month', ['month' => date('Y-m')])}}">查看全部</a>
    </div>
    <div class="integral_list">
        @foreach($beansLogs as $beansLog)
            <div class="integral_item">
                <a href="{{route('beans.show', ['id' => $beansLog->id])}}">
                    <h4 class="title">{{$beansLog->type_name}}</h4>

                    <p class="time">{{$beansLog->created_at}}</p>
                    @if($beansLog->type == 1)
                        <p class="sum income">+ {{$beansLog->beans}}</p>
                    @elseif($beansLog->type == 2)
                        <p class="sum">- {{$beansLog->beans}}</p>
                    @endif
                </a>
            </div>
        @endforeach
    </div>
@endsection

