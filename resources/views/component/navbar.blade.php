<nav class="bg-leaf border-gray-200 relative">
    <div class="max-w-screen flex items-center justify-between mx-4 p-4">    
        <!-- Logo aligned to the start -->
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/BrandIcon.png') }}" class="h-8 bg-white" alt="Brand Icon">
        </a>

        <!-- Centered Navigation Links by Navbar Width -->
        <div class="absolute left-1/2 transform -translate-x-1/2" id="navbar-user">
            <ul class="flex space-x-8 font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-leaf rtl:space-x-reverse md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-leaf md:dark:bg-leaf dark:border-gray-700">
                <li>
                    <a href="#" class="block p-0 text-white bg-leaf rounded underline underline-offset-4 decoration-cyan-500 decoration-2" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2">Menu</a>
                </li>
                <li>
                    <a href="#" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2">About Us</a>
                </li>
                <li>
                    <a href="#" class="block p-0 text-white bg-leaf rounded hover:underline hover:underline-offset-4 hover:decoration-cyan-500 hover:decoration-2">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Profile menu aligned to the end -->
        <div class="flex items-center space-x-5">
            <div>
                <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
            </div>

            <div class="flex items-center space-x-3 rtl:space-x-reverse relative">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <img class="w-8 h-8 rounded-full" src="{{ asset('img/ProfilePicture.png') }}" alt="user photo">
                </button>
    
                <!-- Dropdown Menu with absolute positioning -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-300 rounded-lg shadow dark:bg-white absolute top-full mt-2 right-0" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 truncate">Bonnie Green</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>