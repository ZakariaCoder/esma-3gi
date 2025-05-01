document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Mobile menu toggle functionality
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
      });
    }
    
    // Set current year in footer
    const currentYearElement = document.getElementById('current-year');
    if (currentYearElement) {
      currentYearElement.textContent = new Date().getFullYear();
    }
    
    // Form submission handling
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;
        
        console.log('Form submitted:', { name, email, message });
        // Here you would typically send this data to your server
        
        alert('Merci pour votre message ! Nous vous contacterons bientôt.');
        contactForm.reset();
      });
    }
  });
