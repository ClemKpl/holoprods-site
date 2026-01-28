document.addEventListener('DOMContentLoaded', () => {
    const modelViewer = document.querySelector('#presentation-model');
    const steps = document.querySelectorAll('.step');

    if (!modelViewer || steps.length === 0) return;

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5 // Trigger when 50% of the step is visible
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add active class for fade in
                entry.target.classList.add('active');

                const orbit = entry.target.getAttribute('data-orbit');
                const target = entry.target.getAttribute('data-target');

                if (orbit) {
                    modelViewer.cameraOrbit = orbit;
                }

                // Move the model laterally if defined
                const translate = entry.target.getAttribute('data-translate');
                if (translate) {
                    // Only apply translation on larger screens (>900px)
                    if (window.innerWidth > 900) {
                        modelViewer.style.transform = `translateX(${translate})`;
                    } else {
                        modelViewer.style.transform = 'translateX(0)';
                    }
                } else {
                    modelViewer.style.transform = 'translateX(0)';
                }
            } else {
                // Remove active class for fade out
                entry.target.classList.remove('active');
            }
        });
    }, observerOptions);

}); // End foreach

// Handle Sunset Effect on Screen only
// Wait for the model to be loaded to access materials
const checkForMaterials = () => {
    if (!modelViewer.model || !modelViewer.model.materials) return;

    const material = modelViewer.model.materials.find((m) =>
        m.name.includes('Screen') ||
        m.name.includes('screen') ||
        m.name.includes('Display') ||
        m.name.includes('Ecran') ||
        m.name.includes('Vitre') ||
        m.name.includes('Glass')
    );

    if (material) {
        // Set Emissive Color (Sunset Orange/Red)
        material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 1]); // Pure black base
        material.pbrMetallicRoughness.setRoughnessFactor(0); // Mirror-like
        material.pbrMetallicRoughness.setMetallicFactor(1); // Chrome-like

        // Intensity raised > 1 for glow
        material.emissiveFactor = [2, 0.6, 0.2];
    }
};

modelViewer.addEventListener("load", checkForMaterials);


}); // End DOMContentLoaded
