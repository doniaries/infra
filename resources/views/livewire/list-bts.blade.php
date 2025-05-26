<div>
    <x-layouts.app>
        <div class="container px-4 py-8 mx-auto">
            <div class="mx-auto max-w-7xl">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Data BTS</h1>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    {{ $this->table }}
                </div>
            </div>
        </div>
        
        <style>
            .pt-120 {
                padding-top: 120px;
            }
            /* Base styles */
            body {
                font-family: 'Poppins', sans-serif;
                transition: background-color 0.3s ease, color 0.3s ease;
                margin: 0;
                padding: 0;
            }

            /* Dark mode styles */
            body.dark {
                background-color: #0f172a;
                color: #f8fafc;
            }

            /* Sky background */
            .animated-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: -1;
                background-color: #e0f2fe;
                /* Light blue sky for light mode */
                transition: background-color 0.3s ease;
            }

            body.dark .animated-bg {
                background-color: #0c1222;
                /* Dark blue night sky for dark mode */
            }

            /* Stars (visible only in dark mode) */
            .stars {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            body.dark .stars {
                opacity: 1;
            }

            .star {
                position: absolute;
                background-color: #ffffff;
                border-radius: 50%;
                animation: twinkle 2s infinite alternate;
            }

            @keyframes twinkle {
                0% {
                    opacity: 0.2;
                }

                100% {
                    opacity: 1;
                }
            }

            /* Header styles */
            .header {
                background-color: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                padding: 1rem 2rem;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            }

            body.dark .header {
                background-color: rgba(15, 23, 42, 0.8);
            }

            .logo-container {
                display: flex;
                align-items: center;
                gap: 1.5rem;
            }

            .logo {
                height: 50px;
                width: auto;
                transition: transform 0.3s ease;
            }

            .logo:hover {
                transform: scale(1.05);
            }

            .app-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: #2563eb;
                margin: 0;
            }

            body.dark .app-title {
                color: #60a5fa;
            }

            .app-subtitle {
                font-size: 0.875rem;
                color: #64748b;
                margin: 0;
            }

            body.dark .app-subtitle {
                color: #94a3b8;
            }

            /* Navigation */
            .nav-link {
                font-weight: 500;
                color: #1e40af;
                padding: 0.5rem 0.75rem;
                border-bottom: 2px solid transparent;
                transition: all 0.2s;
            }

            .nav-link:hover {
                color: #2563eb;
            }

            .nav-link.active {
                color: #2563eb;
                border-bottom: 2px solid #2563eb;
            }

            body.dark .nav-link {
                color: #60a5fa;
            }

            body.dark .nav-link:hover {
                color: #93c5fd;
            }

            body.dark .nav-link.active {
                color: #93c5fd;
                border-bottom: 2px solid #60a5fa;
            }

            .nav-button {
                padding: 0.5rem 1rem;
                background-color: #2563eb;
                color: white;
                border-radius: 0.5rem;
                transition: background-color 0.2s;
            }

            .nav-button:hover {
                background-color: #1d4ed8;
            }

            body.dark .nav-button {
                background-color: #3b82f6;
            }

            body.dark .nav-button:hover {
                background-color: #2563eb;
            }

            /* Hero title */
            .hero-title {
                color: #1e40af;
            }

            body.dark .hero-title {
                color: #60a5fa;
            }

             /* Mobile responsive spacing */
             @media (max-width: 640px) {
                    .container.px-4.py-8.mx-auto.pt-120 {
                        margin-top: 140px !important;
                    }
                    .filament-notifications, .toast, .alert {
                        margin-top: 140px !important;
                    }
                }
        </style>

        <script>
            // Create stars
            function createStars() {
                const stars = document.getElementById('stars');
                const count = 100;
                
                for (let i = 0; i < count; i++) {
                    const star = document.createElement('div');
                    star.className = 'star';
                    star.style.width = `${Math.random() * 3}px`;
                    star.style.height = star.style.width;
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.animationDelay = `${Math.random() * 2}s`;
                    stars.appendChild(star);
                }
            }
            
            // Create clouds
            /* function createClouds() {
                const cloudsContainer = document.querySelector('.clouds');
                const count = 5; // Jumlah awan
                
                for (let i = 0; i < count; i++) {
                    const cloud = document.createElement('div');
                    cloud.className = 'cloud';
                    cloud.style.bottom = `${Math.random() * 100 + 20}px`; // Posisi vertikal acak
                    cloud.style.animationDuration = `${15 + Math.random() * 10}s`; // Durasi animasi acak
                    cloud.style.animationDelay = `${Math.random() * 5}s`; // Delay animasi acak
                    cloud.style.transform = `scale(${0.5 + Math.random() * 0.5})`; // Ukuran acak
                    cloudsContainer.appendChild(cloud);
                }
            } */
            
            // Theme toggle
            function setupThemeToggle() {
                const toggle = document.getElementById('theme-toggle');
                const body = document.body;
                const theme = localStorage.getItem('theme');
                
                if (theme === 'dark') {
                    body.classList.add('dark');
                    toggle.classList.add('dark');
                }
                
                toggle.addEventListener('click', () => {
                    body.classList.toggle('dark');
                    toggle.classList.toggle('dark');
                    
                    const currentTheme = body.classList.contains('dark') ? 'dark' : 'light';
                    localStorage.setItem('theme', currentTheme);
                });
            }
            
            // Interactive landmarks
            function setupLandmarks() {
                const landmarks = document.querySelectorAll('.landmark');
                
                landmarks.forEach(landmark => {
                    landmark.addEventListener('click', () => {
                        landmark.classList.toggle('clicked');
                        setTimeout(() => {
                            landmark.classList.remove('clicked');
                        }, 1000);
                    });
                });
            }
            
            // Initialize
            document.addEventListener('DOMContentLoaded', () => {
                createStars();
                // createClouds(); // Hapus pemanggilan createClouds
                setupThemeToggle();
                if (typeof setupLandmarks === 'function') {
                    setupLandmarks();
                }
            });
        </script>
    </x-layouts.app>
</div>


