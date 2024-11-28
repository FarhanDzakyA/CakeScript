<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body>
    <div class="w-full min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <img src="{{ asset('img/Brand Logo.png') }}" alt="Brand Icon" class="w-28 mb-6">
        <div class="bg-white shadow-md rounded-md p-4 max-w-xl">
            @yield('content')
        </div>
    </div>
</body>
</html>