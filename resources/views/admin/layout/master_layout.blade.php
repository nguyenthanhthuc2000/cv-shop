
<!DOCTYPE html>
<html lang="en">

@include('admin.layout.head')

<body>
<div class="wrapper">
    @include('admin.layout.sidebar')

    <div class="main">
        @include('admin.layout.header')
        <main class="content">
            @yield('content')
        </main>

        @include('admin.layout.footer')
    </div>
</div>

@include('admin.layout.script')
</body>

</html>
