document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    // Mark site as visited in this session
    sessionStorage.setItem('intro_shown', 'true');

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
                    // Check if target is homepage
                    // Create a dummy anchor to parse the full href
                    const urlParser = document.createElement('a');
                    urlParser.href = href;
                    const path = urlParser.pathname;

                    const isHomePageTarget = path === '/' ||
                        path.endsWith('/index.php') ||
                        path.endsWith('/');

                    if (isHomePageTarget) {
                        // Only animate when going TO the homepage
                        e.preventDefault();

                        // Trigger Exit Animation
                        body.classList.remove('page-loaded');

                        // Wait for animation to finish before navigating
                        setTimeout(() => {
                            window.location.href = href;
                        }, 600);
                    }
                    // For all other pages, do NOTHING. Let the browser navigate instantly.
                }
            }
        });
    });
});
