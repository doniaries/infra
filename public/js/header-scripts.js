// public/js/header-scripts.js

document.addEventListener("DOMContentLoaded", function () {
    // --- Scroll Handler for Scrolled Header ---
    const header = document.querySelector(".header");

    function handleScroll() {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    }

    window.addEventListener("scroll", handleScroll);
    handleScroll(); // Initial check on page load

    // --- Mobile Menu Toggle ---
    const menuToggle = document.getElementById("mobileMenuToggle");
    const megaMenu = document.getElementById("megaMenu");
    const megaMenuClose = document.getElementById("megaMenuClose");
    const megaMenuLinks = megaMenu ? megaMenu.querySelectorAll("a") : [];
    const body = document.body;

    function toggleMenu(active) {
        menuToggle.classList.toggle("active", active);
        megaMenu.classList.toggle("active", active);
        body.classList.toggle("menu-open", active);
    }

    if (menuToggle && megaMenu) {
        menuToggle.addEventListener("click", function () {
            const isActive = megaMenu.classList.contains("active");
            toggleMenu(!isActive);
        });
    }

    if (megaMenuClose) {
        megaMenuClose.addEventListener("click", function () {
            toggleMenu(false);
        });
    }

    megaMenuLinks.forEach((link) => {
        // Only close menu if it's a direct link, not a dropdown toggle
        if (!link.classList.contains("mega-menu-dropdown-toggle")) {
            link.addEventListener("click", function () {
                toggleMenu(false);
            });
        }
    });

    // Mobile mega menu dropdown toggle
    const megaMenuDropdowns = document.querySelectorAll(
        ".mega-menu-dropdown-toggle"
    );
    megaMenuDropdowns.forEach((dropdown) => {
        dropdown.addEventListener("click", function (e) {
            e.stopPropagation(); // Prevent the menu from closing
            const parent = this.closest(".mega-menu-dropdown");
            parent.classList.toggle("active");
        });
    });

    // --- Theme Toggle ---
    const themeToggle = document.getElementById("theme-toggle");
    const savedTheme = localStorage.getItem("theme");

    function applyTheme(theme) {
        if (theme === "dark") {
            body.classList.add("dark");
            themeToggle.classList.add("dark");
        } else {
            body.classList.remove("dark");
            theme - toggle.classList.remove("dark");
        }
    }

    if (savedTheme) {
        applyTheme(savedTheme);
    }

    if (themeToggle) {
        themeToggle.addEventListener("click", () => {
            const isDark = body.classList.toggle("dark");
            themeToggle.classList.toggle("dark", isDark);
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }

    // --- Bootstrap Dropdown Initialization for Desktop ---
    try {
        var dropdownElementList = [].slice.call(
            document.querySelectorAll(".dropdown-toggle")
        );
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    } catch (e) {
        console.error("Bootstrap dropdown initialization error:", e);
    }
});
