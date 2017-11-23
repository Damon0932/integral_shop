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
                        <select name="project_id" id="" required>
                            <option value="">请选择</option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name_cn}}</option>
                            @endforeach
                        </select>
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>当前可转积分</dt>
                <dd>1200</dd>
                {{--$project->max_integral--}}

            </dl>
            <dl>
                <dt>积分转M豆比例</dt>
                <dd>1：1</dd>
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
@endsection

