@push('css')
    <style>
        .collapseFilter {
            cursor: pointer;
        }

        .filter-block {
            color: rgba(51, 51, 51, 1);
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

        .collapseFilter:hover{
            color: #0a437f
        }
    </style>
@endpush


<div class="col-md-2 p-0">
<aside class="column-left">
        <div class="filter-block pt-3 border-top border-dark">
            <div class="module-title mb-3">
                <h3 style="font-size: 16px; font-weight: 400; line-height: 1.2">TÌM KIẾM THEO</h3>
            </div>
            <div class="module-body-filter">
                <div class="category-block mb-3">
                    <div class="collapseFilter" data-bs-toggle="collapse" data-bs-target="#collapseCategory">
                        <p class="d-flex justify-content-between align-items-center m-0">
                            <span class="fw-bold" style="cursor: pointer !important; font-size: 13px">DANH
                                MỤC</span>
                            <span><i class="bi bi-arrow-down" style="font-size: 13px;"></i></span>
                        </p>
                        <ul class="list-group collapse cursor-pointer" id="collapseCategory"
                            data-bs-parent="#accordion">
                            @for ($i = 0; $i < 4; $i++)
                                <li class="list-group-item px-0 py-1 border-0" style="font-size: 14px">
                                    <input class="form-check-input me-1 checkbox" type="checkbox" value=""
                                        id="category{{ $i }}">
                                    <label class="form-check-label stretched-link"
                                        for="category{{ $i }}">Category {{ $i }}</label>
                                </li>
                            @endfor
                            <div class="mb-3"></div>
                        </ul>
                    </div>
                </div>
                <div class="price-block">
                    <div class="collapseFilter" data-bs-toggle="collapse" data-bs-target="#collapsePrice">
                        <p class="d-flex justify-content-between align-items-center m-0">
                            <span class="fw-bold" style="cursor: pointer !important; font-size: 13px">GIÁ</span>
                            <span><i class="bi bi-arrow-down" style="font-size: 13px"></i></span>
                        </p>
                        <ul class="list-group collapse cursor-pointer" id="collapsePrice"
                            data-bs-parent="#accordion">
                            <div class="trackbar 1">
                                <span class="bound_label left">20 000</span>
                                <span class="bound_label right">3 000 000</span>
                                <input type="range">
                            </div>
                        </ul>
                        <div class="mb-3"></div>
                    </div>
                </div>
                <div class="size-block">
                    <div class="collapseFilter" data-bs-toggle="collapse" data-bs-target="#collapseSize">
                        <p class="d-flex justify-content-between align-items-center m-0">
                            <span class="fw-bold" style="cursor: pointer !important; font-size: 13px">CHỌN SIZE</span>
                            <span><i class="bi bi-arrow-down" style="font-size: 13px"></i></span>
                        </p>
                        <ul class="list-group collapse cursor-pointer" id="collapseSize"
                            data-bs-parent="#accordion">
                            @for ($i = 39; $i <= 43; $i++)
                                <li class="list-group-item px-0 py-1 border-0" style="font-size: 14px">
                                    <input class="form-check-input me-1 checkbox" type="checkbox" value=""
                                        id="size{{ $i }}">
                                    <label class="form-check-label stretched-link"
                                        for="size{{ $i }}">Size {{ $i }}</label>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>    

