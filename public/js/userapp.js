document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById('backToTop');
    const userMenuButton = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');
    const cartMenuButton = document.querySelector('.fa-cart-shopping').parentNode;
    const cartMenu = document.getElementById('cart-menu');

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

        // Close the cart menu if it is open
        if (!cartMenu.classList.contains('hidden')) {
            cartMenu.classList.add('translate-x-full');
            cartMenu.addEventListener('transitionend', () => {
                cartMenu.classList.add('hidden');
            }, { once: true });
        }
    });

    // Toggle Cart Menu with transition
    cartMenuButton.addEventListener('click', (event) => {
        event.stopPropagation();

        // Toggle visibility of cart menu
        if (cartMenu.classList.contains('hidden')) {
            cartMenu.classList.remove('hidden');
            setTimeout(() => cartMenu.classList.remove('translate-x-full'), 10);

            // Close the user dropdown if it is open
            if (!userDropdown.classList.contains('hidden')) {
                userDropdown.classList.add('hidden');
            }
        } else {
            cartMenu.classList.add('translate-x-full');
            cartMenu.addEventListener('transitionend', () => {
                cartMenu.classList.add('hidden');
            }, { once: true });
        }
    });

    // Close menus when clicking outside
    document.addEventListener('click', (event) => {
        // Close user dropdown if clicking outside of it
        if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
        // Close cart menu if clicking outside of it
        if (!cartMenuButton.contains(event.target) && !cartMenu.contains(event.target)) {
            cartMenu.classList.add('translate-x-full');
            cartMenu.addEventListener('transitionend', () => {
                cartMenu.classList.add('hidden');
            }, { once: true });
        }
    });
});
