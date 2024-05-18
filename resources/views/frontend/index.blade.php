<body>
@include('frontend.header')
@include('sweetalert::alert')

@yield('content')

@yield('scripts')

@include('frontend.footer')
</body>