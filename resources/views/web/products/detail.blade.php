@extends('web.layouts.master')

@section('title', 'Myshoes - Giày chính hãng')

@push('css')
    <style>
        .product-title {
            font-size: 17px;
            font-weight: bold;
        }

        .additional-images div:hover>img {
            border: 1px solid black;
            cursor: pointer;
        }

        .countdown {
            padding: 0px 13px;
        }

        .countdown-title {
            font-size: 13px;
            color: rgba(233, 102, 49, 1);
            font-weight: 700;
            font-style: italic;
            text-transform: none;
            margin-bottom: 8px;
        }

        .countdown p {
            margin: 0;
        }

        .product-price {
            white-space: nowrap;
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        .product-price-new {
            color: #cc041a !important;
        }

        .product-price-old {
            font-size: 16px;
            font-weight: 400;
            color: #696973 !important;
            text-decoration: line-through 0.5px;
        }

        .product-stats {
            position: relative;
        }

        .list-bullet {
            font-size: 12px;
            margin-left: 20px;
            list-style-type: disc;
        }

        .list-bullet li:first-child {
            list-style-type: none;
        }

        .list-bullet li:first-child::before {
            content: '\2714 ' !important;
            font-size: 16px;
            color: rgba(80, 173, 85, 1);
            position: absolute;
            left: 7px;
        }

        b {
            font-weight: normal;
        }

        .control-label,
        .square-radio--content {
            font-size: 14px;
        }

        .square-radio {
            border: rgb(195, 188, 188) 1px solid;
            margin: 2px;
            min-width: 35px;
            min-height: 35px;
            position: relative;
            margin-right: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .square-radio:hover {
            border: 1px solid #0a437f;
            color: #0a437f;
            font-weight: 700;
            box-shadow: #0a437f;
            cursor: pointer;
        }

        .radio-clicked {
            border: 1px solid #0a437f;
            color: #0a437f;
            font-weight: 700;
            box-shadow: #0a437f;
        }

        .tips-choose-size a:hover {
            text-decoration: none;
            color: #0a437f;
        }

        .hotline-block:hover>a {
            text-decoration: none;
            color: #0a437f;
        }

        .promotion-blocks {
            background-color: #f9fff7;
            border: rgb(195, 188, 188) 1px solid;
            padding: 15px 12px;
            margin-bottom: 10px;
        }

        .info-block {
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .dollar-block {
            height: 22px;
            width: 22px;
            border-radius: 50%;
            background-color: #0a437f;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
        }

        .info-block-title {
            font-size: 17px;
            font-weight: 700;
            color: rgb(199, 10, 10);
        }

        .info-block-text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-style: italic;
            font-weight: 100;
        }

        .cart-group {
            /* border: rgb(195, 188, 188) 1px solid; */
            display: flex;
            width: 100%;
            height: 50px;
        }

        .stepper {
            display: flex;
            max-width: 70px;
            max-height: 50px;
            width: 100%;
        }

        .btn-quantity-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            width: 50%;
            background-color: rgb(243, 234, 234);
        }

        .btn-quantity-block div {
            padding-left: 5px;
            padding-right: 5px;
            cursor: pointer;
        }

        .btn-quantity-block div:hover {
            background-color: rgb(211, 206, 206);
            color: white;
        }

        .cart-buying {
            display: flex;
            justify-content: stretch;
            align-items: center;
            width: 100%;
        }

        .btn-cart {
            width: 60%;
            background-color: #0a437f;
        }

        .btn-extra {
            width: 40%;
            background: rgba(204, 4, 26, 1);
        }

        .btn-cart,
        .btn-extra {
            height: 100%;
            border-radius: 0 !important;
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-cart:hover {
            color: rgba(255, 255, 255, 1) !important;
            background: rgba(58, 88, 173, 1) !important;
            cursor: pointer;
        }

        .btn-extra:hover {
            background: rgba(226, 41, 61, 1) !important;
            cursor: pointer;
        }

        .stepper input[type="text"],
        .stepper .btn-quantity-block div {
            border: 0.5px solid black !important;
            border-right: 0 !important;
            border-radius: 0;
        }
    </style>
@endpush

@section('content')
    @include('web.layouts.breadcrumb')
    <div class="container g-0">
        <div class="row">
            <div class="content px-5 py-5 d-flex">
                <div class="detail-left col-md-7 d-flex">
                    <div class="col-md-2">
                        <div class="additional-images d-grid gap-3">
                            <div><img src="{{ asset('images/shoes/nike/giay-nike-run-swift-3-nam-xanh-01-500x500.jpg') }}"
                                    height="100px" alt=""></div>
                            <div><img src="{{ asset('images/shoes/nike/giay-nike-run-swift-3-nam-xanh-01-500x500.jpg') }}"
                                    height="100px" alt=""></div>
                            <div><img
                                    src="{{ asset('images/shoes/nike/giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-05-800x800.jpg') }}"
                                    height="100px" alt=""></div>
                            <div><img src="{{ asset('images/shoes/nike/giay-nike-run-swift-3-nam-xanh-01-500x500.jpg') }}"
                                    height="100px" alt=""></div>
                            <div><img
                                    src="{{ asset('images/shoes/nike/giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-05-800x800.jpg') }}"
                                    height="100px" alt=""></div>
                        </div>
                    </div>
                    <div class="col-md-10 pe-3">
                        <img class="object-fit-cover w-100 h-100 main-img"
                            src="{{ asset('images/shoes/nike/giay-nike-air-zoom-pegasus-40-premium-nam-xanh-lam-01-800x800.jpg') }}"
                            alt="">
                    </div>
                </div>
                <div class="detail-right col-md-5 ps-3 pt-0">
                    <div class="product-title pb-2">Giày {{ $product->name }}</div>
                    <div class="rating-stars border-bottom mb-3 pb-3">
                        <span class="bi bi-star-fill" style="color: rgba(254, 213, 84, 1)"></span>
                        <span class="bi bi-star-fill" style="color: rgba(254, 213, 84, 1)"></span>
                        <span class="bi bi-star-fill" style="color: rgba(254, 213, 84, 1)"></span>
                        <span class="bi bi-star-fill" style="color: rgba(254, 213, 84, 1)"></span>
                        <span class="bi bi-star-fill" style="color: rgba(254, 213, 84, 1)"></span>
                        <span class="review-links ms-2">
                            <a href="" class="text-decoration-none" style="font-size: 13px; color: #0a437f">6 đánh
                                giá</a>
                        </span>
                    </div>
                    <div class="countdown-wrapper">
                        <div class="countdown-title">
                            ⚡HAPPY WOMEN SALE 4.3 - 8.3⚡THỜI GIAN SALE CÒN:
                        </div>
                        <div class="countdown">
                            <div class="row" style="font-size: 13px">
                                <div class="col-md-3 text-center border border-dark border-end-0">
                                    <p>02</p>
                                    <p>Ngày</p>
                                </div>
                                <div class="col-md-3 text-center border border-dark border-end-0">
                                    <p>02</p>
                                    <p>Giờ</p>
                                </div>
                                <div class="col-md-3 text-center border border-dark border-end-0">
                                    <p>02</p>
                                    <p>Phút</p>
                                </div>
                                <div class="col-md-3 text-center border-dark border">
                                    <p>02</p>
                                    <p>Giây</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-price-group d-flex border-bottom mt-3">
                        <div class="col-md-6 border-end">
                            @if ($product->sale == 0)
                                <span class="product-price">
                                    {{ $product->price }}
                                </span>
                            @else
                                <span class="product-price product-price-new">
                                    {{ $product->priceAfterSale }}
                                </span>
                                <span class="product-price product-price-old">
                                    {{ $product->price }}
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <ul class="list-bullet m-0 ps-4 position-relative">
                                        <li class="product-stock in-stock"><b>Kho hàng:</b> <span
                                                style="color:rgba(80, 173, 85, 1); text-transform: uppercase; font-weight: 700;">Còn
                                                hàng</span></li>
                                        <li class="product-reward"><b>Điểm thưởng:</b> <span>29800</span></li>
                                        <li class="product-model"><b>Mã sản phẩm:</b> <span>MSA615</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <div class="brand-image product-manufacturer">
                                        <a class="d-block" href="{{ route('web.brandIndex', $product->brand->slug) }}">
                                            <img src="https://myshoes.vn/image/cache/data/logo/adidas-70x70w.png"
                                                srcset="https://myshoes.vn/image/cache/data/logo/adidas-70x70w.png 1x, https://myshoes.vn/image/cache/data/logo/adidas-140x140w.png 2x"
                                                alt="Adidas" class="object-fit-cover">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-options mt-3">
                        <div class="form-group">
                            <div class="control-label" for="">Chọn size</div>
                            <div class="size-options d-flex mt-2">
                                <div class="square-radio radio-clicked">
                                    <div class="square-radio--content">{{ $product_size[0]->size }}</div>
                                </div>
                                @for ($i = 1; $i < count($product_size); $i++)
                                    <div class="square-radio">
                                        <div class="square-radio--content">{{ $product_size[$i]->size }}</div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="tips-choose-size mt-3 mb-3">
                        <!-- Button trigger modal -->
                        <span>⍟ </span>
                        <a class="btn-choose-size" href="" style="font-size:14px;" data-bs-toggle="modal"
                            data-bs-target="#tipSize">
                            Hướng dẫn chọn size
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="tipSize" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <img alt="chọn size giày" src="https://myshoes.vn/image/catalog/banner/chon-size.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="promotion-blocks mb-3">
                        <div class="info-block">
                            <div class="dollar-block">
                                <i class="bi bi-currency-dollar text-warning"></i>
                            </div>
                            <div class="info-block-content">
                                <div class="info-block-title">HAPPY WOMEN KHUYẾN MÃI ĐẶC BIỆT</div>
                                <div class="info-block-text">Giảm thêm 200.000đ với đơn hàng từ 4 triệu. Nhập mã: HAPPY
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-group-page mb-3">
                        <div class="buttons-wrapper">
                            <div class="stepper-group cart-group">
                                <div class="stepper">
                                    <input id="product-quantity" type="text" name="quantity" value="1"
                                        data-minimum="1" class="form-control text-center" readonly>
                                    <input id="product-id" type="hidden" name="product_id"
                                        value="{{ $product->id }}">
                                    <div class="btn-quantity-block">
                                        <div id="quantity-up"
                                            class="d-flex align-items-center justify-content-center flex-fill"><i
                                                class="fa fa-angle-up"></i></div>
                                        <div id="quantity-down"
                                            class="d-flex align-items-center justify-content-center flex-fill"><i
                                                class="fa fa-angle-down"></i></div>
                                    </div>
                                </div>
                                <div class="cart-buying">
                                    <a id="button-cart" class="btn-cart">
                                        <span class="bi bi-handbag me-1"></span>
                                        <span class="btn-text">THÊM VÀO GIỎ</span>
                                    </a>
                                    <a class="btn-extra">
                                        <span class="bi bi-currency-dollar me-1"></span>
                                        <span class="btn-text">MUA HÀNG NGAY</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotline-block" style="font-size: 13.5px">
                        <span>✆ Hotline</span>
                        <a href="tel:039 349 0572">039 349 0572</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('web.layouts.feedback')
    <div id="toast-container" class="toast-container d-none position-fixed top-0 end-0 pt-5 pe-3">
        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('js/cart.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // images
            $('.additional-images div img').click(function() {
                $('.main-img').attr('src', $(this).attr('src'));
            });

            // down-up quantity product
            let p_quantity = $('#product-quantity').val();
            p_quantity = Number(p_quantity);

            $('#quantity-up').on('click', function() {
                p_quantity++;
                $('#product-quantity').val(p_quantity);
            });

            $('#quantity-down').on('click', function() {
                if (p_quantity > 1) {
                    p_quantity--;
                    $('#product-quantity').val(p_quantity);
                }
            });

            // choose size
            $('.square-radio').on('click', function() {
                $('.square-radio').each(function(index, element) {
                    $(element).removeClass('radio-clicked');
                });
                $(this).addClass('radio-clicked');
            });
        });
    </script>
@endpush
