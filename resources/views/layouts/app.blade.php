<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <script src="{{ asset('js/userapp.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        leaf: '#105341',
                        darkleaf: '#0b3e30',
                        brown: '#532610'
                    },
                    height: {
                        'custome': '352px'
                    },
                },
            },
        };
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="overflow-x-hidden">
    @if (!request()->routeIs('login') && !request()->routeIs('regist'))
        @include('component.navbar')
    @endif

    @yield('content')

    @if (!request()->routeIs('login') && !request()->routeIs('regist'))
        @include('component.back_to_top')
        @include('component.footer')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @yield('script')
</body>
</html>