
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials._head')
</head>

<body>


        @include('admin.partials._nav')
        @include('admin.partials._sidenav')


        <main class="content">

            @include('admin.partials._topbar')

            @yield('content')
            @include('admin.partials._footer')
        </main>

        @include('admin.partials._scripts')

</body>

</html>
