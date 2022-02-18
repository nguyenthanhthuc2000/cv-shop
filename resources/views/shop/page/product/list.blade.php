@extends('shop.layout.master_layout')
@section('content')
    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ $titlePage }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" >
                            <div class="" id="" >
                                <div class="tab-single">
                                    <div class="row">
                                        @foreach($products as $p)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="{{ route('product.detail', $p->slug) }}">
                                                        <img class="default-img" src="{{ getImage($p->photo, 'product') }}" alt="#">
                                                        @if($p->highlights == 1)<span class="out-of-stock">Nổi bật</span>@endif
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a title="Xem chi tiết" href="#"><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
                                                            <a title="Yêu thích" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            @if($p->quantily > 0)
                                                                <a title="Thêm vào giỏ hàng" data-id="{{ encryptDecrypt( $p->id ) }}" class="btn-add-cart-list">Mua ngay</a>
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
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="paginate-styling">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->
@endsection
