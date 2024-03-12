<style>
    body {
        font-family: 'Noto Sans';
        font-weight: 400;
    }

    textarea,
    #btn_search,
    #input_mailsub {
        outline: none;
        box-shadow: none !important;
        border: 0px solid #ccc !important;
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

    .td-name{
        max-width: 150px;
    }

    .td-remove button{
        border: none;
        color: rgba(226, 41, 61, 1);
        background-color: white; 
    }
    .td-remove button:hover{
        color: rgba(80, 173, 85, 1);
    }
</style>

<div class="container p-0">
    <div class="header-top d-flex justify-content-between align-items-center py-4 px-5">
        {{-- #0a437f --}}
        <div class="logo" style="flex: 1;">
            <a href="{{ route('web.home') }}">
                <img src="{{ asset('images/logo/logo_ms-565x195.png') }}" alt="shose.vn" height="45">
            </a>
        </div>
        <div class="input-search" style="flex: 1;">
            <div class="input-group">
                <input type="text" style="font-size: 13px; padding: 10px 10px;" class="form-control"
                    id="input_search" placeholder="Tìm kiếm sản phẩm.....">
                <button class="btn bg-white" type="button" id="btn_search">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="cart-user d-flex justify-content-end" style="flex: 1;">
            <a href="{{route('web.login')}}" class="d-flex text-white text-decoration-none mx-4">
                <i class="bi bi-person-lock mx-1" style="font-size: 1.8rem"></i>
                <div>            
                    @if (Auth::check())
                        <div class="d-flex flex-column">
                            <div style="font-size: 14px">Xin chào {{Auth::user()->name}}</div>
                            <a class="text-decoration-none" href="{{route('web.logout')}}">Đăng xuất</a>
                        </div>
                    @else
                        <span style="font-size: 12px">Tài khoản</span>
                        <div style="font-size: 11px">Đăng nhập/Đăng ký</div>
                    @endif
                </div>
            </a>
            <div class="shopping-cart">
                <i class="bi bi-cart text-white" style="font-size: 1.8rem"></i>
                <span class="cart-item text-white" id="count_product">0</span>
                <div class="dropdown-menu j-dropdown" id="cart-content">
                    <ul>
                        <li class="cart-empty">
                            <p class="text-center">Không có sản phẩm trong giỏ hàng!</p>
                        </li>
                        <li class="cart-product d-none">
                            <table class="table">
                                <tbody></tbody>
                                {{-- <tr>
                                    <td class="text-center td-image">1</td>
                                    <td class="text-start td-name">2</td>
                                    <td class="text-end td-qty">3</td>
                                    <td class="text-end td-total">4</td>
                                    <td class="text-center td-remove">5
                                        <button type="button" title="Loại bỏ" class="cart-remove">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </td>
                                </tr> --}}
                            </table>
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
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-new-balance') }}">Giày
                            New Balance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-vans') }}">Giày
                            Vans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('web.brandIndex', 'giay-converse') }}">Giày
                            Converse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="#">Phụ kiện</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="#">
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
