@push('css')
    <style>
        .title-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .title-wrapper h3 {
            font-weight: 700;
            font-size: 22px;
            color: #0f3057;
            margin: 0;
        }

        .title-divider {
            width: 50px;
            height: 4px;
            background-color: rgba(226, 41, 61, 1);
            margin: 10px 0px;
        }

        .title-wrapper .subtitle {
            font-size: 16px;
            color: #0f3057;
        }

        .slide-container {
            margin: 0 30px;
            overflow: hidden;
        }

        .card {
            background-color: rgba(227, 223, 223, 0.7);
            border-radius: 5px;
            padding: 20px;
            border: 0;
        }

        .card .image-box {
            height: 100%;
        }

        .card .image-box img {
            width: 100%;
            height: 100%;
        }

        .detail-feedback {
            font-size: 16px;
            text-align: center;
        }

        .swiper-navBtn {
            color: #fff;
            height: 30px;
            width: 30px;
            background: #0a437f;
            border-radius: 50%;
        }

        .swiper-navBtn:hover {
            background-color: rgba(226, 41, 61, 1);
        }

        .swiper-navBtn::before,
        .swiper-navBtn::after {
            font-size: 12px;
            font-weight: 700;
        }

        .swiper-pagination-bullet {
            background-color: rgba(226, 41, 61, 1);
        }

        @media screen and (max-width: 768px) {
            .swiper-navBtn {
                display: none;
            }
        }
    </style>
@endpush

<div class="container g-0">
    <div class="tab-customer-feedback py-5 px-4">
        <div class="title-wrapper mb-5">
            <h3>KHÁCH HÀNG NÓI VỀ MYSHOES.VN</h3>
            <div class="title-divider"></div>
            <div class="subtitle">#FEEDBACK</div>
        </div>
        <div class="container-swiper">
            <div class="swiper mt-4">
                <div class="slide-container">
                    <div class="card-wrapper swiper-wrapper">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <img src="{{ asset('images/customer/IMG_1816-500x500.jpg') }}" alt="">
                                </div>
                                <!--<img src="images/profile/profile1.jpg" alt="" />-->
                                <div class="detail-feedback mt-3">
                                    <div class="feedback-">Myshoes.vn bán hàng chính hãng, giá rất ok, tôi đã mua một
                                        đôi giày chạy bộ của Nike đi rất êm và thích.</div>
                                    <div class="name-cus fst-italic fw-semibold mt-5">- Anh Nam -</div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

@push('javascript')
    <script type="text/javascript">
        var swiper = new Swiper(".slide-container", {
            slidesPerView: 4,
            spaceBetween: 20,
            sliderPerGroup: 4,
            loop: true,
            centerSlide: "true",
            fade: "true",
            grabCursor: "true",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1000: {
                    slidesPerView: 4,
                },
            },
        });
    </script>
@endpush