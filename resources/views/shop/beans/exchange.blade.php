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
                                <option value="{{$project->id}}" data-integral="{{$project->integral}}"
                                        data-rate="{{$project->exchange_rate}}">{{$project->project_name_cn}}</option>
                            @endforeach
                        </select>
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>当前可转积分</dt>
                <dd id="integral"></dd>
            </dl>
            <dl>
                <dt>积分转M豆比例</dt>
                <dd id="rate"></dd>
            </dl>
            <dl>
                <dt>积分转入数量</dt>
                <dd>
                    <input type="number" placeholder="请输入" name="integral" required max="1" min="1" id="integral_num">
                </dd>
            </dl>
            <div class="submit">
                <button type="submit" id="submit_button">确认转入</button>
            </div>
        </form>
    </div>
    <script>
        $("#platform").change(function () {
            var selectedOption = $('#platform option').not(function () {
                return !this.selected
            });
            if (selectedOption.index() === 0) return;
            $("#integral").text(selectedOption.attr('data-integral'));
            $("#rate").text('1 : ' + selectedOption.attr('data-rate'));
            $("#integral_num").attr('max', selectedOption.attr('data-integral'));
            if (selectedOption.attr('data-integral') < 1) {
                $("#submit_button").attr('disabled', false);
                $("#submit_button").css('background-color', '#AAAAAA');
                $("#submit_button").text('积分不足');
            } else {
                $("#submit_button").removeAttr('disabled');
                $("#submit_button").css('background-color', '#f38441');
                $("#submit_button").text('确认转入');
            }
        });
    </script>
@endsection

