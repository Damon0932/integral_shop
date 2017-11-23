@extends('layouts.shop', [
    'title' => '积分兑换',
    'tar_bar' => 'index',
    'active' => 'beans'
])
@section('content')
    <div class="rollin">
        <form action="{{route('beans.store')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <dl>
                <dt>选择积分平台</dt>
                <dd>
                    <label>
                        <select name="project_id" id="platform" required>
                            <option value="">请选择</option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}" data-integral="{{$project->max_integral}}" data-rate="{{$project->exchange_rate}}">{{$project->project_name_cn}}</option>
                            @endforeach
                        </select>
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>当前可转积分</dt>
                <dd id="integral">1200</dd>
                {{--$project->max_integral--}}

            </dl>
            <dl>
                <dt>积分转M豆比例</dt>
                <dd ="rate">1：1</dd>
                {{--$project->exchange_rate--}}
            </dl>
            <dl>
                <dt>积分转入数量</dt>
                <dd>
                    <input type="number" placeholder="请输入" name="integral" required>
                </dd>
            </dl>
            <div class="submit">
                <button type="submit">确认转入</button>
            </div>
        </form>
    </div>
	<script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
	<script>
    $("#platform").change(function(){
      var selectedOption = $('#platform option').not(function(){ return !this.selected });
      $("#integral").text(selectedOption.attr('data-integral'));
      $("#rate").text(selectedOption.attr('data-rate'));
    });
  </script>
@endsection

