// Mobile Video Fade In/Out on Scroll
document.addEventListener('DOMContentLoaded', () => {
    // Only run on mobile
    if (window.innerWidth > 900) return;

    const videoOverlay = document.querySelector('.hologram-overlay');
    if (!videoOverlay) return;

    // Create IntersectionObserver to detect when video enters/exits viewport
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Video is in viewport - fade in
                // Video is in viewport - fade in
                videoOverlay.style.opacity = '1';
            }
            // Removed fade out logic - video stays visible once triggered
        });
    }, {
        threshold: 0.2, // Trigger when 20% of video is visible
        rootMargin: '-50px' // Start fading slightly before leaving viewport
    });

    observer.observe(videoOverlay);
});
