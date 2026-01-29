<?php include 'header.php'; ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1><?php echo $lang['hero_title']; ?></h1>
            <p><?php echo $lang['hero_subtitle']; ?></p>
            <a href="#" class="btn-simulation"><?php echo $lang['cta_simulation']; ?></a>
        </div>
    </section>

    <!-- Scrolling Content -->
    <!-- Presentation Scroller -->
    <!-- Model Showcase Section -->
    <!-- Scrollytelling Showcase Section -->
    <section class="sticky-scroll-container">
        <div class="sticky-viewport">
            <!-- The Model (Stays Fixed) -->
            <div class="model-wrapper">
                <model-viewer src="assets/v2reexportpaslourd.glb" shadow-intensity="1" camera-orbit="215deg 80deg 105%"
                    auto-rotate camera-controls disable-zoom alt="Borne Holoprods">
                </model-viewer>

                <!-- Interaction Tooltip -->
                <div class="model-tooltip" id="modelTooltip">
                    <p><?php echo $lang['interact_tooltip']; ?></p>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const modelViewer = document.querySelector('model-viewer');
                    const tooltip = document.getElementById('modelTooltip');

                    if (modelViewer && tooltip) {
                        const hideTooltip = () => {
                            tooltip.classList.add('hidden');
                            // Remove from DOM after transition
                            setTimeout(() => tooltip.remove(), 500);

                            // Cleanup listeners
                            modelViewer.removeEventListener('mousedown', hideTooltip);
                            modelViewer.removeEventListener('touchstart', hideTooltip);
                        };

                        modelViewer.addEventListener('mousedown', hideTooltip);
                        modelViewer.addEventListener('touchstart', hideTooltip);
                    }
                });
            </script>

            <!-- Hologram Video Overlay (Appears in Step 2) -->
            <div class="hologram-overlay">
                <div class="hologram-frame">
                    <!-- YouTube Integration -->
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/ex-cjj2I6WQ?autoplay=0&mute=0&controls=1&loop=1&playlist=ex-cjj2I6WQ&rel=0&playsinline=1&showinfo=0&modestbranding=1"
                        title="Hologram Video" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Mobile-Only Model (Below Video) -->
            <div class="mobile-model-wrapper">
                <model-viewer src="assets/v2reexportpaslourd.glb" shadow-intensity="1" camera-orbit="180deg 80deg 105%"
                    alt="Borne Holoprods" disable-zoom>
                </model-viewer>
            </div>
        </div>

        <!-- Scrollable Steps -->
        <div class="scroll-steps">
            <!-- Step 1: Interactive + Text -->
            <div class="scroll-step step-1">
                <div class="container showcase-layout">
                    <div class="showcase-text">
                        <h2><?php echo $lang['step1_title']; ?></h2>
                        <p><?php echo $lang['step1_text']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Step 2: Fixed Model (No Text) -->
            <div class="scroll-step step-2">
                <!-- Empty, lets model take center stage -->
            </div>
        </div>
    </section>

    <!-- Dark Section (Gradient Continuation) -->
    <section class="dark-section">
        <div class="container">
            <!-- Section vierge prête pour votre contenu -->
        </div>
    </section>

    <!-- Script for materials (Sunset Glow) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- Model Material Logic ---
            const modelViewer = document.querySelector('model-viewer');
            if (modelViewer) {
                modelViewer.addEventListener("load", () => {
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
                        // Mirror + Intense Sunset Glow
                        material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 1]);
                        material.pbrMetallicRoughness.setRoughnessFactor(0);
                        material.pbrMetallicRoughness.setMetallicFactor(1);
                        material.emissiveFactor = [2, 0.6, 0.2];
                    }
                });
            }

            // --- Scroll Text Animation ---
            const textSection = document.querySelector('.showcase-text');
            if (textSection) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            textSection.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2
                });

                observer.observe(textSection);
            }

            // --- Scrollytelling Logic (Step 1 vs Step 2) ---
            const container = document.querySelector('.sticky-scroll-container');
            const step2 = document.querySelector('.step-2');

            if (modelViewer && container && step2) {
                const stepObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            // Entring Step 2
                            container.classList.add('step-2-active');

                            // 1. KILL MOMENTUM & INPUT
                            modelViewer.autoRotate = false;
                            modelViewer.cameraControls = false;

                            // 2. FORCE SNAP (Immediate Reset)
                            // We set the Goal state first
                            modelViewer.cameraOrbit = "180deg 80deg 105%";
                            modelViewer.cameraTarget = "auto auto auto";
                            modelViewer.fieldOfView = "30deg";

                            // Reset internal turntable drift if applicable
                            if (typeof modelViewer.resetTurntableRotation === 'function') {
                                modelViewer.resetTurntableRotation();
                            }

                            // If available, jump instantly (bypasses interpolation)
                            if (typeof modelViewer.jumpCameraToGoal === 'function') {
                                modelViewer.jumpCameraToGoal();
                            }

                            // 3. LOCK BOUNDS (Prevent drift)
                            requestAnimationFrame(() => {
                                modelViewer.minCameraOrbit = "180deg 80deg 105%";
                                modelViewer.maxCameraOrbit = "180deg 80deg 105%";
                            });

                        } else {
                            // Back in Step 1
                            container.classList.remove('step-2-active');

                            // UNLOCK Camera
                            modelViewer.minCameraOrbit = "auto";
                            modelViewer.maxCameraOrbit = "auto";

                            // Interactive, Offset, Auto-Rotate
                            modelViewer.cameraOrbit = "215deg 80deg 105%";
                            modelViewer.autoRotate = true;
                            modelViewer.cameraControls = true;
                        }
                    });
                }, { threshold: 0.2 }); // Trigger when Step 2 is 20% visible (earlier)

                stepObserver.observe(step2);
            }
        });
    </script>
</main>

<?php include 'footer.php'; ?>