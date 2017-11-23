@extends('layouts.shop', [
    'title' => '积分兑换',
    'tar_bar' => 'index',
    'active' => 'beans'
])
@section('content')
    <div class="integral_info">
        <div class="date">{{$month}}</div>
        <p class="info">转入：+ {{$exchange_sum}} 兑换：- {{$used_sum}}</p>
        <span class="select_time iconfont icon-riqi" id="date-selector"></span>
    </div>
    <div class="integral_list">
        @foreach($beansLogs as $beansLog)
            <div class="integral_item">
                <a href="">
                    <h4 class="title">{{$beansLog->type_name}}</h4>

                    <p class="time">{{$beansLog->created_at}}</p>
                    @if($beansLog->type == 1)
                        <p class="sum income">+ {{$beansLog->beans}}</p>
                    @else
                        <p class="sum">- {{$beansLog->beans}}</p>
                    @endif

                </a>
            </div>
        @endforeach
    </div>
    <div id="targetContainer"></div>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
    <script src="/js/DataSelector.js"></script>
    <script>
        new DateSelector({
            input: 'date-selector',//点击触发插件的input框的id
            container: 'targetContainer',//插件插入的容器id
            type: 0,
            param: [1, 1, 0, 0, 0],
            //设置['year','month','day','hour','minute'],1为需要，0为不需要,需要连续的1
            beginTime: [2011, 1],//如空数组默认设置成1970年1月1日0时0分开始，如需要设置开始时间点，数组的值对应param参数的对应值。
            endTime: [],//如空数组默认设置成次年12月31日23时59分结束，如需要设置结束时间点，数组的值对应param参数的对应值。
            recentTime: [],//如不需要设置当前时间，被为空数组，如需要设置的开始的时间点，数组的值对应param参数的对应值。
            success: function (arr) {
                console.log(arr);
                //ajax
            }//回调
        });
    </script>
@endsection
