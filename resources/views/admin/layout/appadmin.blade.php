<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('admin.layout.menu')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            @include('admin.layout.top')
            @yield('content')
            </div>
            <!-- End of Main Content -->
            @include('admin.layout.bottom')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

