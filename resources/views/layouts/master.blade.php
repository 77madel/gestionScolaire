@include("partials.header")

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            @include("partials.navbar")

        </div>


        <div class="sidebar" id="sidebar">
           @include("partials.sidbar")
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield("contenu")

            </div>

           @include("partials.footer")

    <script src="{{asset ("js/jquery-3.6.0.min.js") }}"></script>
    <script src="{{asset ("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{asset ("js/feather.min.js") }}"></script>
    <script src="{{asset ("plugins/slimscroll/jquery.slimscroll.min.js") }}"></script>
    <script src="{{asset ("plugins/apexchart/apexcharts.min.js") }}"></script>
    <script src="{{asset ("plugins/apexchart/chart-data.js") }}"></script>
    <script src="{{asset ("js/script.js") }}"></script>
    @livewireScripts
</body>

</html>
