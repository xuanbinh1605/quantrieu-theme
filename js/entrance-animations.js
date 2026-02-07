/**
 * Entrance Animations for Sections
 * Uses Intersection Observer API to trigger animations when elements come into view
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        rootMargin: '0px 0px -100px 0px', // Trigger 100px before element enters viewport
        threshold: 0.15, // Trigger when 15% of element is visible
        animationDelay: 100, // Delay between staggered animations (ms)
    };

    // Initialize animations when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimations);
    } else {
        initAnimations();
    }

    function initAnimations() {
        // Check if IntersectionObserver is supported
        if (!('IntersectionObserver' in window)) {
            // Fallback: just show all elements
            showAllElements();
            return;
        }

        // Create observer
        const observer = new IntersectionObserver(handleIntersection, {
            root: null,
            rootMargin: CONFIG.rootMargin,
            threshold: CONFIG.threshold
        });

        // Observe all elements with animation classes
        const animatedElements = document.querySelectorAll('[data-animate]');
        
        animatedElements.forEach((element, index) => {
            // Add initial hidden state
            element.style.opacity = '0';
            element.style.transform = getInitialTransform(element.dataset.animate);
            
            // Set staggered delay if within a group
            if (element.dataset.animateDelay) {
                element.style.transitionDelay = element.dataset.animateDelay + 'ms';
            } else if (element.closest('[data-animate-group]')) {
                const groupElements = Array.from(element.closest('[data-animate-group]').querySelectorAll('[data-animate]'));
                const elementIndex = groupElements.indexOf(element);
                element.style.transitionDelay = (elementIndex * CONFIG.animationDelay) + 'ms';
            }
            
            // Start observing
            observer.observe(element);
        });
    }

    function handleIntersection(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add animated class to trigger animation
                entry.target.classList.add('animated');
                
                // Stop observing this element
                observer.unobserve(entry.target);
            }
        });
    }

    function getInitialTransform(animationType) {
        switch(animationType) {
            case 'fade-up':
                return 'translateY(30px)';
            case 'fade-down':
                return 'translateY(-30px)';
            case 'fade-left':
                return 'translateX(30px)';
            case 'fade-right':
                return 'translateX(-30px)';
            case 'zoom-in':
                return 'scale(0.9)';
            case 'zoom-out':
                return 'scale(1.1)';
            case 'fade':
            default:
                return 'translateY(0)';
        }
    }

    function showAllElements() {
        // Fallback for browsers without IntersectionObserver
        const animatedElements = document.querySelectorAll('[data-animate]');
        animatedElements.forEach(element => {
            element.style.opacity = '1';
            element.style.transform = 'none';
        });
    }

})();
