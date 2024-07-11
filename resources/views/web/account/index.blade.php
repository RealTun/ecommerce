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
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row px-5 py-4">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible" style="font-size: 14px">
                    <i class="fa fa-exclamation-circle"></i> Lỗi: {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" style="font-size: 14px">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif
            <div class="col-md-2 p-0">
                <a href="" class="text-start d-block">
                    <img class="img-fluid" src="{{ asset('images/banner/slide-trai-20-300x500h.png') }}" alt="left_slide">
                </a>
            </div>
            <div class="col-md-8 p-0 pe-4">
                <div class="ms-4">
                    <h4 class="text-uppercase mb-4" style="font-size: 18px; font-weight: 700; letter-spacing: 1px">
                        Thông tin tài khoản
                    </h4>
                    <div class="wrapper d-flex justify-content-start align-items-center gap-5">
                        <a class="account_link" href="{{ route('web.account.view.updateinfo') }}">
                            <span>Sửa thông tin tài khoản</span>
                        </a>
                        <a class="account_link" href="{{ route('web.account.view.changepassword') }}">
                            <span>Thay đổi mật khẩu</span>
                        </a>
                        <a class="account_link" href="#">
                            <span>Thay đổi sổ địa chỉ</span>
                        </a>
                    </div>
                </div>
                <div class="ms-4">
                    <h4 class="text-uppercase mt-4" style="font-size: 18px; font-weight: 700; letter-spacing: 1px">
                        Đơn hàng của tôi
                    </h4>
                    <div class="wrapper d-flex justify-content-start align-items-center gap-5">
                        <a class="account_link" href="{{ route('web.order.history') }}">
                            <span>Xem lịch sử đơn hàng</span>
                        </a>
                        <a class="account_link" href="#">
                            <span>Điểm thưởng</span>
                        </a>
                        <a class="account_link" href="#">
                            <span>Tiền tích lũy</span>
                        </a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert-danger').fadeOut();
                $('.alert-success').fadeOut();
            }, 3000);
        });
    </script>
@endpush
