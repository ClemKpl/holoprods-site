// Intro Text Fade-In Animation
document.addEventListener('DOMContentLoaded', () => {
    const introText = document.querySelector('.intro-text');

    if (!introText) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                introText.classList.add('visible');
                // Optional: Stop observing once visible
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3, // Trigger when 30% visible
        rootMargin: '0px'
    });

    observer.observe(introText);
});
