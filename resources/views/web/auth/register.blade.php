@extends('web.layouts.master')

@section('title', 'Đăng ký tài khoản')

@push('css')
    <style>
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
            color: #1e2e4e;
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
            border-color: rgba(221, 221, 221, 1);
            max-width: 1000px;
            height: 38px;
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

        .form-group span{
            font-size: 13px;
        }
    </style>
@endpush

@section('content')
    @include('web.layouts.breadcrumb')
    <div class="container slide-banner mb-4">
        <div class="banner-top py-4 px-5">
            <div class="row">
                <div class="col-md-2 ps-0">
                    <a href="" class="text-start d-block">
                        <img class="img-fluid" src="{{ asset('images/banner/slide-trai-20-300x500h.png') }}" alt="left_slide">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="content row">
                        <div class="col-sm-12">
                            <div class="login-block p-2 pt-0">
                                <h4 class="title m-0 text-center mb-3">THÔNG TIN ĐĂNG KÝ</h4>
                                <form method="POST" action="{{ route('web.storeAccount') }}"
                                    class="d-flex flex-column gap-2 justify-content-between h-100" id="registerForm">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Họ và tên:" id="input-name"
                                            class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}"
                                            value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telephone" placeholder="Số điện thoại:"
                                            id="input-telephone"
                                            class="form-control{{ $errors->has('telephone') ? ' border-danger' : '' }}"
                                            value="{{ old('telephone') }}">
                                        @if ($errors->has('telephone'))
                                            <span class="text-danger">
                                                {{ $errors->first('telephone') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email:" id="input-email"
                                            class="form-control{{ $errors->has('email') ? ' border-danger' : '' }}"
                                            value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Mật khẩu:" id="input-password"
                                            class="form-control">
                                        <span class="text-danger d-none"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cf-password" placeholder="Nhập lại mật khẩu:"
                                            id="input-cfpassword" class="form-control">
                                        <span class="text-danger d-none"></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-register mt-3">ĐĂNG KÝ</button>
                                </form>
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
            $("#registerForm").submit(function(event) {
                event.preventDefault();
                let passwordInput = $("#input-password");
                let cfPasswordInput = $("#input-cfpassword");
                if (passwordInput.val() != cfPasswordInput.val()) {
                    cfPasswordInput.next().removeClass('d-none').text('Mật khẩu không trùng khớp');
                    cfPasswordInput.addClass('border-danger');
                } else {
                    cfPasswordInput.next().addClass('d-none').text('');
                    cfPasswordInput.removeClass('border-danger');
                    this.submit();
                }
            })
        });
    </script>
@endpush
