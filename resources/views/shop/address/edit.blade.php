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
                    <input type="text" placeholder="请输入" name="receiver_name" value="{{$address->receiver_name}}"
                           required>
                </dd>
            </dl>
            <dl>
                <dt>电话</dt>
                <dd>
                    <input type="text" placeholder="请输入" name="receiver_phone" value="{{$address->receiver_phone}}"
                           required>
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
                <dd><input type="text" placeholder="请输入详细地址" name="address" required value="{{$address->address}}"></dd>
            </dl>

            <div class="addressBtn">
                <button type="submit" class="btn">修改</button>

            </div>
        </form>
        <div class="addressBtn" style="margin-top: .266667rem;">
            <form action="{{route('address.destroy',['id' => $address->id])}}" method="POST">
                {{ csrf_field() }}
                {{method_field('delete')}}
                <input type="hidden" name="id" value="{{$address->id}}"
                       style="display: none;">
                <button class="btn" type="submit">删除</button>
            </form>
        </div>

    </div>

    <script src="/js/address.js"></script>
    <script>
        addressInit('Province', 'City', 'Area', '{{$address->province}}', '{{$address->city}}', '{{$address->district}}');
    </script>
@endsection
