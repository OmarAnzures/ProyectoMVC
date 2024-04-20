document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('nav a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            sections.forEach(section => {
                section.style.display = 'none';
            });

            targetSection.style.display = 'block';

            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            this.classList.add('active');
        });
    });
});
