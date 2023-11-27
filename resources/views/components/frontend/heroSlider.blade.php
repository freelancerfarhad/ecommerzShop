<div class="wrap-main-slide">
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
        @foreach ($sliders as $item)
        <div class="item-slide">
            <img src="{{asset("uploads/slider/$item->image")}}" alt="" class="img-slide">
            <div class="slide-info slide-1">
                <h2 class="f-title">{{$item->title}}</h2>
                <span class="subtitle">{{$item->short_des}}</span>
                <p class="sale-info">Only price: <span class="price">${{$item->price}}</span></p>
                <a href="#" class="btn-link">Shop Now</a>
            </div>
        </div>
        @endforeach
    </div>
</div>