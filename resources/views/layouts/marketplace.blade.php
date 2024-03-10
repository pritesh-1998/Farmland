<!DOCTYPE html>
 <html lang="en">
    @include('includes.head')
<body>
    @include('includes.header')

    @yield('content')
    
    @include('includes.footer')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>
</html>
