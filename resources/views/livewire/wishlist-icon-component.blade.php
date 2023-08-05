<li class="hm-wishlist">
    <a href="{{route('shop.wishlist')}}">
        @if($count > 0)
        <span class="cart-item-count wishlist-item-count">{{$count}}</span>
        @endif
        <i class="fa fa-heart-o"></i>
    </a>
</li>