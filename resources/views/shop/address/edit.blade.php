@extends('layouts.shop', [
    'title' => '编辑地址',
    'tar_bar' => 'index',
    'active' => ''
])
@section('content')
    <div class="editAddress">
        <form action="{{route('address.update', ['id' => $address->id])}}" method="post">
            @include('layouts.edit_form_common', ['request_id' => $address->id])
            <dl>
                <dt>名字</dt>
                <dd>
                    <input type="text" placeholder="请输入" name="receiver_name" value="{{$address->receiver_name}}" required>
                </dd>
            </dl>
            <dl>
                <dt>电话</dt>
                <dd>
                    <input type="text" placeholder="请输入" name="receiver_phone" value="{{$address->receiver_phone}}" required>
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
                <dd><input type="text" placeholder="请输入详细地址" name="address" required></dd>
            </dl>
            {{--<dl>--}}
                {{--<dt>邮编</dt>--}}
                {{--<dd><input type="number" placeholder="请输入"></dd>--}}
            {{--</dl>--}}
			<div class="addressBtn">
				<button type="submit" class="btn">修改</button>
				<a href="" class="btn">删除</a>
			</div>
        </form>
    </div>

    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
    <script src="/js/address.js"></script>
    <script>
        addressInit('Province', 'City', 'Area', '{{$address->province}}', '{{$address->city}}', '{{$address->district}}');
        $('.submit').click(function () {
            console.log($("#Province").val())
        })
    </script>
@endsection
