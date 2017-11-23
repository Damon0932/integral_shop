@extends('layouts.shop', [
    'title' => '收货地址',
    'tar_bar' => 'index',
    'active' => ''
])
@section('content')
    <div class="addressList">
        @foreach($addresses as $address)
            <div class="address">
                <div class="select @if($address->default == '1') selected @endif"  data-id="{{$address->id}}"></div>
                <div class="detail">
                    <p>{{$address->province.$address->city.$address->district.$address->address}}</p>

                    <p>{{$address->receiver_name}} {{$address->receiver_phone}}</p>
                </div>
                <a class="edit" href="{{route('address.edit', ['id' =>$address->id])}}"></a>
            </div>
        @endforeach
    </div>
    <div class="addressBtn">
        <a href="javascript:;" class="btn" id="setAddress">设为默认</a>
        <a href="{{route('address.create')}}" class="btn">添加新地址</a>
    </div>
    <script>
        var addressid = '';
        $('.select').click(function){
            if($(this).hasClass('selected')) return false;
            $('.address .select').removeClass('selected');
            $(this).addClass('selected');
            addressid = $(this).attr('data-id');
        }
        $('#setAddress').click(function(){
            if(addressid !== ''){
                window.location.href='/shop/address/'+addressid+'/set-default';
            }
        })
    </script>
@endsection
