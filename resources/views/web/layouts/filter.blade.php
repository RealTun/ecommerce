@push('css')
    <style>
        .collapseFilter {
            cursor: pointer;
        }

        .filter-block {
            color: rgba(51, 51, 51, 1);
        }

        .form-check label {
            color: #212529;
        }

        input[type="range"] {
            width: 100%;
            accent-color: rgb(199, 10, 10) !important;
        }

        input[type="range"]::-moz-range-progress {
            accent-color: rgb(199, 10, 10);
        }

        input[type="range"]::-moz-range-track {
            accent-color: rgb(199, 10, 10) !important;
        }

        .trackbar .bound_label.left {
            float: left;
        }

        .trackbar .bound_label.right {
            float: right;
        }

        .collapseFilter:hover {
            color: #0a437f
        }

        .btn-filter {
            background: rgba(15, 58, 141, 1);
            font-weight: 400 !important;
            font-size: 11px !important;
            border-color: rgba(15, 58, 141, 1);
            border-radius: 0;
        }

        .btn-filter:hover,
        .btn-filter:active {
            background-color: rgba(15, 58, 141, 1) !important;
            filter: brightness(120%);
        }
    </style>
@endpush


<div class="col-md-2 p-0">
    <aside class="column-left">
        <div class="filter-block pt-3 border-top border-dark">
            <form action="{{route('web.brandProducts', [$brand->slug, 1])}}" method="get">
                <div class="module-title mb-3 d-flex justify-content-between align-items-center">
                    <h3 class="d-flex align-items-center m-0"
                        style="font-size: 16px; font-weight: 400; line-height: 1.2">TÌM
                        KIẾM THEO</h3>
                    <button type="submit" class="btn btn-primary btn-filter">Hoàn tất</button>
                </div>
                <div class="module-body-filter">
                    <div class="category-block mb-3">
                        <div class="collapseFilter" data-bs-target="#collapseCategory">
                            <p class="d-flex justify-content-between align-items-center m-0 mb-2">
                                <span class="fw-bold" style="cursor: pointer !important; font-size: 13px">DANH
                                    MỤC</span>
                                <span><i class="bi bi-arrow-down" style="font-size: 13px;"></i></span>
                            </p>
                            <div class="row">
                                <div style="font-size: 14px" class="d-flex justify-content-between mb-2">
                                    <label for="sort_by">Sắp xếp theo</label>
                                    <select name="sort_by" id="sort_by">
                                        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Tên
                                        </option>
                                        <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Giá
                                        </option>
                                        <option value="created_at"
                                            {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Ngày</option>
                                    </select>
                                </div>
                                <div style="font-size: 14px" class="d-flex justify-content-between">
                                    <label for="sort_order">Thứ tự sắp xếp</label>
                                    <select name="sort_order" id="sort_order">
                                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                            Tăng
                                            dần</option>
                                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                            Giảm
                                            dần</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <hr>
                    <div class="price-block">
                        <div class="collapseFilter">
                            <p class="d-flex justify-content-between align-items-center m-0 mb-2">
                                <span class="fw-bold" style="cursor: pointer !important; font-size: 13px">GIÁ</span>
                                <span><i class="bi bi-arrow-down" style="font-size: 13px"></i></span>
                            </p>
                            <div class="form-check" style="font-size: 14px">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mặc định
                                </label>
                            </div>
                            <div class="form-check" style="font-size: 14px">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="{{ request('min_price') }}" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Từ thấp đến cao
                                </label>
                            </div>
                            <div class="form-check" style="font-size: 14px">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault3" value="{{ request('max_price') }}" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Từ cao đến thấp
                                </label>
                            </div>
                            <div class="mb-3"></div>
                        </div>
                    </div> --}}
                    <hr>
                    <div class="size-block">
                        <div class="collapseFilter" data-bs-target="#collapseSize">
                            <p class="d-flex justify-content-between align-items-center m-0 mb-2">
                                <span class="fw-bold" style="cursor: pointer !important; font-size: 13px">CHỌN
                                    SIZE</span>
                                <span><i class="bi bi-arrow-down" style="font-size: 13px"></i></span>
                            </p>
                            <ul class="list-group cursor-pointer" id="collapseSize" data-bs-parent="#accordion">
                                @for ($i = 39; $i <= 43; $i++)
                                    <li class="list-group-item px-0 py-1 border-0" style="font-size: 14px">
                                        <input class="form-check-input me-1 checkbox" type="checkbox" value=""
                                            id="size{{ $i }}">
                                        <label class="form-check-label stretched-link"
                                            for="size{{ $i }}">Size
                                            {{ $i }}</label>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </aside>
</div>

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            
        });
    </script>
@endpush
