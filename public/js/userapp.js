document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById('backToTop');
    const userMenuButton = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');
    const cartList = document.querySelector('.cart-list');
    const orderButton = document.getElementById('order-button');
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });

    // Function to show or hide the back-to-top button based on scroll position
    function toggleButton() {
        if (window.scrollY > 200) {
            button.classList.remove('hidden');
        } else {
            button.classList.add('hidden');
        }
    }

    // Check scroll position on page load
    toggleButton();
    window.addEventListener('scroll', toggleButton);

    button.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    AOS.init({
        duration: 1200,
        once: true,
    });

    // Toggle User Dropdown Menu without transition
    userMenuButton.addEventListener('click', (event) => {
        event.stopPropagation();
        
        // Toggle visibility of user dropdown (no transition)
        userDropdown.classList.toggle('hidden');
    });

    // Close menus when clicking outside
    document.addEventListener('click', (event) => {
        // Close user dropdown if clicking outside of it
        if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
    });

    function updateCartBadge() {
        const cartData = JSON.parse(sessionStorage.getItem('cart')) || [];
        const totalItems = cartData.reduce((sum, item) => sum + item.quantity, 0);
        const cartBadge = document.getElementById('cart-badge');
    
        if (totalItems > 0) {
            cartBadge.textContent = totalItems; // Perbarui jumlah item
            cartBadge.classList.remove('hidden'); // Tampilkan badge
        } else {
            cartBadge.classList.add('hidden'); // Sembunyikan badge jika tidak ada item
        }
    }

    // Add the menu into the cart list
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const menuItem = {
                id: button.dataset.id,
                name: button.dataset.name,
                price: parseInt(button.dataset.price, 10),
                image: button.dataset.image,
                quantity: 1 // Default quantity saat pertama kali ditambahkan
            };
    
            // Ambil data keranjang dari session storage
            const cartData = JSON.parse(sessionStorage.getItem('cart')) || [];
            
            // Periksa apakah item sudah ada di cart
            const existingItem = cartData.find(item => item.id === menuItem.id);
            if (existingItem) {
                existingItem.quantity++; // Tambahkan quantity jika item sudah ada
            } else {
                cartData.push(menuItem); // Tambahkan item baru jika belum ada
            }
    
            // Simpan data keranjang ke session storage
            sessionStorage.setItem('cart', JSON.stringify(cartData));

            // Show notification when add a menu to cart
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "1000",
                "timeOut": "2500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              };
              toastr.success('Menu berhasil ditambahkan!', 'Success');

              updateCartBadge();
        });
    });     

    function loadCartFromStorage() {
        const cartData = JSON.parse(sessionStorage.getItem('cart')) || [];
        const totalPriceElement = document.getElementById('total-price');
    
        if (!cartList) {
            console.error('Element with class "cart-list" not found!');
            return;
        }
    
        if (cartData.length === 0) {
            cartList.innerHTML = `
                <div class="w-full h-full flex flex-col justify-center items-center">
                    <p class="text-center text-3xl font-semibold mb-2">Belum ada pesanan</p>
                    <div class="flex justify-center">
                        <a href="/menu" class="text-leaf hover:underline">Lanjutkan Belanja</a>
                    </div>
                </div>
            `;

            if (totalPriceElement) {
                totalPriceElement.textContent = 'Rp 0'; // Reset total harga jika keranjang kosong
            }

            orderButton.disabled = true;
            return;
        }

        orderButton.disabled = false;
    
        cartList.innerHTML = '';
        cartData.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.className = 'flex items-center gap-x-4 bg-white p-2 rounded-lg mb-5 shadow';
            cartItem.innerHTML = `
                <img src="${item.image}" class="h-36 w-36 object-center object-cover rounded-lg" alt="">
                <div class="flex flex-col grow">
                    <p class="text-2xl font-bold mb-2">${item.name}</p>
                    <div class="flex gap-x-4">
                        <p class="text-base font-semibold">${formatter.format(item.price)}</p>
                        <div class="flex items-center gap-x-2">
                            <button class="decrease-quantity bg-white px-2 rounded-md font-semibold border border-gray-300 shadow hover:bg-leaf hover:border-leaf hover:text-white" data-id="${item.id}">-</button>
                            <span>${item.quantity}</span>
                            <button class="increase-quantity bg-white px-2 rounded-md font-semibold border border-gray-300 shadow hover:bg-leaf hover:border-leaf hover:text-white" data-id="${item.id}">+</button>
                        </div>
                    </div>
                </div>
                <a href="#" data-id="${item.id}" class="remove-from-cart text-2xl text-red-500 hover:text-leaf mr-4">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            `;
            cartList.appendChild(cartItem);
        });
    
        // Update total price
        const totalPrice = calculateTotalPrice(cartData);
        if (totalPriceElement) {
            totalPriceElement.textContent = formatter.format(totalPrice);
        }
    
        // Add event listeners for quantity and remove buttons
        cartList.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                removeFromCart(button.dataset.id);
                updateCartBadge();
            });
        });
    
        cartList.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', () => changeQuantity(button.dataset.id, 1));
            updateCartBadge();
        });
    
        cartList.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', () => changeQuantity(button.dataset.id, -1));
            updateCartBadge();
        });
    }    

    // Fungsi untuk menghapus item dari session storage
    function removeFromCart(id) {
        let cartData = JSON.parse(sessionStorage.getItem('cart')) || [];
        cartData = cartData.filter(item => item.id !== id);
        sessionStorage.setItem('cart', JSON.stringify(cartData));
        loadCartFromStorage();
    }

    // Fungsi untuk mengubah quantity item di session storage
    function changeQuantity(id, amount) {
        const cartData = JSON.parse(sessionStorage.getItem('cart')) || [];
        const item = cartData.find(item => item.id === id);
        if (item) {
            item.quantity += amount;
            if (item.quantity <= 0) {
                removeFromCart(id);
                updateCartBadge();
            } else {
                sessionStorage.setItem('cart', JSON.stringify(cartData));
                loadCartFromStorage();
            }
        }
    }

    function calculateTotalPrice(cartData) {
        return cartData.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    orderButton.addEventListener('click', () => {
        const cartData = JSON.parse(sessionStorage.getItem('cart')) || [];
        
        // Pastikan data keranjang ada sebelum melanjutkan
        if (cartData.length === 0) {
            alert('Keranjang Anda kosong!');
            return;
        }
    
        // Kirim data keranjang ke input hidden di form
        document.getElementById('cartData').value = JSON.stringify(cartData);

        // Hapus cart dari sessionStorage sebelum submit
        sessionStorage.removeItem('cart');
    
        // Submit form untuk mengirim data ke backend
        document.getElementById('checkout-form').submit();
    });

    // Muat data keranjang saat halaman dimuat
    updateCartBadge();
    loadCartFromStorage();
});