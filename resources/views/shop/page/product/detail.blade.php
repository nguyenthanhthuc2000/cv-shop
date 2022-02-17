@extends('shop.layout.master_layout')
@section('content')

    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="image-detail">
                                    <div class="image">
                                        <img src="{{ getImage($product->photo) }}" alt="Chicago">
                                    </div>
                                </div>
                                <div class="blog-detail">
                                    <h1 class="blog-title">{{ $product->name }}</h1>
{{--                                    <div class="blog-meta">--}}
{{--                                        <span class="author"><a href="#"><i class="fa fa-calendar"></i>10-12-2029</a><a href="#"><i class="fa fa-comments"></i>Bình luận (15)</a></span>--}}
{{--                                    </div>--}}
                                    <div class="content" style="text-align: justify">
                                        {!! $product->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget">
                            @if($product->price_pro)
                            <span class="new-price">{{ numberFormat($product->price_pro) }}đ</span>&ensp;<span class="old-price">{{ numberFormat($product->price) }}đ</span>
                            @else
                                <span class="new-price">{{ numberFormat($product->price) }}đ</span>
                            @endif
                        </div>
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Thông tin sản phẩm</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Trọng lượng</td>
                                        <td>{{ $product->mass }}</td>
                                    </tr>
                                    <tr>
                                        <td>Xuất xứ</td>
                                        <td>{{ $product->made_in }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mua-ngay single-widget text-center">
                            @if($product->quantily > 0)
                            <form>
                                <input type="number" class="form-control val-qty-{{encryptDecrypt($product->id)}}" min="1" value="1" name="">
                                <button type="button" class="btn btn-primary btn-add-cart" data-id="{{ encryptDecrypt($product->id) }}">Thêm vào giỏ hàng</button>
                            </form>
                            @else
                                <button type="button" class="btn btn-primary">Hiện đang hết hàng</button>
                            @endif
                        </div>
                        <!-- Single Widget -->
                        <div class="single-widget side-tags">
                            <h3 class="title">Tags</h3>
                            <ul class="tag">
                                <li><a href="#">business</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">html</a></li>
                                <li><a href="#">multipurpose</a></li>
                                <li><a href="#">education</a></li>
                                <li><a href="#">template</a></li>
                                <li><a href="#">Ecommerce</a></li>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                    @foreach($products as $p)
                        <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('product.detail', $p->slug) }}">
                                        <img class="default-img" src="{{ getImage($p->photo, 'product') }}" alt="#">
                                        {{--                                    <img class="hover-img" src="https://via.placeholder.com/550x600" alt="#">--}}
                                        @if($p->highlights == 1)<span class="out-of-stock">Nổi bật</span>@endif
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a title="Xem chi tiết" href="#"><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
                                            <a title="Yêu thích" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            @if($p->quantily > 0)
                                                <a title="Thêm vào giỏ hàng" href="#">Mua ngay</a>
                                            @else
                                                <a title="Sản phẩm đã hết hàng" href="#">Hết hàng</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('product.detail', $p->slug) }}" class="text-split-1">{{ $p->name }}</a></h3>
                                    <div class="product-price">
                                        @if($p->price_pro > 0)
                                            <span class="old">{{ numberFormat($p->price) }}</span>
                                            <span>{{ numberFormat($p->price_pro) }}</span>
                                        @else
                                            <span>{{ numberFormat($p->price) }}</span>
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

@endsection
