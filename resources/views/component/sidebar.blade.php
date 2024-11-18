<div class="w-64 bg-gray-800 text-white fixed top-0 bottom-0 flex flex-col">
    <div class="bg-gray-700 p-6 text-center text-xl font-bold">
        Admin Panel
    </div>
    <nav class="flex-grow">
        <a href="{{ url('admin/dashboard') }}" class="flex items-center justify-start py-3 px-6 hover:bg-gray-900 hover:text-sky-500 {{ Request::is('admin/dashboard') ? 'text-sky-500' : '' }}">
            <i class="fa-solid fa-gauge-high w-6 mr-2"></i>
            <p class="font-semibold">Dashboard</p>
        </a>
        <a href="{{ url('admin/menu') }}" class="flex items-center justify-start py-3 px-6 hover:bg-gray-900 hover:text-sky-500 {{ Request::is('admin/menu') ? 'text-sky-500' : '' }}">
            <i class="fa-solid fa-utensils w-6 mr-2"></i>
            <p class="font-semibold">Menu</p>
        </a>
        <a href="#" class="flex items-center justify-start py-3 px-6 hover:bg-gray-900 hover:text-sky-500 {{ Request::is('') ? 'text-sky-500' : '' }}">
            <i class="fa-solid fa-receipt w-6 mr-2"></i>
            <p class="font-semibold">Transaksi</p>
        </a>
    </nav>
    <a href="#" class="flex items-center justify-start py-3 px-6 hover:bg-gray-900 hover:text-sky-500 {{ Request::is('') ? 'text-sky-500' : '' }}">
        <i class="fa-solid fa-right-from-bracket w-6 mr-2"></i>
        <p class="font-semibold">Logout</p>
    </a>
</div>