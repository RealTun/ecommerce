<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo/logo-myshoes-nho.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,500&display=swap"
        rel="stylesheet">
    @stack('css')
</head>

<body>
    <div class="container-fluid g-0">
        <header style="background-color: #0a437f">
            @include('web.layouts.header')
        </header>
        <main style="background-color: #ffffff">
            @yield('content')
            {{-- @include('web.layouts.feedback') --}}
        </main>
        <footer style="background-color: #0f3057; color: white">
            @include('web.layouts.footer')
        </footer>
    </div>
    <script type="text/javascript" id="zsiqchat">
        var $zoho = $zoho || {};
        $zoho.salesiq = $zoho.salesiq || {
            widgetcode: "siq5a328d2fae7d1cdc9f4859ef1d8561c69ffcc8cdb2b14317a4642b5566ec7706",
            values: {},
            ready: function() {}
        };
        var d = document;
        s = d.createElement("script");
        s.type = "text/javascript";
        s.id = "zsiqscript";
        s.defer = true;
        s.src = "https://salesiq.zohopublic.com/widget";
        t = d.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(s, t);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/showCart.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    @stack('javascript')
</body>

</html>
