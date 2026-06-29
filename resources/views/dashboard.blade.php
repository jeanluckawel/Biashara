<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Biashara shop</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Biashara shop" />

    <meta name="author" content="JL kawel" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <link rel="preload" href="./css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="./css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous"
    />
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<!--begin::App Wrapper-->
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a href="#" class="nav-link">
                        <i class="bi bi-currency-dollar"></i>
                        1 USD
                    </a>
                </li>

                <li class="nav-item d-none d-md-block">
                    <a href="#" class="nav-link">
                        <i class="bi bi-currency-exchange"></i>
                        2300 CDF
                    </a>
                </li>
            </ul>
            <!--end::Start Navbar Links-->
            <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto">
                <!--begin::Navbar Search-->
                <li class="nav-item dropdown">


                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">


                        <i class="bi bi-translate"></i>

                        {{ strtoupper(app()->getLocale()) }}


                    </a>





                    <ul class="dropdown-menu dropdown-menu-end">


                        <li>


                            <a class="dropdown-item"
                               href="{{ route('language.switch','en') }}">


                                🇬🇧 English


                            </a>


                        </li>





                        <li>


                            <a class="dropdown-item"
                               href="{{ route('language.switch','fr') }}">


                                🇫🇷 Français


                            </a>


                        </li>


                    </ul>



                </li>
                <!--end::Navbar Search-->
                <!--begin::Messages Dropdown Menu-->
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link" data-bs-toggle="dropdown" href="#">--}}
{{--                        <i class="bi bi-chat-text"></i>--}}
{{--                        <span class="navbar-badge badge text-bg-danger">3</span>--}}
{{--                    </a>--}}
{{--                    --}}
{{--                    --}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                            <!--begin::Message-->--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <img--}}
{{--                                        src="./assets/img/user1-128x128.jpg"--}}
{{--                                        alt="User Avatar"--}}
{{--                                        class="img-size-50 rounded-circle me-3"--}}
{{--                                    />--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h3 class="dropdown-item-title">--}}
{{--                                        Brad Diesel--}}
{{--                                        <span class="float-end fs-7 text-danger"--}}
{{--                                        ><i class="bi bi-star-fill"></i--}}
{{--                                            ></span>--}}
{{--                                    </h3>--}}
{{--                                    <p class="fs-7">Call me whenever you can...</p>--}}
{{--                                    <p class="fs-7 text-secondary">--}}
{{--                                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Message-->--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                            <!--begin::Message-->--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <img--}}
{{--                                        src="./assets/img/user8-128x128.jpg"--}}
{{--                                        alt="User Avatar"--}}
{{--                                        class="img-size-50 rounded-circle me-3"--}}
{{--                                    />--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h3 class="dropdown-item-title">--}}
{{--                                        John Pierce--}}
{{--                                        <span class="float-end fs-7 text-secondary">--}}
{{--                          <i class="bi bi-star-fill"></i>--}}
{{--                        </span>--}}
{{--                                    </h3>--}}
{{--                                    <p class="fs-7">I got your message bro</p>--}}
{{--                                    <p class="fs-7 text-secondary">--}}
{{--                                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Message-->--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                            <!--begin::Message-->--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <img--}}
{{--                                        src="./assets/img/user3-128x128.jpg"--}}
{{--                                        alt="User Avatar"--}}
{{--                                        class="img-size-50 rounded-circle me-3"--}}
{{--                                    />--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h3 class="dropdown-item-title">--}}
{{--                                        Nora Silvester--}}
{{--                                        <span class="float-end fs-7 text-warning">--}}
{{--                          <i class="bi bi-star-fill"></i>--}}
{{--                        </span>--}}
{{--                                    </h3>--}}
{{--                                    <p class="fs-7">The subject goes here</p>--}}
{{--                                    <p class="fs-7 text-secondary">--}}
{{--                                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Message-->--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                </li>--}}
                <!--end::Messages Dropdown Menu-->
                <!--begin::Notifications Dropdown Menu-->
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link" data-bs-toggle="dropdown" href="#">--}}
{{--                        <i class="bi bi-bell-fill"></i>--}}
{{--                        <span class="navbar-badge badge text-bg-warning">15</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">--}}
{{--                        <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                            <i class="bi bi-envelope me-2"></i> 4 new messages--}}
{{--                            <span class="float-end text-secondary fs-7">3 mins</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                            <i class="bi bi-people-fill me-2"></i> 8 friend requests--}}
{{--                            <span class="float-end text-secondary fs-7">12 hours</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                            <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports--}}
{{--                            <span class="float-end text-secondary fs-7">2 days</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <!--end::Notifications Dropdown Menu-->
                <!--begin::Fullscreen Toggle-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                        <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                    </a>
                </li>
                <!--end::Fullscreen Toggle-->
                <!--begin::User Menu Dropdown--><li class="nav-item dropdown user-menu">


                    <a href="#"
                       class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown">


{{--                        <img--}}

{{--                            src="{{ asset('assets/img/user2-160x160.jpg') }}"--}}

{{--                            class="user-image rounded-circle shadow"--}}

{{--                            alt="User Image"--}}

{{--                        />--}}


                        <span class="d-none d-md-inline">

            {{ auth()->user()->name }}

        </span>


                    </a>





                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">





                        {{-- USER IMAGE --}}

                        <li class="user-header text-bg-primary">


{{--                            <img--}}

{{--                                src="{{ asset('assets/img/user2-160x160.jpg') }}"--}}

{{--                                class="rounded-circle shadow"--}}

{{--                                alt="User Image"--}}

{{--                            />--}}



                            <p>


                                {{ auth()->user()->name }}



                                @if(auth()->user()->roles->count())


                                    <small>

                                        {{ auth()->user()->roles->first()->name }}

                                    </small>


                                @else


                                    <small>

                                        User

                                    </small>


                                @endif



                                <small>

                                    Member since
                                    {{ auth()->user()->created_at->format('M Y') }}

                                </small>



                            </p>



                        </li>







                        {{-- USER BODY --}}

                        <li class="user-body">


                            <div class="row">


                                <div class="col-4 text-center">


                                    <a href="#">

                                        {{ auth()->user()->roles->count() }}

                                        <br>

                                        Roles

                                    </a>


                                </div>



                                <div class="col-4 text-center">


                                    <a href="#">

                                        {{ auth()->user()->permissions->count() }}

                                        <br>

                                        Permissions

                                    </a>


                                </div>



                                <div class="col-4 text-center">


                                    <a href="#">

                                        {{ auth()->user()->created_at->format('Y') }}

                                        <br>

                                        Since

                                    </a>


                                </div>


                            </div>


                        </li>







                        {{-- FOOTER --}}

                        <li class="user-footer">


                            <a href="#"

                               class="btn btn-default btn-flat">


                                <i class="bi bi-person me-1"></i>

                                Profile


                            </a>





                            <form

                                action="{{ route('logout') }}"

                                method="POST"

                                class="float-end">


                                @csrf


                                <button

                                    type="submit"

                                    class="btn btn-default btn-flat">


                                    <i class="bi bi-box-arrow-right me-1"></i>

                                    Sign out


                                </button>


                            </form>



                        </li>





                    </ul>


                </li>
                <!--end::User Menu Dropdown-->
            </ul>
            <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
    </nav>
    <!--end::Header-->
    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">

{{--            <a href="{{ route('dashboard') }}" class="brand-link">--}}

{{--                <img--}}
{{--                    src="{{ asset('assets/img/logo.png') }}"--}}
{{--                    alt="Biashara Shop Logo"--}}
{{--                    class="brand-image opacity-75 shadow"--}}
{{--                />--}}

                <span class="brand-text fw-light">
            Biashara Shop
        </span>

{{--            </a>--}}

        </div>

        <div class="sidebar-wrapper">

           @include('layouts.sidebar')

        </div>

    </aside>

    <main class="app-main">
        @yield('content')
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    @include('layouts.footer')
    <!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"
></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"
></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
    crossorigin="anonymous"
></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="./js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
<!--end::OverlayScrollbars Configure-->
<!-- OPTIONAL SCRIPTS -->
<!-- apexcharts -->
<script
    src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
    crossorigin="anonymous"
></script>
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    /* apexcharts
     * -------
     * Here we will create a few charts using apexcharts
     */

    //-----------------------
    // - MONTHLY SALES CHART -
    //-----------------------

    const sales_chart_options = {
        series: [
            {
                name: 'Digital Goods',
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: 'Electronics',
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 180,
            type: 'area',
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01',
                '2023-02-01',
                '2023-03-01',
                '2023-04-01',
                '2023-05-01',
                '2023-06-01',
                '2023-07-01',
            ],
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy',
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector('#sales-chart'),
        sales_chart_options,
    );
    sales_chart.render();

    //---------------------------
    // - END MONTHLY SALES CHART -
    //---------------------------

    function createSparklineChart(selector, data) {
        const options = {
            series: [{ data }],
            chart: {
                type: 'line',
                width: 150,
                height: 30,
                sparkline: {
                    enabled: true,
                },
            },
            colors: ['var(--bs-primary)'],
            stroke: {
                width: 2,
            },
            tooltip: {
                fixed: {
                    enabled: false,
                },
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter() {
                            return '';
                        },
                    },
                },
                marker: {
                    show: false,
                },
            },
        };

        const chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
    }

    const table_sparkline_1_data = [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54];
    const table_sparkline_2_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44];
    const table_sparkline_3_data = [15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64];
    const table_sparkline_4_data = [30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64];
    const table_sparkline_5_data = [20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64];
    const table_sparkline_6_data = [5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44];
    const table_sparkline_7_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74];

    createSparklineChart('#table-sparkline-1', table_sparkline_1_data);
    createSparklineChart('#table-sparkline-2', table_sparkline_2_data);
    createSparklineChart('#table-sparkline-3', table_sparkline_3_data);
    createSparklineChart('#table-sparkline-4', table_sparkline_4_data);
    createSparklineChart('#table-sparkline-5', table_sparkline_5_data);
    createSparklineChart('#table-sparkline-6', table_sparkline_6_data);
    createSparklineChart('#table-sparkline-7', table_sparkline_7_data);

    //-------------
    // - PIE CHART -
    //-------------

    const pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
            type: 'donut',
        },
        labels: ['Chrome', 'Edge', 'FireFox', 'Safari', 'Opera', 'IE'],
        dataLabels: {
            enabled: false,
        },
        colors: ['#0d6efd', '#20c997', '#ffc107', '#d63384', '#6f42c1', '#adb5bd'],
    };

    const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
    pie_chart.render();

    //-----------------
    // - END PIE CHART -
    //-----------------
</script>
<!--end::Script-->
</body>
<!--end::Body-->
</html>
