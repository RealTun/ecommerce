@extends('web.layouts.master')

@section('title', 'Liên hệ')

@push('css')
    <style>
        input[type="text"],
        input[type="password"] {
            outline: none;
            box-shadow: none !important;
            border: 1px solid #ccc !important;
        }

        .title {
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 3px;
            display: block;
        }

        .info-block div {
            font-size: 13px;
            color: rgba(139, 145, 152, 1);
            display: block;
        }

        .content-left {
            background: rgba(238, 238, 238, 1);
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .location-block,
        .phone-block,
        .time-block {
            display: flex;
            width: 100%;
            padding: 10px 10px 15px;
        }

        .location-block,
        .phone-block {
            border-width: 0;
            border-bottom-width: 1px;
            border-style: solid;
            border-color: rgba(221, 221, 221, 1);
        }

        .content-left i {
            margin-right: 15px;
            width: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contact-block .title {
            font-size: 22px;
            font-weight: 700;
            border-width: 0px;
            padding: 0px;
            margin-bottom: 20px;
            white-space: normal;
            overflow: visible;
            text-overflow: initial;
        }

        .contact-block .form-control {
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
            outline: none;
            box-shadow: none !important;
        }

        .contact-block .form-control:focus{
            box-shadow: 10px #ccc !important;
        }

        .form-group textarea {
            min-height: 100px;
        }

        .btn-send{
            background: rgba(15, 58, 141, 1);
            font-weight: 400 !important;
            font-size: 13px !important;
            padding: 10px 10px;
            width: 100%;
            border-color: rgba(15, 58, 141, 1);
            margin-top: 10px;
            border-radius: 0;
        }

        .btn-send:hover{
            background-color: rgba(15, 58, 141, 1);
            filter: brightness(120%);
        }
    </style>
@endpush

@section('content')
    @include('web.layouts.breadcrumb')
    <div class="container mb-4">
        <div class="banner-top px-5">
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
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3977348134745!2d105.82896791415727!3d21.01676589356539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab82489cfa89%3A0xf2c65fad8571d0b7!2zMjQ5IFAuIFjDoyDEkMOgbiwgTmFtIMSQ4buTbmcsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1628008365187!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="content-left">
                        <div class="location-block">
                            <i class="bi bi-geo-alt" style="font-size: 30px;"></i>
                            <div class="info-block">
                                <h3 class="title">MYSHOES.VN</h3>
                                <div>249 Xã Đàn, Đống Đa, Hà Nội</div>
                            </div>
                        </div>
                        <div class="phone-block">
                            <i class="fa-solid fa-mobile-screen-button" style="font-size: 30px;"></i>
                            <div class="info-block">
                                <h3 class="title">HOTLINE</h3>
                                <div>SĐT: 0393490572</div>
                            </div>
                        </div>
                        <div class="time-block">
                            <i class="bi bi-watch" style="font-size: 30px;"></i>
                            <div class="info-block">
                                <h3 class="title">THỜI GIAN LÀM VIỆC</h3>
                                <div>Thời gian làm việc: 9:00 - 21:00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-right">
                        <div class="contact-block p-2 d-flex flex-column gap-4 justify-content-between h-100">
                            <h2 class="title m-0">Myshoes.vn sẵn sàng lắng nghe bạn!</h2>
                            <div class="d-flex flex-column gap-2">
                                <form action="" method="post" class="">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Họ và tên" id="input-name"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <input type="email" name="password" placeholder="Email" id="input-password"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <textarea class="form-control" id="input-contact" name="content-contact" rows="5" placeholder="Thông tin"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-send">XÁC NHẬN</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
