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
    
    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        createStars();
        setupThemeToggle();
    });
</script>