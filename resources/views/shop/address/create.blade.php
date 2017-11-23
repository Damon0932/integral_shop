@extends('layouts.shop', [
    'title' => '新增地址',
    'tar_bar' => 'index',
    'active' => ''
])
@section('content')
    <div class="editAddress">
        <form action="{{route('address.store')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <dl>
                <dt>名字</dt>
                <dd>
                    <input type="text" placeholder="请输入" name="receiver_name" required>
                </dd>
            </dl>
            <dl>
                <dt>电话</dt>
                <dd>
                    <input type="text" placeholder="请输入" name="receiver_phone" required>
                </dd>
            </dl>
            <dl>
                <dt>省份</dt>
                <dd>
                    <label>
                        <select name="province" id="Province" required>
                        </select>
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>城市</dt>
                <dd>
                    <label>
                        <select name="city" id="City" required>
                        </select>
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>区县</dt>
                <dd>
                    <label>
                        <select name="district" id="Area" required>
                        </select>
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>地址</dt>
                <dd><input type="text" placeholder="请输入详细地址" name="address" district></dd>
            </dl>
            {{--<dl>--}}
            {{--<dt>邮编</dt>--}}
            {{--<dd><input type="number" placeholder="请输入"></dd>--}}
            {{--</dl>--}}

           	<div class="addressBtn">
				<button type="submit" class="btn">添加</button>
			</div>
        </form>
    </div>

    <script src="/js/address.js"></script>
    <script>
        addressInit('Province', 'City', 'Area');
        $('.submit').click(function () {
            console.log($("#Province").val())
        })
    </script>
@endsection
