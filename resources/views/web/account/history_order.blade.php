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
                    <h4 class="text-uppercase mb-4" style="font-size: 18px; font-weight: 700; letter-spacing: 1px">
                        Lịch sử đơn hàng
                    </h4>
                    @if (session('state'))
                        <p>{{ session('state') }}</p>
                        <a href="{{ route('web.account.index') }}" class="btn-continue"
                            style="background-color: #0a437f">Tiếp tục</a>
                    @else
                        <p>Số lượng đơn hàng của bạn: {{ $data->count() }} đơn hàng</p>
                        @foreach ($data as $each)
                            <div class="order-wrapper bg-secondary-subtle">
                                <div class="d-flex flex-column">
                                    <span class="text-dark" style="font-weight: 700">#{{ $each->id }}</span>
                                    <span class="text-dark"
                                        style="font-weight: 700">{{ \Carbon\Carbon::parse($each->created_at)->format('d/m/Y') }}</span>
                                </div>
                                <a href="{{ route('web.order.detail', $each->id) }}" class="btn btn-sm btn-light rounded-5"
                                    style="font-weight: 600">Xem chi tiết</a>
                            </div>
                        @endforeach
                    @endif
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
