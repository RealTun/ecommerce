<style>
    body {
        font-family: 'Noto Sans' !important;
        font-weight: 400;
    }

    #btn_search,
    #input_mailsub {
        outline: none;
        box-shadow: none !important;
        border: 0px solid #ccc !important;
    }

    #btn_search:hover {
        color: rgba(204, 4, 26, 1) !important;
    }

    .navbar-nav-scroll li:first-child a {
        padding-left: 0 !important
    }

    .navbar-nav-scroll li a {
        padding: 0px 28px !important;
    }

    .navbar-nav-scroll li a:hover {
        color: rgb(196, 190, 190) !important;
    }

    .shopping-cart {
        position: relative;
        cursor: pointer;
    }

    .cart-item {
        z-index: 1;
        top: 0;
        right: -10px;
        margin: 0;
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: rgb(199, 10, 10);
        text-align: center;
        font-size: 12px;
        border: none;
    }

    #cart-content {
        display: none;
        position: absolute;
        min-width: 400px;
        right: 0;
        transform: translateY(25%);
        padding: 10px 0px;
        border-radius: 0;
    }

    #cart-content::before {
        content: "";
        display: block;
        position: absolute;
        right: 0;
        top: -10px;
        border-bottom: 15px solid white;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
    }

    .dropdown-menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .dropdown-menu ul li p {
        font-size: 13px;
        text-align: center;
        margin: 0;
        padding: 10px 0px;
    }

    .td-name {
        max-width: 150px;
    }

    .td-remove button {
        border: none;
        color: rgba(226, 41, 61, 1);
        background-color: white;
    }

    .td-remove button:hover {
        color: rgba(80, 173, 85, 1);
    }

    #input_search {
        outline: none;
        box-shadow: none;
        border: none
    }

    .cart-product table td {
        font-size: 13px;
    }

    .cart-product table a {
        color: #3a58ad;
        text-decoration: none;
        font-size: 13px;
    }

    .btn.btn-outline-dark:hover {
        background-color: #fff;
        color: #000;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .btn.btn-pay {
        background-color: #CC041A !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-width: 2px;
        color: #ffffff;
    }

    .btn.btn-pay:hover {
        filter: contrast(150%);
        transition: 0.3s ease filter;
    }
</style>

<div class="container p-0">
    <div class="header-top d-flex justify-content-between align-items-center py-4 px-5">
        {{-- #0a437f --}}
        <div class="logo" style="flex: 1;">
            <a href="{{ route('web.home') }}" class="d-block w-50">
                <img src="{{asset('images/logo/Capture-removebg-preview (1).png')}}" alt="shoes.vn" class="w-100 h-50 object-fit-cover ">
            </a>
        </div>
        <div class="input-search" style="flex: 2;">
            <div class="input-group">
                <input type="text" style="font-size: 13px; padding: 10px 10px;" class="form-control"
                    id="input_search" placeholder="Tìm kiếm sản phẩm.....">
                <button class="btn bg-white" type="button" id="btn_search">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="cart-user d-flex justify-content-end gap-2" style="flex: 1;">
            @if (Auth::check())
                <a href="{{ route('web.logout') }}" class="d-flex text-white text-decoration-none">
                    <i class="bi bi-person-lock mx-1" style="font-size: 1.8rem"></i>
                    <div style="min-width: 110px;">
                        <span style="font-size: 12px">Xin chào {{ Auth::user()->name }}</span>
                        <div style="font-size: 11px">Đăng xuất</div>
                    </div>
                </a>
            @else
                <a href="{{ route('web.login') }}" class="d-flex text-white text-decoration-none">
                    <i class="bi bi-person-lock mx-1" style="font-size: 1.8rem"></i>
                    <div style="min-width: 110px;">
                        <span style="font-size: 12px">Tài khoản</span>
                        <div style="font-size: 11px">Đăng nhập/Đăng ký</div>
                    </div>
                </a>
            @endif
            <div class="shopping-cart">
                <i class="bi bi-bag text-white" style="font-size: 1.8rem"></i>
                <span class="cart-item text-white" id="count_product">0</span>
                <div class="dropdown-menu j-dropdown" id="cart-content">
                    <ul>
                        <li class="cart-empty">
                            <p class="text-center">Không có sản phẩm trong giỏ hàng!</p>
                        </li>
                        <li class="cart-product">
                            <table class="table mb-2 px-2">
                                <tbody></tbody>
                            </table>
                        </li>
                        <li class="card-btn-wrapper">
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <button class="btn btn-outline-dark rounded-0 text-uppercase fw-medium"
                                    style="font-size: 14px;">Xem giỏ
                                    hàng</button>
                                <button class="btn btn-pay rounded-0 text-uppercase fw-medium"
                                    style="font-size: 14px;">Thanh
                                    toán</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom px-5" style="background-color: #0a437f">
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav navbar-nav-scroll" style="font-size: 15px" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-nike') }}">Giày
                            Nike</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-adidas') }}">Giày
                            Adidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-puma') }}">Giày
                            Puma</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold"
                            href="{{ route('web.brandIndex', 'giay-new-balance') }}">Giày
                            New Balance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-vans') }}">Giày
                            Vans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold"
                            href="{{ route('web.brandIndex', 'giay-converse') }}">Giày
                            Converse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="#">Phụ kiện</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.contact') }}">
                            <i class="bi bi-envelope"></i>
                            Liên hệ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="#">
                            <i class="bi bi-pencil-square"></i>
                            Blog
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            // fixed-top menu
            let header = $('.header-bottom');
            let headerOffsetTop = header.offset().top;
            $(window).scroll(function() {
                let scrollPosition = $(window).scrollTop();
                if (scrollPosition > headerOffsetTop) {
                    header.addClass('d-flex justify-content-around fixed-top me-1');
                } else {
                    header.removeClass('d-flex justify-content-around fixed-top me-1');
                }
            });
        });
    </script>
@endpush
