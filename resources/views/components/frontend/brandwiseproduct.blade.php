
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>Digital &amp; Electronics</span></li>
    </ul>
</div>

<div class="row">

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
        <div class="widget mercado-widget categories-widget">
            <h2 class="widget-title">All Categories</h2>
            <div class="widget-content">
                <ul class="list-category">
                    @foreach ($categorys as $category)
                    <li class="category-item has-child-cate">
                        <a href="{{route('categorybyproduct',$category->id)}}" class="cate-link">{{$category->categoryName}}</a>
                        <span class="toggle-control">+</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div><!-- Categories widget-->

        <div class="widget mercado-widget filter-widget price-filter">
            <h2 class="widget-title">Price</h2>
            <div class="widget-content">
                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 15%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span></div>
                <p>
                    <label for="amount">Price:</label>
                    <input type="text" id="amount" readonly="">
                    <button class="filter-submit">Filter</button>
                </p>
            </div>
        </div><!-- Price-->

        <div class="widget mercado-widget filter-widget brand-widget">
            <h2 class="widget-title">Brand</h2>
            <div class="widget-content">
                <ul class="list-style vertical-list list-limited" data-show="6">
                    @foreach ($brand as $brand)
                    <li class="list-item"><a class="filter-link" href="{{route('brandbyproduct',$brand->id)}}">{{$brand->brandName}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div><!-- brand widget-->



        <div class="widget mercado-widget widget-product">
            <h2 class="widget-title">Popular Products</h2>
            <div class="widget-content">
                <ul class="products">
                    <li class="product-item">
                        <div class="product product-widget-style">
                            <div class="thumbnnail">
                                <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                    <figure><img src="assets/images/products/digital_01.jpg" alt=""></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                <div class="wrap-price"><span class="product-price">$168.00</span></div>
                            </div>
                        </div>
                    </li>

                    <li class="product-item">
                        <div class="product product-widget-style">
                            <div class="thumbnnail">
                                <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                    <figure><img src="assets/images/products/digital_17.jpg" alt=""></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                <div class="wrap-price"><span class="product-price">$168.00</span></div>
                            </div>
                        </div>
                    </li>

                    <li class="product-item">
                        <div class="product product-widget-style">
                            <div class="thumbnnail">
                                <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                    <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                <div class="wrap-price"><span class="product-price">$168.00</span></div>
                            </div>
                        </div>
                    </li>

                    <li class="product-item">
                        <div class="product product-widget-style">
                            <div class="thumbnnail">
                                <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                    <figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                <div class="wrap-price"><span class="product-price">$168.00</span></div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div><!-- brand widget-->

    </div><!--end sitebar-->

    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

        <div class="banner-shop">
            <a href="#" class="banner-link">
                <figure><img src="{{asset("assets/images/shop-banner.jpg")}}" alt=""></figure>
            </a>
        </div>

        <div class="wrap-shop-control">

            <h1 class="shop-title">Digital &amp; Electronics</h1>

            <div class="wrap-right">

                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen" style="display: none;">
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                    </select>
                </div>

                <div class="change-display-mode">
                    <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                    <a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                </div>

            </div>

        </div><!--end wrap shop control-->

        <div class="row">


            <ul class="product-list grid-products equal-container">
                @php
                // $catwiseproduct = App\Models\Product::orderBy('id','DESC')->get();
            @endphp
                @forelse ($products as $product)
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem " style="height: 388px;">
                        <div class="product-thumnail">
                            <a href="{{url('product/details/'.$product->id)}}" title="{{$product->title}}">
                                <figure><img src="{{asset("uploads/product/$product->image")}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{$product->title}}</span></a>
                            <div class="wrap-price"><span class="product-price"><del>${{$product->price}}</del> - ${{$product->discount_price}}</span></div>
                            <a href="#" class="btn add-to-cart">Add To Cart</a>
                        </div>
                    </div>
                </li> 
                @empty
                <h4 class="text-danger"style="padding:28px">Products Not Fuond in this Brand !</h4>
                @endforelse
            </ul>
        </div>

        <div class="wrap-pagination-info">
            <ul class="page-numbers">
                <li><span class="page-number-item current">1</span></li>
                <li><a class="page-number-item" href="#">2</a></li>
                <li><a class="page-number-item" href="#">3</a></li>
                <li><a class="page-number-item next-link" href="#">Next</a></li>
            </ul>
            <p class="result-count">Showing 1-8 of 12 result</p>
        </div>
    </div><!--end main products area-->

</div>

