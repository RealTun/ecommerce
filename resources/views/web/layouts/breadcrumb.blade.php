@push('css')
    <style>
        .breadcrumb{
            font-size: 12px;
            color: rgba(105, 105, 115, 1);
            padding: 10px 0px;
            cursor: default;
        }

        .breadcrumb a:hover{
            cursor: pointer;
        }

        .breadcrumb-chevron {
            --bs-breadcrumb-divider: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d'%3E%3Cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            gap: .1rem;
        }
    </style>
@endpush

<div class="container-fluid g-0 bg-body-tertiary">
    <div class="container px-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron ">
                <li class="breadcrumb-item">
                    {{-- <a class="link-body-emphasis text-decoration-none" href="#">Trang chủ</a> --}}
                    Trang chủ
                </li>
                <li class="breadcrumb-item">
                    Giày chính hãng
                </li>
                @yield('bread-item')
            </ol>
        </nav>
    </div>
</div>
