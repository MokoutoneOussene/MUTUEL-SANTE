<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.style')
    <style>
    input.form-control {
        border-radius: 8px;
    }

    form {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
</style>

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
