<div class="w-64 bg-leaf text-white fixed top-0 bottom-0 flex flex-col">
    <div class="bg-leaf py-6 px-2 text-center text-xl font-bold">
        <img src="{{ asset('img/BrandIcon.png') }}" alt="" class="w-1/1 bg-white mix-blend-lighten mb-1"> <!-- Mengurangi ukuran gambar dengan w-1/4 -->
    </div>

    <nav class="flex-grow">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-start py-3 px-6 hover:bg-darkleaf hover:text-cyan-500 {{ Request::is('admin/dashboard') ? 'text-cyan-500' : '' }}">
            <i class="fa-solid fa-gauge-high w-6 mr-2"></i>
            <p class="font-semibold">Dashboard</p>
        </a>
        <a href="{{ route('admin.menu') }}" class="flex items-center justify-start py-3 px-6 hover:bg-darkleaf hover:text-cyan-500 {{ Request::is('admin/menu*') ? 'text-cyan-500' : '' }}">
            <i class="fa-solid fa-utensils w-6 mr-2"></i>
            <p class="font-semibold">Menu</p>
        </a>
        <a href="{{ route('admin.transactions') }}" class="flex items-center justify-start py-3 px-6 hover:bg-darkleaf hover:text-cyan-500 {{ Request::is('admin/transactions') ? 'text-cyan-500' : '' }}">
            <i class="fa-solid fa-receipt w-6 mr-2"></i>
            <p class="font-semibold">Transactions</p>
        </a>
    </nav>
    <form action="{{ route('logout.admin') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center justify-start py-3 px-6 hover:bg-darkleaf hover:text-cyan-500 {{ Request::is('') ? 'text-cyan-500' : '' }}">
            <i class="fa-solid fa-right-from-bracket w-6 mr-2"></i>
            <p class="font-semibold">Logout</p>
        </button>
    </form>
</div>