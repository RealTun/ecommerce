@extends('web.layouts.master')

@section('title', 'Myshoes - Giày chính hãng')

@push('css')
    <style>
        .account_link {
            flex: 1;
            padding: 24px 12px;
            text-align: center;
            text-decoration: none;

            border: 1px solid rgba(221, 221, 221, 1);
            color: #333;

            transition: 0.05s linear all;
        }

        .account_link:hover {
            box-shadow: 0 15px 90px -10px rgba(0, 0, 0, 0.2)
        }

        .btn-continue {
            padding: 12px 0px;
            border-radius: 0 !important;
            color: white;
            font-size: 12px !important;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;

            transition: 0.25s all linear;
        }

        .btn-continue:hover {
            color: rgba(255, 255, 255, 1) !important;
            background: rgba(58, 88, 173, 1) !important;
            cursor: pointer;
        }

        .order-wrapper {
            padding: 8px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            margin-bottom: 16px;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row px-5 py-4">
            <div class="col-md-2 p-0">
                <a href="" class="text-start d-block">
                    <img class="img-fluid" src="{{ asset('images/banner/slide-trai-20-300x500h.png') }}" alt="left_slide">
                </a>
            </div>
            <div class="col-md-8 p-0 pe-4">
                <div class="ms-4">
                    <h5 class="h5" style="font-weight: bold;">Thông tin đơn hàng {{ $order->id }}</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex">
                            <span style="width: 200px;">Ngày đặt hàng:</span>
                            <span>{{ \Carbon\Carbon::parse($order->created_at)->format('H:i d.m.Y') }}</span>
                        </div>
                        <div class="d-flex">
                            <span style="width: 200px;">Tên người nhận:</span>
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                        <div class="d-flex">
                            <span style="width: 200px;">Địa chỉ Email:</span>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        <div class="d-flex">
                            <span style="width: 200px;">Số điện thoại:</span>
                            <span>{{ Auth::user()->telephone }}</span>
                        </div>
                        <div class="d-flex">
                            <span style="width: 200px;">Phương thức thanh toán:</span>
                            <span>Đố biết</span>
                        </div>
                        <div class="d-flex">
                            <span style="width: 200px;">Địa chỉ giao hàng:</span>
                            <span>Đố biết</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 p-0">
                <a href="" class="text-start d-block">
                    <img class="img-fluid" src="{{ asset('images/banner/xit-khu-mui-jpg-300x500h.jpg') }}"
                        alt="right_slide">
                </a>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script></script>
@endpush
