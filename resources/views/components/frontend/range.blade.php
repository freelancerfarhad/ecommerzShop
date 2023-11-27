<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
			
    <div class="widget mercado-widget filter-widget price-filter">
        <h2 class="widget-title">Price</h2>
        {{-- <div class="widget-content">
            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div>
                <span tabindex="0" id="input_left"class="ui-slider-handle ui-corner-all ui-state-default" style="left: 15%;"></span>
                <span tabindex="0" id="input_right" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span>
            </div>
            <p>
                <label for="amount">Price:</label>
                <input type="text" id="amount" readonly="">
                <button class="filter-submit">Filter</button>
            </p>
        </div> --}}

        <div class="middle">
            <div id="multi_range">
                <span id="left_value">25</span><span> ~ </span><span id="right_value">75</span>
            </div>
            <div class="multi-range-slider my-2">
                <input type="range" id="input_left" class="range_slider" min="0" max="100" value="25" onmousemove="left_slider(this.value)">
                <input type="range" id="input_right" class="range_slider" min="0" max="100" value="75" onmousemove="right_slider(this.value)">
                <div class="slider">
                    <div class="track"></div>
                    <div class="range"></div>
                    <div class="thumb left"></div>
                    <div class="thumb right"></div>
                </div>
            </div>
        </div>
    </div><!-- Price-->


</div><!--end sitebar-->
