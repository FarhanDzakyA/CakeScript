document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById('backToTop');

    // Function to show or hide the button based on scroll position
    function toggleButton() {
        if (window.scrollY > 200) {
            button.classList.remove('hidden');
        } else {
            button.classList.add('hidden');
        }
    }

    // Check scroll position on page load
    toggleButton();

    // Add scroll event listener to toggle button visibility
    window.addEventListener('scroll', toggleButton);

    // Scroll to top smoothly when button is clicked
    button.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    const userMenuButton = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');

    if (userMenuButton && userDropdown) {
        userMenuButton.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    }

    AOS.init({
        duration: 1200,
        once: true,
    });
});