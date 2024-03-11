@extends('web.layouts.master')

@section('title', 'Myshoes - Giày chính hãng')

@push('css')
    <style>
        .brand {
            background-color: rgba(247, 245, 245, 0.7);
            font-size: 11px;
            padding: 5px 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand a {
            color: rgb(182, 174, 174);
        }

        .brand a:hover {
            color: #0a437f;
            text-decoration: none;
        }

        .product-layout {
            position: relative;
        }

        .name {
            line-height: 16px;
            height: 32px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            padding: 0px 5px;
        }

        .product-layout:hover .bottom-bar {
            display: block;
            transform: translateY(0);
        }

        .bottom-bar {
            display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: #0a437f;
            transition: transform 0.5s ease-in;
        }
    </style>
@endpush

@section('content')
    @include('web.layouts.breadcrumb')
    <div class="container">
        <div class="row px-5">
            @include('web.layouts.filter')
            <div class="col-md-10 ps-3 pe-0">
                <div class="column-right pt-3 ps-3 pe-0">
                    <div class="content">
                        <div class="page-title mb-3">
                            <h1 style="font-size: 18px; font-weight: 700; letter-spacing: 1px"></h1>
                        </div>
                        <div class="banner-product mb-3">
                            <img src="{{ asset('images/banner/women-day-2024-cata-1140x500.png') }}"
                                style="max-width: 100%; height: auto;" alt="banner">
                        </div>
                        <div class="content-top">
                            <div class="content-description">
                                <p style="font-size: 14px"></p>
                            </div>
                            <div class="banner-bottom" style="padding: .7rem !important;">
                                <div class="row" style="font-size: 13px">
                                    <div class="col-md-4 text-center pt-2 border border-end-0">
                                        <i class="bi bi-star" style="font-size: 1.5rem; color: #0f3057"></i>
                                        <p>Hàng chính hãng, chất lượng cao</p>
                                    </div>
                                    <div class="col-md-4 text-center pt-2 border border-end-0">
                                        <i class="bi bi-truck" style="font-size: 1.5rem; color: #0f3057"></i>
                                        <p>Miễn phí giao hàng với đơn >500k</p>
                                    </div>
                                    <div class="col-md-4 text-center pt-2 border">
                                        <i class="bi bi-arrow-left-right" style="font-size: 1.5rem; color: #0f3057"></i>
                                        <p>Đổi hàng 30 ngày thủ tục đơn giản</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="row g-0 pt-4">
                                @foreach ($brand->products as $product)
                                    <div class="col-md-3">
                                        <div class="product-layout border">
                                            <a href="{{route('web.detailsProduct', [$brand->slug, $product->id])}}" class="img-product d-block position-relative">
                                                <img src="{{ asset('images/shoes/nike/giay-nike-run-swift-3-nam-xanh-01-500x500.jpg') }}"
                                                    class="object-fit-cover w-100 h-100" alt="shoes">
                                                <div class="bottom-bar"></div>
                                            </a>
                                            <div class="brand">
                                                <a href="">{{ $product->brand->name }}</a>
                                            </div>
                                            <div class="caption text-center py-3" style="font-size: 13px">
                                                <div class="name">{{ $product->name }}</div>
                                                <div class="price text-danger fw-bold mt-2" style="font-size: 13.5px">
                                                    {{ $product->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container g-0">

        </div>
        @include('web.layouts.feedback')
    @endsection

    @push('javascript')
        <script type="text/javascript">
            $(document).ready(function() {
                let brands = ['nike', 'puma', 'balance', 'converse', 'adidas', 'vans'];
                let currentUrl = window.location.href;
                var substring = currentUrl.split('-').pop();
                brands.forEach(element => {
                    if (substring.includes(element)) {
                        $('.page-title h1').text(`GIÀY ${element.toUpperCase()} CHÍNH HÃNG`);
                        $('.content-description p').text(`Giày ${element.toUpperCase()} chính hãng, đa dạng kiểu dáng, bền đẹp, giá luôn tốt
                                    nhất. Tất cả sản phẩm đều được nhập khẩu và phân phối chính hãng. 30 ngày đổi hàng, bảo
                                    hành 6 tháng, miễn phí giao hàng toàn quốc.`)
                    }
                });
            });
        </script>
    @endpush
