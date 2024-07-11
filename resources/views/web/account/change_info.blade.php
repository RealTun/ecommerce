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

        #changeinfo-form .form-control {
            font-family: 'Noto Sans' !important;
            font-weight: 400 !important;
            font-size: 14px !important;
            color: rgba(51, 51, 51, 1) !important;
            background: rgba(255, 255, 255, 1) !important;
            border-width: 1px !important;
            border-style: solid !important;
            border-radius: 0;
            border-color: rgba(221, 221, 221, 1) !important;
            max-width: 800px;
            height: 38px;
            outline: none;
            box-shadow: none !important;
        }

        #changeinfo-form .form-control:focus {
            box-shadow: 10px #ccc !important;
        }

        .btn-send {
            background: rgba(15, 58, 141, 1);
            font-weight: 400 !important;
            font-size: 13px !important;
            padding: 10px 10px;
            width: 100%;
            border-color: rgba(15, 58, 141, 1);
            margin-top: 10px;
            border-radius: 0;
        }

        .btn-back {
            font-weight: 400 !important;
            font-size: 13px !important;
            padding: 10px 10px;
            width: 100%;
            margin-top: 10px;
            border-radius: 0;
            color: rgba(15, 58, 141, 1) !important;
            border-width: 1px;
            border-style: solid;
            border-color: rgba(58, 71, 84, 1);
        }

        .btn-send:hover,
        .btn-send:active {
            background-color: rgba(15, 58, 141, 1) !important;
            filter: brightness(120%);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-back:hover,
        .btn-back:active {
            color: rgba(58, 71, 84, 1) !important;
            border-color: rgba(58, 71, 84, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            /* filter: brightness(120%); */
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
            <div class="col-md-8 p-5">
                <h4 class="text-uppercase mb-4" style="font-size: 18px; font-weight: 700; letter-spacing: 1px;">
                    Thông tin tài khoản
                </h4>
                <form action="{{ route('web.account.updateinfo') }}" method="post" id="changeinfo-form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Họ và tên:" id="input-name" class="form-control"
                            required minlength="6" maxlength="30" pattern="[a-zA-ZÀ-ỹ\s]+" value="{{ $user->name }}">
                        {{-- <span class="text-danger d-none" style="font-size: 13px;">Mật khẩu không được để trống!</span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <input type="tel" name="phone" placeholder="Số điện thoại:" id="input-phone"
                            class="form-control" pattern="0[0-9]{9}" maxlength="10" required value="{{ $user->telephone }}">
                        {{-- <span class="text-danger d-none" style="font-size: 13px;">Số điện thoại không để trống!</span> --}}
                    </div>
                    <div class="row btn-block mt-3">
                        <div class="col-6">
                            <a href="{{ route('web.account.index') }}" class="btn btn-back">Quay lại</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-send">Tiếp tục</button>
                        </div>
                    </div>
                </form>
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
    <script>
        $(document).ready(function() {
            $('#input-phone').on('input', function() {
                this.value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            });

            setTimeout(function() {
                $('.alert-danger').fadeOut();
                $('.alert-success').fadeOut();
            }, 3000);
        });
    </script>
@endpush
