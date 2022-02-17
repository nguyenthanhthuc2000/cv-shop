@extends('shop.layout.master_layout')
@section('content')
    @section('slider')
        @include('shop.layout.slider')
    @endsection

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" >
                            <!-- Start Single Tab -->
                            <div class="" >
                                <div class="tab-single">
                                    <div class="row">
                                        @foreach($productsNew as $pn)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="{{ route('product.detail', $pn->slug) }}">
                                                        <img class="default-img" src="{{ getImage($pn->photo, 'product') }}" alt="#">
{{--                                                        <img class="hover-img" src="https://via.placeholder.com/550x600" alt="#">--}}
                                                        @if($pn->highlights == 1)<span class="out-of-stock">Nổi bật</span>@endif
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a title="Xem chi tiết" href="#"><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
                                                            <a title="Yêu thích" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            @if($pn->quantily > 0)
                                                                <a title="Thêm vào giỏ hàng" href="#">Mua ngay</a>
                                                            @else
                                                                <a title="Sản phẩm đã hết hàng" href="#">Hết hàng</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="{{ route('product.detail', $pn->slug) }}" class="text-split-1">{{ $pn->name }}</a></h3>
                                                    <div class="product-price">
                                                        @if($pn->price_pro > 0)
                                                            <span class="old">{{ numberFormat($pn->price) }}</span>
                                                            <span>{{ numberFormat($pn->price_pro) }}</span>
                                                        @else
                                                            <span>{{ numberFormat($pn->price) }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach($productsHL as $pHl)
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('product.detail', $pHl->slug) }}">
                                    <img class="default-img" src="{{ getImage($pHl->photo, 'product') }}" alt="#">
{{--                                    <img class="hover-img" src="https://via.placeholder.com/550x600" alt="#">--}}
                                    @if($pHl->highlights == 1)<span class="out-of-stock">Nổi bật</span>@endif
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a title="Xem chi tiết" href="#"><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
                                        <a title="Yêu thích" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        @if($pHl->quantily > 0)
                                        <a title="Thêm vào giỏ hàng" href="#">Mua ngay</a>
                                        @else
                                        <a title="Sản phẩm đã hết hàng" href="#">Hết hàng</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.detail', $pHl->slug) }}" class="text-split-1">{{ $pHl->name }}</a></h3>
                                <div class="product-price">
                                    @if($pHl->price_pro > 0)
                                    <span class="old">{{ numberFormat($pHl->price) }}</span>
                                    <span>{{ numberFormat($pHl->price_pro) }}</span>
                                    @else
                                        <span>{{ numberFormat($pHl->price) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

<section class="box-album section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Album</h2>
                </div>
            </div>
            <div class="album">
                @foreach($albums as $album)
                    <div class="album-img">
                        <a href="{{$album->link}}">
                            <img class="" src="{{ getImage($album->photo, 'image') }}" alt="{{$album->desc}}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Shop Blog  -->
    <!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Bài viết</h2>
                </div>
            </div>
        </div>
        <div class="slick-bai-viet">
            @foreach($baiviets as $key => $baiviet)
                <div class="bai-viet">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                            <img class="height367" src="{{ getImageCrawl($baiviet->photo, $baiviet->crawl) }}" alt="{{ $baiviet->name }}">
                            <div class="content">
                                <p class="date">Đăng ngày {{date_format($baiviet->created_at,"d-m-Y")}}</p>
                                <a href="" class="title text-split-1">{{$baiviet->name}}</a>
                                <a href="" class="more-btn">Xem chi tiết</a>
                            </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            @endforeach
        </div>
    </div>
</section>





@endsection
