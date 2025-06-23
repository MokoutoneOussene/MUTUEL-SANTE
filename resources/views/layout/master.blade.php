<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.style')
</head>

<body class="index-page">

    @include('require.header')

    <main class="main">

        @yield('content')

    </main>

    @include('require.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('layout.script')

</body>

</html>
