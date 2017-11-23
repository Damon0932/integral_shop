@if($tar_bar == 'detail')
    <div class="exchangeBox">
        @if(session('med_user')['beans'] >= $product->integral)
            <a href="{{route('order.pay', ['productId' => $product->id])}}" class="exchange_btn">立即兑换</a>
        @else
            <a href="javascript:;" class="exchange_btn disabled">M豆不足</a>
        @endif
    </div>
@elseif($tar_bar == 'pay')

@elseif($tar_bar == 'order')
    
@else
    <div class="tabbar">
        <a href="{{route('product.index')}}" class="tabbar_item @if($active == 'product') active @endif">
            <span class="icon iconfont icon-shouye"></span>

            <p class="tabbar_title">首页</p>
        </a>
        <a href="{{route('order.index')}}" class="tabbar_item @if($active == 'order') active @endif">
            <span class="icon iconfont icon-duihuanjilu-copy"></span>

            <p class="tabbar_title">兑换记录</p>
        </a>
        <a href="{{route('beans.index')}}" class="tabbar_item  @if($active == 'beans') active @endif">
            <span class="icon iconfont icon-modou"></span>

            <p class="tabbar_title">我的M豆</p>
        </a>
    </div>
@endif

