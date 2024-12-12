<!doctype html>
<html lang="en">

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

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">

    @stack('styles')
    @livewireStyles
    @vite([])
</head>

<body>
    <div class="container pt-5">
        <header>
            <img src="{{ asset('/assets/img/Image_Banner.svg') }}" class="img-fluid rounded" width="100%"
                alt="{{ $title ?? '' }}">
            <div class="card border-responsive my-3">
                <div class="card-body">
                    <h6 class=" text-capitalize text-center fw-bold text-danger responsive-font">
                        Ariston Indonesia
                        Blog Competition 2024
                    </h6>
                </div>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @stack('scripts')

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

</html>
