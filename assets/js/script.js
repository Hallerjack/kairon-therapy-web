document.addEventListener("DOMContentLoaded", function() {
    
    // Menú Hamburguesa para Móviles
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('nav-links');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    // Suavizar el scroll de navegación y cerrar menú en móvil al hacer clic
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            navLinks.classList.remove('active'); // Cierra el menú móvil

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            const navbarHeight = document.querySelector('nav').offsetHeight;
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - navbarHeight,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Control del fondo del header al hacer scroll
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.style.padding = "10px 24px";
            navbar.style.backgroundColor = "rgba(10, 23, 37, 0.98)";
            navbar.style.boxShadow = "0 4px 20px rgba(0,0,0,0.3)";
        } else {
            navbar.style.padding = "20px 24px";
            navbar.style.backgroundColor = "var(--bg-dark)";
            navbar.style.boxShadow = "none";
        }
    });
});