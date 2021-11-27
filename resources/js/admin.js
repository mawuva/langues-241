require('admin-lte');

// Switch theme

var switcher = document.querySelector('.switch-theme');
var currentTheme = localStorage.getItem('theme');
var mainHeader = document.querySelector('.main-header');

if (currentTheme) {
    if (currentTheme === 'dark') {
        if (!document.body.classList.contains('dark-mode')) {
            document.body.classList.add("dark-mode");
        }

        if (mainHeader.classList.contains('navbar-light')) {
            mainHeader.classList.add('navbar-dark');
            mainHeader.classList.remove('navbar-light');
        }

        if (switcher.classList.contains('fa-moon')) {
            switcher.classList.remove('fa-moon');
            switcher.classList.add('fa-sun');
        }
    }
}

function switchTheme(e) {
    if (switcher.classList.contains('fa-moon')) {
        if (!document.body.classList.contains('dark-mode')) {
            document.body.classList.add("dark-mode");
        }

        if (mainHeader.classList.contains('navbar-light')) {
            mainHeader.classList.add('navbar-dark');
            mainHeader.classList.remove('navbar-light');
        }

        localStorage.setItem('theme', 'dark');

        if (switcher.classList.contains('fa-moon')) {
            switcher.classList.remove('fa-moon');
            switcher.classList.add('fa-sun');
        }
    }

    else {
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.remove("dark-mode");
        }

        if (mainHeader.classList.contains('navbar-dark')) {
            mainHeader.classList.add('navbar-light');
            mainHeader.classList.remove('navbar-dark');
        }

        if (switcher.classList.contains('fa-sun')) {
            switcher.classList.remove('fa-sun');
            switcher.classList.add('fa-moon');
        }

        localStorage.setItem('theme', 'light');
    }
}

switcher.addEventListener('click', switchTheme, false);