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
                <div class="interaction-tooltip">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13 17H11V11H13V17ZM13 9H11V7H13V9Z"
                            fill="currentColor" />
                    </svg>
                    <span>Faites glisser pour explorer</span>
                </div>
            </div>

            <!-- Hologram Video Overlay (Appears in Step 2) -->
            <div class="hologram-overlay">
                <div class="hologram-frame">
                    <!-- YouTube Integration -->
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/ex-cjj2I6WQ?autoplay=1&mute=0&controls=0&loop=1&playlist=ex-cjj2I6WQ&rel=0&playsinline=1&showinfo=0&modestbranding=1"
                        title="Hologram Video" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
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
            const modelWrapper = document.querySelector('.model-wrapper');

            if (textSection) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            textSection.classList.add('visible');
                            // Synchronize model animation with text on mobile
                            if (modelWrapper) {
                                modelWrapper.classList.add('visible');
                            }
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2
                });

                observer.observe(textSection);
            }

            // --- Hide Tooltip on First Interaction ---
            const modelWrapper = document.querySelector('.model-wrapper');
            if (modelViewer && modelWrapper) {
                const hideTooltip = () => {
                    modelWrapper.classList.add('interacted');
                    modelViewer.removeEventListener('mousedown', hideTooltip);
                    modelViewer.removeEventListener('touchstart', hideTooltip);
                };

                modelViewer.addEventListener('mousedown', hideTooltip);
                modelViewer.addEventListener('touchstart', hideTooltip);
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