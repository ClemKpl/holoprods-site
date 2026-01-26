<script>
    // Scroll Effect
    window.addEventListener('scroll', function () {
        const header = document.getElementById('main-header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile Menu Toggle
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const mobileNav = document.querySelector('.mobile-nav');
    const closeBtn = document.querySelector('.mobile-menu-close-btn');
    const menuOverlay = document.querySelector('.menu-overlay');

    function toggleMenu() {
        mobileNav.classList.toggle('active');
        if (menuOverlay) menuOverlay.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    }

    function closeMenu() {
        mobileNav.classList.remove('active');
        if (menuOverlay) menuOverlay.classList.remove('active');
        document.body.classList.remove('no-scroll');
    }

    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', toggleMenu);
    }

    if (closeBtn && mobileNav) {
        closeBtn.addEventListener('click', closeMenu);
    }
    
    // Close on overlay click
    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeMenu);
    }

    // Mobile Dropdown Toggle
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            // Only on mobile (check window width or if nav is fixed)
            if (window.innerWidth <= 1250) {
                e.preventDefault();
                const parent = trigger.parentElement;
                parent.classList.toggle('active');
            }
        });
    });
</script>
    <!-- Floating Contact Button (Mobile Only) -->
    <a href="contact.php" class="floating-contact-btn" aria-label="Nous contacter">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="22" y1="2" x2="11" y2="13"></line>
            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
        </svg>
    </a>
</body>

</html>