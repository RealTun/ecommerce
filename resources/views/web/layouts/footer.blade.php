<style>
    input[type="checkbox"] {
        outline: none !important;
        box-shadow: none !important;
    }

    input[type="checkbox"]:checked {
        outline: none !important;
        background-color: gray !important;
    }

    input[type="checkbox"]:focus {
        outline: none !important;
    }

    .module-body {
        padding-top: 20px;
        padding-left: 80px;
    }

    .footer-mid::before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        height: 0.1px;
        background-color: rgba(240, 242, 245, 0.5);
        z-index: 99;
        margin-top: -30px;
    }

    .footer-bottom::before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        height: 0.1px;
        background-color: rgba(240, 242, 245, 0.5);
        z-index: 99;
        margin-top: -10px;
    }

    #btn_mailsub:hover {
        filter: contrast(150%);
        transition: 0.3s ease filter;
    }

    .nav.flex-column a:hover {
        color: red !important;
    }
</style>


<div class="container">
    <div class="footer-top py-4 px-5">
        {{-- #0a437f --}}
        <div class="row">
            <div class="col-md-6 text-start pt-3">
                <h3 class="fw-bold" style="font-size: 17px">ĐĂNG KÝ NHẬN THÔNG TIN</h3>
                <div class="subtitle mt-3" style="font-size: 13.5px">
                    Đăng ký ngay để được cập nhật sớm nhất những thông tin hữu ích, ưu đãi vô cùng hấp dẫn và những món
                    quà bất ngờ từ Myshoes.vn!
                </div>
            </div>
            <div class="col-md-6">
                <div class="module-body">
                    <form action="" method="POST" id="form-sendmail">
                        @csrf
                        <div class="input-group">
                            <input type="email" style="font-size: 14px;" class="form-control" id="input_mailsub"
                                name="email" placeholder="Nhập email của bạn">
                            <button type="submit" class="btn text-white" style="background-color: #CC041A"
                                type="button" id="btn_mailsub">
                                <i class="bi bi-envelope" style="font-size: 0.9em;"></i>
                                <span class="fw-bold" style="font-size: 14px">Đăng ký</span>
                            </button>
                        </div>
                        <div class="form-check d-flex px-0">
                            <input class="form-check-input-sm" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-label mt-2 mx-2" style="font-size: 13px" for="flexCheckChecked">
                                Tôi đã đọc và đồng ý với
                                <a href="" class="link-light fw-bold">Chính sách bảo mật</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-mid py-4 px-5">
        <div class="row">
            <div class="col-md-5 pe-4">
                <h3 style="font-size: 17px">MYSHOES.VN - GIÀY CHÍNH HÃNG</h3>
                <div class="block-body d-flex mt-3">
                    <div class="">
                        <img src="{{ asset('images/logo/logo-myshoes-ok-90x90.png') }}" alt="myshoes.vn">
                    </div>
                    <div class="subtitle ms-2" style="font-size: 13.5px;">
                        <div>
                            Myshoes.vn được định hướng trở thành hệ thống thương mại điện tử bán giày chính hãng hàng
                            đầu Việt Nam.
                        </div>
                        <div>
                            <span>Showroom: 249 Xã Đàn,&nbsp;Hà Nội<br>
                                Hotline: 0973711868</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 me-4">
                <h3 style="font-size: 17px">VỀ CHÚNG TÔI</h3>
                <nav class="nav flex-column" style="font-size: 13px;">
                    <a class="nav-link text-white p-0 py-1" href="#">Giới thiệu</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Điều khoản sử dụng</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Chính sách bảo mật</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Tin tức Myshoes</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Cơ hội việc làm</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Liên hệ</a>
                </nav>
            </div>
            <div class="col-md-2 ps-0 me-5">
                <h3 style="font-size: 17px">KHÁCH HÀNG</h3>
                <nav class="nav flex-column" style="font-size: 13px;">
                    <a class="nav-link text-white p-0 py-1" href="#">Hướng dẫn mua hàng</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Chính sách đổi trả</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Chính sách bảo hành</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Khách hàng thân thiết</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Hướng dẫn chọn size</a>
                    <a class="nav-link text-white p-0 py-1" href="#">Chương trình khuyến mại</a>
                </nav>
            </div>
            <div class="col-md-2 text-center">
                <h3 style="font-size: 17px">CHỨNG NHẬN</h3>
                <nav class="nav flex-column">
                    <a class="nav-link px-0" href="#">
                        <img src="{{ asset('images/logo/DMCA_logo-grn-btn150w.png') }}" alt="dcma_logo">
                    </a>
                    <a class="nav-link px-0 mt-3" href="#">
                        <img src="{{ asset('images/logo/logo-bct.png') }}" alt="bct_logo" style="width: 90%">
                    </a>
                </nav>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-4 px-5">
        <div class="row">
            <div class="subtitle mt-3 text-center" style="font-size: 14px">
                Copyright © 2023 - 2024 Myshoes.vn. All rights reserved.
            </div>
        </div>
    </div>
</div>

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            // $('#form-sendmail').submit(function(e) {
            //     e.preventDefault();
            //     if ($('#input_mailsub').val() == "" || !$('#flexCheckChecked').prop('checked')) {
            //         alert("Vui lòng đồng ý với điều khoản và điền đầy đủ email!");
            //     } else {
            //         this.submit();
            //     }
            // });

            // let successMessage = '{{ session('success') }}';
            // if (successMessage) {
            //     alert(successMessage);
            // }
        });
    </script>
@endpush
