document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle) {
      menuToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
        
        // Change the menu icon to X when active
        const spans = menuToggle.querySelectorAll('span');
        spans.forEach(span => {
          span.classList.toggle('active');
        });
      });
    }
    
    // Handle contact form submission
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        
        // For now, just log the values (in a real app, you would send them to a server)
        console.log('Form submitted:', { name, email, subject, message });
        
        // Show success message
        alert('Merci pour votre message ! Nous vous contacterons bientôt.');
        
        // Reset form
        contactForm.reset();
      });
    }
    
    // Animate elements on scroll
    function animateOnScroll() {
      const animatedElements = document.querySelectorAll('.feature-card, .gallery-item, .mission-content');
      
      animatedElements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenHeight = window.innerHeight;
        
        if (elementPosition < screenHeight * 0.9) {
          element.classList.add('fade-in');
        }
      });
    }
    
    // Check for animations on page load and scroll
    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('load', animateOnScroll);
    
    // Smooth scroll for navigation links
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    
    smoothScrollLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');
        
        if (targetId !== '#') {
          e.preventDefault();
          
          const targetElement = document.querySelector(targetId);
          if (targetElement) {
            targetElement.scrollIntoView({
              behavior: 'smooth'
            });
          }
        }
      });
    });
  });