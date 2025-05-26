<!-- Meta Tags -->
<meta name="description" content="Sistem Informasi Infrastruktur TI Kabupaten Sijunjung">
<meta name="keywords" content="infrastruktur, TI, Sijunjung, BTS">
<meta name="author" content="Pemerintah Kabupaten Sijunjung">

<!-- Favicon -->
<link rel="icon" href="{{ asset('/images/kabupaten-sijunjung.png') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Base Styles -->
<style>
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

    /* Theme toggle */
    .theme-toggle {
        cursor: pointer;
        width: 48px;
        height: 24px;
        border-radius: 12px;
        background-color: #e2e8f0;
        position: relative;
        transition: all 0.3s ease;
    }

    .theme-toggle.dark {
        background-color: #1f2937;
    }

    .theme-toggle::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: white;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .theme-toggle.dark::after {
        transform: translateX(24px);
        background-color: #f59e0b;
    }

    /* Main content padding */
    main {
        padding-top: 90px;
    }

    /* Mobile responsive spacing */
    @media (max-width: 640px) {
        .header {
            padding: 1rem;
        }

        .logo {
            height: 40px;
        }

        .app-title {
            font-size: 1.2rem;
        }

        .app-subtitle {
            font-size: 0.75rem;
        }
    }
</style>