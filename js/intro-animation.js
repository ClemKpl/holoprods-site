// Intro Text & Background Reveal Animation
document.addEventListener('DOMContentLoaded', () => {
    // Elements to reveal
    const revealElements = document.querySelectorAll('.intro-text, .intro-section, .sticky-scroll-container');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add specific class based on element type
                if (entry.target.classList.contains('intro-text')) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.add('revealed');
                }

                // Stop observing once revealed
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15, // Trigger when 15% visible (earlier for backgrounds)
        rootMargin: '0px'
    });

    revealElements.forEach(el => observer.observe(el));
});
