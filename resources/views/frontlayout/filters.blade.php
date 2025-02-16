<?php 
use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters();
//dd($productFilters);

?>
<div class="sidebar sidebar-shop">
    <div class="widget widget-clean">
        <label>Filters:</label>
        <a href="#" class="sidebar-filter-clear">Clean All</a>
    </div><!-- End .widget widget-clean -->

    <div class="widget widget-collapsible">
        <h3 class="widget-title" style="padding: 10px; background: #e2fa92;">
            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                Category
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-1">
            <div class="widget-body">
                <div class="filter-items filter-items-count">
                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-1">
                            <label class="custom-control-label" for="cat-1">Dresses</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">3</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-2">
                            <label class="custom-control-label" for="cat-2">T-shirts</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">0</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-3">
                            <label class="custom-control-label" for="cat-3">Bags</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">4</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-4">
                            <label class="custom-control-label" for="cat-4">Jackets</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">2</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-5">
                            <label class="custom-control-label" for="cat-5">Shoes</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">2</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-6">
                            <label class="custom-control-label" for="cat-6">Jumpers</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">1</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-7">
                            <label class="custom-control-label" for="cat-7">Jeans</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">1</span>
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-8">
                            <label class="custom-control-label" for="cat-8">Sportwear</label>
                        </div><!-- End .custom-checkbox -->
                        <span class="item-count">0</span>
                    </div><!-- End .filter-item -->
                </div><!-- End .filter-items -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->

    

    <div class="widget widget-collapsible">
        <h3 class="widget-title" style="padding: 10px;
    background: #ffeb9c;">
            <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                Colour
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-3">
            <div class="widget-body">
                <div class="filter-colors">
                    <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                    <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color
                            Name</span></a>
                    <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                </div><!-- End .filter-colors -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->
    @foreach($productFilters as $filter)
    <div class="widget widget-collapsible">
        <h3 class="widget-title" style="padding: 10px;background: #ffc7a5;">
            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
            {{$filter['filter_name']}}
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-4">
            <div class="widget-body">
                <div class="filter-items">
                @foreach($filter['filter_values'] as $value)
                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-1">
                            <label class="custom-control-label" for="brand-1">{{ $value['filter_value'] }}</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->
                @endforeach
                    
                </div><!-- End .filter-items -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->
    @endforeach
    <div class="widget widget-collapsible">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                Price
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-5">
            <div class="widget-body">
                <div class="filter-price">
                    <div class="filter-price-text">
                        Price Range:
                        <span id="filter-price-range"></span>
                    </div><!-- End .filter-price-text -->

                    <div id="price-slider"></div><!-- End #price-slider -->
                </div><!-- End .filter-price -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->
</div>

