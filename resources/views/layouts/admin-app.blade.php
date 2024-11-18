<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        leaf: '#105341',
                        brown: '#532610'
                    },
                },
            },
        };
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex">
        @include('component.sidebar')

        <!-- Main Content -->
        <div class="flex-grow ml-64">
            <nav class="bg-white shadow p-4">
                <span class="text-xl font-semibold text-black">{{ $title }}</span>
            </nav>

            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>