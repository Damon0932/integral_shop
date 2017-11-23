@extends('layouts.shop', [
    'title' => '收货地址',
    'tar_bar' => 'index',
    'active' => ''
])
@section('content')
    <div class="addressList">
        @foreach($addresses as $address)
            <div class="address">
                <div class="select" @if($address->default == '1') selected @endif></div>
                <div class="detail">
                    <p>{{$address->province.$address->city.$address->district.$address->address}}</p>

                    <p>{{$address->receiver_name}} {{$address->receiver_phone}}</p>
                </div>
                <a class="edit" href="{{route('address.edit', ['id' =>$address->id])}}"></a>
            </div>
        @endforeach
    </div>
    <div class="addressBtn">
        <a href="" class="btn">设为默认</a>
        <a href="{{route('address.create')}}" class="btn">添加新地址</a>
    </div>
@endsection
