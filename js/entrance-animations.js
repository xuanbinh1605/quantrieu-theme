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
            // Set staggered delay if within a group
            if (element.dataset.animateDelay) {
                element.style.transitionDelay = element.dataset.animateDelay + 'ms';
            } else if (element.closest('[data-animate-group]')) {
                const groupElements = Array.from(element.closest('[data-animate-group]').querySelectorAll('[data-animate]'));
                const elementIndex = groupElements.indexOf(element);
                element.style.transitionDelay = (elementIndex * CONFIG.animationDelay) + 'ms';
            }
            
            // Check if element is already in viewport (for elements visible on page load)
            if (isElementInViewport(element)) {
                // Animate after a short delay to allow CSS transition to be ready
                setTimeout(() => {
                    element.classList.add('animated');
                }, 50);
            } else {
                // Start observing for elements not yet in viewport
                observer.observe(element);
            }
        });
    }

    function isElementInViewport(element) {
        const rect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        
        // Check if any part of the element is in the viewport
        return (
            rect.top < windowHeight &&
            rect.bottom > 0
        );
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

    function showAllElements() {
        // Fallback for browsers without IntersectionObserver
        const animatedElements = document.querySelectorAll('[data-animate]');
        animatedElements.forEach(element => {
            element.classList.add('animated');
        });
    }

})();
