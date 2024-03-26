@extends('web.layouts.master')

@section('title', 'Myshoes - Giày chính hãng')

@push('css')
    <style>
        .breadcrumb {
            font-size: 12px;
            color: rgba(105, 105, 115, 1);
            padding: 10px 0px;
            cursor: default;
        }

        .breadcrumb a:hover {
            cursor: pointer;
        }

        .breadcrumb-chevron {
            --bs-breadcrumb-divider: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d'%3E%3Cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            gap: .1rem;
        }

        .product-name {
            color: #3a58ad;
        }

        .product-name:hover {
            text-decoration: none;
            color: #0f3a8d;
        }

        .stepper {
            display: flex;
            max-width: 70px;
            max-height: 50px;
        }

        .btn-quantity-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            width: 50%;
            background-color: #eee;
        }

        .btn-quantity-block div {
            padding-left: 5px;
            padding-right: 5px;
            cursor: pointer;
            color: #696973;
        }

        .btn-quantity-block div:hover {
            background-color: 999;
            color: #fafafa;
        }

        .stepper input[type="text"],
        .stepper .btn-quantity-block div {
            border: 0.5px solid black !important;
            border-right: 0 !important;
            border-radius: 0;
            max-width: 50px;
        }

        .text-voucher {
            display: flex;
            justify-content: space-between;
            align-items: center;

            text-decoration: none;
            font-size: 14px;
            color: #333333;
            border: 0 !important
        }

        .text-voucher:hover {
            color: #cc041a;
        }

        .table tr td {
            font-size: 13px;
        }
    </style>
@endpush

@section('content')
    <div class="bg-body-tertiary">
        <div class="container px-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-chevron">
                    <li class="breadcrumb-item">
                        Trang chủ
                    </li>
                    <li class="breadcrumb-item">
                        Giày chính hãng
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container px-5">
        <div class="row my-3">
            <div class="col-md-9">
                <h4 class="h5 text-uppercase fw-bold">
                    Giỏ hàng của bạn
                </h4>
                <div class="table-responsive">
                    <table class="table table-borderless m-0" id="table-cart">
                        <thead>
                            <tr class="border border-emerald-500">
                                <td class="text-center" style="min-width: 50px; font-size: 13px;">
                                    Hình ảnh
                                </td>
                                <td class="text-start" style="min-width: 200px; font-size: 13px;">
                                    Tên sản phẩm
                                </td>
                                <td class="text-center" style="min-width: 50px; font-size: 13px;">Mã hàng</td>
                                <td class="text-center" style="min-width: fit-content; font-size: 13px;">
                                    Số lượng
                                </td>
                                <td class="text-center" style="min-width: 50px; font-size: 13px;">Đơn giá</td>
                                <td class="text-center" style="min-width: 50px; font-size: 13px;">
                                    Tổng cộng
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $each)
                                <tr data-id="product_id"
                                    data-value="{{ $each->product_id }}"class="align-middle border border-emerald-500">
                                    <input type="hidden" name="totalPrice" id="price" value="{{ $each->price }}">
                                    <td class="text-center">
                                        {{-- <img srcset="https://ik.imagekit.io/b78avuku4/{{ $each->path }}" --}}
                                            {{-- alt="shoes"> --}}
                                    </td>
                                    <td>
                                        <a class="product-name"
                                            href="{{ route('web.detailsProduct', [$each->slug, $each->product_id]) }}">{{ $each->name }}</a>
                                        <br>
                                        <small>Chọn size: {{ $each->size }}</small>
                                    </td>
                                    <td class="text-center">CC{{ $each->productIdFormatted }}</td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="stepper border-end border-dark">
                                                <input type="text" name="quantity" value="{{ $each->quantity }}"
                                                    data-minimum="1" class="product-quantity form-control text-center"
                                                    readonly>
                                                <div class="btn-quantity-block">
                                                    <div
                                                        class="quantity-up d-flex align-items-center justify-content-center flex-fill">
                                                        <i class="fa fa-angle-up"></i>
                                                    </div>
                                                    <div
                                                        class="quantity-down d-flex align-items-center justify-content-center flex-fill">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $each->priceFormatted }}</td>
                                    <td class="text-center align-middle text-tp" style="min-width: 130px">
                                        {{ $each->totalPriceFormatted }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-emerald-500 p-4 h-100">
                    <div class="d-flex flex-column gap-3">
                        <button class="btn text-voucher p-0 shadow-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSale" aria-expanded="false" aria-controls="collapseSale">
                            <span>Sử dụng mã giảm giá</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                        <div id="collapseSale" class="collapse">
                            <div class="d-flex">
                                <input class="form-control rounded-0" type="text" name="inputVoucher" id="inputVoucher">
                                <button class="btn btn-sm btn-pay text-uppercase text-nowrap rounded-0">áp dụng</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table border border-emerald-500">
                                <tr class="d-flex">
                                    <td class="text-end flex-grow-1">
                                        <strong>Thành tiền:</strong>
                                    </td>
                                    <td style="min-width: 100px;">
                                        <span>{{ $totalPriceFormatted }}</span>
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="text-end flex-grow-1">
                                        <strong>Tổng tiền:</strong>
                                    </td>
                                    <td style="min-width: 100px;">
                                        <span>{{ $totalPriceFormatted }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <form action="{{route('web.sendMail')}}" method="post">
                            @csrf
                            <button type="submit" href="{{ route('web.sendMail') }}" id="btn-checkout"
                                class="btn btn-pay rounded-0 text-uppercase fw-medium" style="font-size: 14px;">
                                Thanh toán
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function() {
            function numberFormat(number, decimals, decimalSeparator, thousandSeparator) {
                decimals = decimals !== undefined ? decimals : 0;
                decimalSeparator = decimalSeparator || ",";
                thousandSeparator = thousandSeparator || ".";

                var parsedNumber = parseFloat(number);
                var parts = parsedNumber.toFixed(decimals).split(".");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandSeparator);

                return parts.join(decimalSeparator);
            }

            function updateQuantity(inputElement, change) {
                let p_quantity = parseInt(inputElement.val());
                p_quantity += change;
                if (p_quantity < 1) {
                    p_quantity = 1;
                }
                inputElement.val(p_quantity).trigger('change');
            }

            $(document).on("click", ".quantity-up", function() {
                updateQuantity($(this).parent().prev(), 1);
            });

            $(document).on("click", ".quantity-down", function() {
                updateQuantity($(this).parent().prev(), -1);
            });

            $(".product-quantity").change(function() {
                let rowElement = $(this).closest('tr');
                let inputElement = rowElement.find("#price");
                let price = inputElement.val();
                $(rowElement).find(".text-tp").html(numberFormat(price * $(this).val()) + " VNĐ");
            });

            let successMessage = '{{ session('success') }}';
            if (successMessage) {
                Swal.fire({
                    icon: "success",
                    title: "Bạn đã đặt hàng thành công! Vui lòng kiểm tra email",
                    showConfirmButton: true,
                });
            }
        });
    </script>
@endpush
