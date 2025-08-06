<!DOCTYPE html>
<html>
<head>
    @include('adminlte::partials.head')
    @stack('styles') <!-- For additional CSS -->
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('adminlte::partials.navbar')
        @include('adminlte::partials.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    @include('adminlte::partials.footer')
    @include('adminlte::partials.scripts')

    <!-- Add Pusher/Echo initialization here -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        window.Pusher = Pusher;
    </script>

    @stack('scripts') <!-- For notification scripts -->
</body>
</html>
