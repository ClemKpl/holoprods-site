// Customization Container Fade-in Animation
document.addEventListener('DOMContentLoaded', () => {
    const customizationContainer = document.querySelector('.customization-container');

    if (!customizationContainer) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                customizationContainer.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2, // Trigger when 20% visible
        rootMargin: '0px'
    });

    observer.observe(customizationContainer);
});
