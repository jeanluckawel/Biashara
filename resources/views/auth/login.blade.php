<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Biashara Shop | Login Page</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Biashara Shop" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="Biashara Shop est un système de gestion de stock permettant de gérer les produits, catégories, achats, ventes, fournisseurs, clients et mouvements de stock facilement."
    />

    <meta
        name="keywords"
        content="gestion de stock, logiciel de stock, inventaire, produits, ventes, achats, fournisseurs, clients, mouvements de stock, gestion commerciale, Biashara Shop, système ERP, magasin, commerce"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="../css/adminlte.css" as="style" />
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
    <link rel="stylesheet" href="../css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    >

    <!-- Google Font Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .login-box .card {
            border-radius: 0 !important;
        }

        .login-box {
            width: 380px;
        }
        body {
            font-family: 'Open Sans', sans-serif;
        }


        .login-box .login-logo a {
            font-family: 'Open Sans', sans-serif;
            font-weight: 500;
        }

        .form-control,
        .btn,
        .card,
        label {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="login-page bg-body-secondary">
<div class="login-box">
    <div class="login-logo">
        <a href="../index2.html"><b>Biashara</b>Shop</a>
    </div>
    <!-- /.login-logo -->
    <div class="card shadow rounded-0">

        <div class="card-body login-card-body p-4">

            <p class="login-box-msg fw-bold fs-5">
                Sign in to start your session
            </p>


            <form method="POST" action="{{ route('login') }}">
                @csrf


                {{-- Email --}}
                <div class="input-group mb-3">

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control rounded-0"
                        placeholder="Email"
                        required
                    >

                    <div class="input-group-text rounded-0">
                        <span class="bi bi-envelope"></span>
                    </div>

                </div>



                {{-- Password --}}
                <div class="input-group mb-3">

                    <input
                        type="password"
                        name="password"
                        class="form-control rounded-0"
                        placeholder="Password"
                        required
                    >

                    <div class="input-group-text rounded-0">
                        <span class="bi bi-lock-fill"></span>
                    </div>

                </div>




                <div class="row align-items-center mt-4">


                    {{-- Remember --}}
                    <div class="col-8">

                        <div class="form-check">

                            <input
                                id="remember_me"
                                type="checkbox"
                                class="form-check-input"
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >

                            <label class="form-check-label small" for="remember_me">
                                {{ __('Remember me') }}
                            </label>

                        </div>

                    </div>



                    {{-- Button --}}
                    <div class="col-4">

                        <button
                            type="submit"
                            class="btn btn-primary w-100 rounded-0"
                        >
                            login
                            <i class="bi bi-box-arrow-in-right"></i>
                        </button>

                    </div>


                </div>


            </form>



            <hr class="mt-4">


            <p class="mb-0 text-center">
                <a href="#" class="small">
                    Help Desk
                </a>
            </p>


        </div>

    </div>
</div>
<!-- /.login-box -->
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
<script src="{{ asset('js/adminlte.js')}}"></script>
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
<!--end::Script-->
</body>
<!--end::Body-->
</html>

