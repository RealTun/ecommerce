@extends('web.layouts.master')

@section('title', 'Đăng nhập tài khoản')

@push('css')
    <style>
        input[type="text"],
        input[type="password"] {
            outline: none;
            box-shadow: none !important;
            border: 1px solid #ccc !important;
        }

        .title {
            font-weight: 400;
            font-size: 16px;
            color: rgba(51, 51, 51, 1);
            text-transform: uppercase;
            margin-bottom: 15px;
            white-space: normal;
            overflow: visible;
            text-overflow: initial;
            text-align: left;
        }

        .register-block p {
            font-weight: 400;
            font-size: 14px;
            color: rgba(30, 46, 78, 1);
        }

        .login-block .form-control {
            font-family: 'Noto Sans' !important;
            font-weight: 400 !important;
            font-size: 14px !important;
            color: rgba(51, 51, 51, 1) !important;
            background: rgba(255, 255, 255, 1) !important;
            border-width: 1px !important;
            border-style: solid !important;
            border-radius: 0;
            border-color: rgba(221, 221, 221, 1) !important;
            max-width: 1000px;
            height: 38px;
        }

        .form-group a {
            color: rgba(58, 88, 173, 1);
            text-decoration: underline;
            font-size: 14px;
        }

        .btn-register,
        .btn-login {
            background: rgba(15, 58, 141, 1);
            border-width: 2px;
            font-weight: 400 !important;
            font-size: 14px !important;
            padding: 10px 10px;
            width: 100%;
        }

        .btn-register:hover,
        .btn-login:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    @include('web.layouts.breadcrumb')
    <div class="container slide-banner mb-4">
        <div class="banner-top py-4 px-5">
            <div class="row">
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
                <div class="col-md-2 ps-0">
                    <a href="" class="text-start d-block">
                        <img class="img-fluid" src="{{ asset('images/banner/slide-trai-20-300x500h.png') }}"
                            alt="left_slide">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="content row">
                        <div class="col-sm-6">
                            <div class="register-block p-2 d-flex flex-column gap-4 justify-content-between h-100">
                                <h4 class="title m-0">KHÁCH HÀNG MỚI</h4>
                                <p class="m-0 flex-grow-1">Bằng cách tạo tài khoản bạn sẽ có thể mua sắm nhanh hơn và nhiều
                                    chương trình mua sắm ưu
                                    đãi hơn dành riêng cho khách hàng thân thiết.</p>
                                <a href="{{ route('web.register') }}" class="btn btn-primary btn-register">ĐĂNG KÝ</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="login-block p-2 d-flex flex-column gap-4 justify-content-between h-100">
                                <h2 class="title m-0">Đăng nhập tài khoản</h2>
                                <div class="d-flex flex-column gap-2">
                                    <form action="{{ route('web.checklogin') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email:" id="input-email"
                                                class="form-control">
                                        </div>
                                        <div class="form-group mt-2 mb-2">
                                            <input type="password" name="password" placeholder="Mật khẩu:"
                                                id="input-password" class="form-control">
                                            <div class="mt-2"><a href="{{ route('web.forgotpassword') }}"
                                                    target="_top">Quên mật khẩu</a></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-login">ĐĂNG NHẬP</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 pe-0">
                    <a href="" class="text-start d-block">
                        <img class="img-fluid" src="{{ asset('images/banner/xit-khu-mui-jpg-300x500h.jpg') }}"
                            alt="right_slide">
                    </a>
                </div>
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
            }, 3000); // Adjust the duration (in milliseconds) as needed

            let stateUser = '{{ session('state') }}';
            // console.log(stateUser);
            if (stateUser != null) {
                window.localStorage.setItem('isLogin', 'no');
            }
        });
    </script>
@endpush
