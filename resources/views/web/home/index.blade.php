@extends('web.layouts.master')

@section('title', 'Myshoes - Giày chính hãng')

@push('css')
    <style>
        .title-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .title-wrapper h3 {
            font-weight: 700;
            font-size: 22px;
            color: #0f3057;
            margin: 0;
        }

        .title-divider {
            width: 50px;
            height: 4px;
            background-color: rgba(226, 41, 61, 1);
            margin: 10px 0px;
        }

        .title-wrapper .subtitle {
            font-size: 16px;
            color: #0f3057;
        }

        .brand {
            background-color: rgba(247, 245, 245, 0.7);
            font-size: 11px;
            padding: 5px 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand a:hover {
            color: #0a437f !important;
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

        .slide-container {
            margin: 0 30px;
            overflow: hidden;
        }

        .card {
            background-color: rgba(227, 223, 223, 0.7);
            border-radius: 5px;
            padding: 20px;
            border: 0;
        }

        .card .image-box {
            height: 100%;
        }

        .card .image-box img {
            width: 100%;
            height: 100%;
        }

        .detail-feedback {
            font-size: 16px;
            text-align: center;
        }

        .swiper-navBtn {
            color: #fff;
            height: 30px;
            width: 30px;
            background: #0a437f;
            border-radius: 50%;
        }

        .swiper-navBtn:hover {
            background-color: rgba(226, 41, 61, 1);
        }

        .swiper-navBtn::before,
        .swiper-navBtn::after {
            font-size: 12px;
            font-weight: 700;
        }

        .swiper-pagination-bullet {
            background-color: rgba(226, 41, 61, 1);
        }

        @media screen and (max-width: 768px) {
            .swiper-navBtn {
                display: none;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container slide-banner">
        <div class="banner-top py-4 px-5">
            <div class="row">
                <div class="col-md-3 p-0">
                    <a href="" class="text-start d-block">
                        <img src="{{ asset('images/banner/slide-trai-20-300x500h.png') }}"
                            style="height: 467px; width: 280.2px;" alt="left_slide">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="" class="text-center d-block">
                        <img src="{{ asset('images/banner/sieu-sale-slide-3-3-1240x1000h.png') }}"
                            style="height: 468px; width: 585px;" alt="center_slide">
                    </a>
                </div>
                <div class="col-md-3 pe-0">
                    <a href="" class="text-end d-block">
                        <img src="{{ asset('images/banner/xit-khu-mui-jpg-300x500h.jpg') }}"
                            style="height: 467px; width: 280.2px;" alt="right_slide">
                    </a>
                </div>
            </div>
        </div>
        <div class="banner-bottom py-4 px-5">
            <div class="row" style="font-size: 13px">
                <div class="col-md-4 text-center pt-2 border border-end-0">
                    <i class="bi bi-star" style="font-size: 1.5rem; color: #0f3057"></i>
                    <p>Hàng chính hãng, chất lượng cao</p>
                </div>
                <div class="col-md-4 text-center pt-2 border border-end-0 ">
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
    <div class="container p-0">
        <div class="tab-content py-5 px-5">
            <div class="title-wrapper">
                <h3>SẢN PHẨM MỚI</h3>
                <div class="title-divider"></div>
                <div class="subtitle">#NEW</div>
            </div>
            <div class="row g-0 pt-4">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="product-layout border">
                            <a href="" class="img-product d-block position-relative">
                                <img src="{{ asset('images/shoes/nike/giay-nike-run-swift-3-nam-xanh-01-500x500.jpg') }}"
                                    class="object-fit-cover w-100 h-100" alt="shoes">
                                <div class="bottom-bar"></div>
                            </a>
                            <div class="brand">
                                <a href="" data-id="{{$product->id}}" class="text-secondary">{{ $product->brand->name }}</a>
                            </div>
                            <div class="caption text-center py-3" style="font-size: 13px">
                                <a href="#" class="name text-secondary-emphasis text-decoration-none">{{ $product->name }}</a>
                                @if ($product->sale == 0)
                                    <span class="price fw-bold mt-2">
                                        {{ $product->price }}
                                    </span>
                                @else
                                    <span class="price text-danger fw-bold mt-2">
                                        {{ $product->priceAfterSale }}
                                    </span>
                                    <span class="price text-secondary fw-medium mt-2 text-decoration-line-through">
                                        {{ $product->price }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('web.layouts.feedback')
@endsection

@push('javascript')
    <script type="text/javascript">
        let brand = $('.brand a');
        // console.log(brand);
        brand.each(function(hell) {
            let slug = `giay-${$(this).text().toLowerCase()}`;
            let id_p = $(this).attr('data-id');
            let route = `/thoi-trang/${slug}/${id_p}`;
            $(this).parent().prev().attr('href', route);
        });
    </script>
@endpush
