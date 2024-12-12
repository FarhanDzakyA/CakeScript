<nav class="bg-leaf border-gray-200 relative">
    <div class="max-w-screen flex items-center justify-between mx-4 p-4">    
        <!-- Logo aligned to the start -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/BrandIcon.png') }}" class="h-8 bg-white" alt="Brand Icon">
        </a>

        <!-- Centered Navigation Links by Navbar Width -->
        <div class="absolute left-1/2 transform -translate-x-1/2" id="navbar-user">
            <ul class="flex space-x-8 font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-leaf rtl:space-x-reverse md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-leaf md:dark:bg-leaf dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2 {{ Request::is('/') ? 'underline underline-offset-4 decoration-cyan-500 decoration-2' : '' }}" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('menu') }}" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2 {{ Request::is('menu') ? 'underline underline-offset-4 decoration-cyan-500 decoration-2' : '' }}">Menu</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2 {{ Request::is('about') ? 'underline underline-offset-4 decoration-cyan-500 decoration-2' : '' }}">About Us</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2 {{ Request::is('contact') ? 'underline underline-offset-4 decoration-cyan-500 decoration-2' : '' }}">Contact</a>
                </li>
                <li>
                    <a href="{{ route('orders') }}" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2 {{ Request::is('orders') ? 'underline underline-offset-4 decoration-cyan-500 decoration-2' : '' }}">Order</a>
                </li>
            </ul>
        </div>

        <!-- Profile menu aligned to the end -->
        <div class="flex items-center space-x-5">
            <!-- Cart Icon -->
            <div class="relative">
                <a href="{{ route('cart') }}">
                    <i class="fa-solid fa-cart-shopping text-white hover:text-cyan-500"></i>
                    <span id="cart-badge" class="absolute -top-1.5 -right-2 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full hidden">
                        0
                    </span>
                </a>
            </div>

            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <button type="button" class="flex items-center gap-x-2 text-white bg-transparent hover:text-cyan-500" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="max-w-40 truncate">{{ auth()->user()->nama }}</span>
                        <i class="fa-solid fa-chevron-down"></i>
                </button>
    
                <!-- Dropdown Menu with absolute positioning -->
                <div class="z-50 hidden w-36 my-4 text-base list-none bg-gray-50 divide-y divide-gray-300 rounded-lg shadow" id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout.user') }}" method="POST" class="logout-form">
                                @csrf
                                <button type="submit" class="block px-4 py-2 w-full text-sm text-start text-gray-700 hover:bg-gray-300">Sign Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>