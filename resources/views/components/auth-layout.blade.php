<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <title>
        {{ $title ?? 'Ariston Blog Competition 2024' }} - Ariston Indonesia
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="title" content="Ariston Blog Competition 2024 - Ariston Indonesia">
    <meta name="description"
        content="Ikuti Ariston Blog Competition 2024 dan bagikan tips memilih water heater yang baik. Raih kesempatan memenangkan berbagai hadiah menarik bersama Ariston!">
    <meta name="keywords"
        content="Ariston, Blog Competition 2024, Ariston Indonesia, water heater, tips memilih, kenyamanan rumah, teknologi rumah">
    <meta name="author" content="Ariston Indonesia">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Ariston Blog Competition 2024 - Ariston Indonesia">
    <meta property="og:description"
        content="Ikuti Ariston Blog Competition 2024 dan bagikan tips memilih water heater yang baik. Raih kesempatan memenangkan berbagai hadiah menarik bersama Ariston!">
    <meta property="og:image"
        content="https://ariston.kleecks-cdn.com/cms/wpmedia/2022/02/14081808/RrY0fuYi-Logo_Ariston_payoff_280x92_OLD.svg">
    <meta property="og:url" content="https://www.ariston.com/id-id">
    <meta property="og:site_name" content="Ariston Indonesia">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ariston Blog Competition 2024 - Ariston Indonesia">
    <meta name="twitter:description"
        content="Ikuti Ariston Blog Competition 2024 dan bagikan tips memilih water heater yang baik. Raih kesempatan memenangkan berbagai hadiah menarik bersama Ariston!">
    <meta name="twitter:image"
        content="https://ariston.kleecks-cdn.com/cms/wpmedia/2022/02/14081808/RrY0fuYi-Logo_Ariston_payoff_280x92_OLD.svg">
    <meta name="twitter:url" content="https://twitter.com/aristonid">
    <meta name="twitter:site" content="@AristonID">

    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/img/favicon/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">

                                    <img src="{{ asset('/assets/img/Logo.png') }}" class="img-fluid rounded-top"
                                        alt="Logo" />
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- / Content -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
