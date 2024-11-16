<nav class="bg-leaf border-gray-200 relative">
    <div class="max-w-screen flex items-center justify-between mx-4 p-4">    
        <!-- Logo aligned to the start -->
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/BrandIcon.png') }}" class="h-8 bg-white" alt="Brand Icon">
        </a>

        <!-- Centered Navigation Links by Navbar Width -->
        <div class="absolute left-1/2 transform -translate-x-1/2" id="navbar-user">
            <ul class="flex space-x-8 font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-leaf rtl:space-x-reverse md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-leaf md:dark:bg-leaf dark:border-gray-700">
                <li>
                    <a href="{{ url('/') }}" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2 {{ Request::is('/') ? 'underline underline-offset-4 decoration-cyan-500 decoration-2' : '' }}" aria-current="page">Home</a>
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
            </ul>
        </div>

        <!-- Profile menu aligned to the end -->
        <div class="flex items-center space-x-5">
            <!-- Cart Icon -->
            <div>
                <button type="button" onclick="toggleCartMenu()">
                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                </button>
            </div>

            <!-- Cart Menu -->
            <div class="z-50 hidden absolute top-full right-0 backdrop-blur-md bg-gray-300/40 w-1/4 h-screen rounded-bl-lg p-4 text-black transform transition-transform duration-300 translate-x-full" id="cart-menu">
                <div class="flex items-center gap-x-4 bg-white p-2 rounded-lg pe-4 mb-2">
                    <img src="{{ asset('img/kue.jpg') }}" class="h-24 w-24 object-center object-cover rounded-lg" alt="">
                    <div class="flex flex-col">
                        <p class="text-lg font-semibold">Kosdnvsv</p>
                        <p class="text-sm font-normal">IDR 30</p>
                    </div>
                    <a href="">
                        <i class="fa-solid fa-trash-can text-red-500"></i>
                    </a>
                </div>
                <div class="flex items-center gap-x-4 bg-white p-2 rounded-lg pe-4">
                    <img src="{{ asset('img/kue.jpg') }}" class="h-24 rounded-lg" alt="">
                    <div class="flex-grow">
                        <p>Kosdnvsv</p>
                        <p>IDR 30</p>
                    </div>
                    <i class="fa-solid fa-trash-can"></i>
                </div>

                <form action="{{ url('/payment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="harga" value="30000">
                    <button type="submit" id="pay-button">BELI</button>
                </form>
            </div>

            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <img class="w-8 h-8 rounded-full" src="{{ asset('img/ProfilePicture.png') }}" alt="user photo">
                </button>
    
                <!-- Dropdown Menu with absolute positioning -->
                <div class="z-50 hidden my-4 text-base list-none bg-gray-50 divide-y divide-gray-300 rounded-lg shadow absolute top-full mt-4 right-auto" id="user-dropdown">
                    <div class="px-4 py-3">
                        @if(auth()->check())
                            <span class="block text-sm text-gray-900 truncate">{{ auth()->user()->nama_pelanggan }}</span>
                        @else
                            <span class="block text-sm text-gray-900 truncate"></span>
                        @endif
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Profile</a>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="POST">
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