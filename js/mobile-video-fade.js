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
                videoOverlay.style.opacity = '1';
                videoOverlay.style.transition = 'opacity 0.6s ease-in-out';
            } else {
                // Video is out of viewport - fade out
                videoOverlay.style.opacity = '0';
                videoOverlay.style.transition = 'opacity 0.6s ease-in-out';
            }
        });
    }, {
        threshold: 0.2, // Trigger when 20% of video is visible
        rootMargin: '-50px' // Start fading slightly before leaving viewport
    });

    observer.observe(videoOverlay);
});
