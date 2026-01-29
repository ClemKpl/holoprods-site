document.addEventListener('DOMContentLoaded', () => {
    const progressFill = document.querySelector('.glass-progress-fill');
    if (!progressFill) return;

    window.addEventListener('scroll', () => {
        const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
        const scrollCurrent = window.scrollY;
        const scrollPercentage = (scrollCurrent / scrollTotal) * 100;
        progressFill.style.height = scrollPercentage + '%';
    });
});
