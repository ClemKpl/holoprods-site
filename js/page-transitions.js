document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    // 1. Enter Animation: Add class after a brief delay
    setTimeout(() => {
        body.classList.add('page-loaded');
    }, 800); // Increased delay to show logo longer

    // 2. Exit Animation: Intercept links
    const links = document.querySelectorAll('a');

    links.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            const target = link.getAttribute('target');

            // Logic to determine if we should animate:
            // - Must have href
            // - Not opening in new tab
            // - Not an anchor link on same page (#)
            // - Must be internal link (same origin) or relative

            if (href &&
                target !== '_blank' &&
                !href.startsWith('#') &&
                !href.startsWith('mailto:') &&
                !href.startsWith('tel:')) {

                const isInternal = href.startsWith(window.location.origin) || !href.startsWith('http');

                if (isInternal) {
                    e.preventDefault();

                    // Trigger Exit Animation
                    body.classList.remove('page-loaded');

                    // Wait for animation to finish before navigating
                    setTimeout(() => {
                        window.location.href = href;
                    }, 600); // Matches CSS transition duration (0.6s)
                }
            }
        });
    });
});
