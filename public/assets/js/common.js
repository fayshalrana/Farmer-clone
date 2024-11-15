// Hero Section Animation
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
const smoother = ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1,
    speed: 1,
    effects: true,
    preventDefault: false,
    normalizeScroll: true,
});

//ScrollTrigger.create({
//  trigger: ".header_container",
//  start: "top 20px", 
//  endTrigger: ".main_container",
//  pin: true,
//  pinSpacing: '10px',
//});


document.addEventListener("DOMContentLoaded", function() {
    const header = document.querySelector(".sticky_header");

    ScrollTrigger.create({
        start: "top top", // Triggers at the very top of the viewport
        onUpdate: (self) => {
            if (self.direction === 1) {
                // Scrolling down
                header.classList.add("active");
            } else if (self.direction === -1 && self.progress === 0) {
                // Scrolling up, back to the very top
                header.classList.remove("active");
            }
        },
    });
});



// Select all sections onload - hero sections
gsap.utils.toArray('.fade-animation-load-up').forEach((section) => {
  gsap.to(section, {
    opacity: 1,
    y: 0, // move up from 50px
    duration: 1,
    delay: 0.4,
    ease: "power2.out",
    scrollTrigger: {
      trigger: '.hero-section',
      start: "top 50%", // adjust as needed
      end: "top 50%",
      toggleActions: "play none none none",
      once: true, // animation runs once per section
    },
  });
});

gsap.utils.toArray('.fade-animation-load-up-slow').forEach((section) => {
  gsap.to(section, {
    opacity: 1,
    y: 0, // move up from 50px
    duration: 1,
    delay: 0.8,
    ease: "power2.out",
    scrollTrigger: {
      trigger: '.hero-section',
      start: "top 50%", // adjust as needed
      end: "top 50%",
      toggleActions: "play none none none",
      once: true, // animation runs once per section
    },
  });
});

// Image Floatr
gsap.utils.toArray('.img-floatr').forEach((section) => {
  gsap.to(section, {
    y: '0',
    duration: 1,
    ease: "power2.inOut",
    scrollTrigger: {
      trigger: section,
      start: "top 60%", // Adjust as needed
      end: "top 30%",
      scrub: true,
      toggleActions: "play pause resume pause",
      // Ensure that the animation plays only once per scroll event
      onEnter: () => gsap.to(section, { y: '-20px', duration: 1, ease: "power2.inOut" }),
      onLeaveBack: () => gsap.to(section, { y: '-20px', duration: 1, ease: "power2.inOut" }),
    },
  });
});


gsap.utils.toArray('.fade-animation-load-up-header').forEach((section) => {
  gsap.to(section, {
    opacity: 1,
    y: 0, // move up from 50px
    duration: 1,
    delay: 0.4,
    ease: "power2.out",
    scrollTrigger: {
      trigger: section,
      start: "top 85%", // adjust as needed
      end: "top 50%",
      toggleActions: "play none none none",
      once: true, // animation runs once per section
    },
  });
});

// hero card scaling animation
gsap.utils.toArray('.scale-card-load').forEach((section) => {
  gsap.to(section, {
    opacity: 1,
    scale: 1,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: section,
      start: "top 85%", // adjust as needed
      end: "top 50%",
      toggleActions: "play none none none",
      once: true, // animation runs once per section
    },
  });
});


// Select all sections
gsap.utils.toArray('.fade-animation').forEach((section) => {
  gsap.from(section, {
    opacity: 0,
    y: 50, // move up from 50px
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: section,
      start: "top 85%", // adjust as needed
      end: "top 50%",
      toggleActions: "play none none none",
      once: true, // animation runs once per section
    },
  });
});

const sections = document.querySelectorAll(".fade-in-from-right");

// Loop through each section and create a scroll-triggered animation
sections.forEach(section => {
    gsap.to(section, {
        opacity: 1,
        x: 0,
        duration: 1,
        ease: "power2.out",
        scrollTrigger: {
            trigger: section,
            start: "top 80%", // Adjust as needed
            end: "top 50%",   // Adjust as needed
            toggleActions: "play none none none"
        }
    });
});


const sects = document.querySelectorAll('.fade-in-from-left');

// Animate each section on scroll
sects.forEach((section) => {
  gsap.to(section, {
    x: 0,               // Moves from 30px to the left
    opacity: 1,           // Starts at 0 opacity
    duration: 1,          // Duration of 1 second
    ease: "power2.out",   // Smooth easing
    scrollTrigger: {
      trigger: section,      // The element that triggers the animation
      start: "top 80%",   // When the top of the element hits 80% of the viewport height
      end: "top 50%",     // Adjust as needed
      toggleActions: "play none reverse none", // Play on enter, reverse on leave
      // markers: true, 
      once: true,     // Set to true to see the start and end markers (for debugging)
    }
  });
});

const fadedown = document.querySelectorAll('.fade-in-from-top');

fadedown.forEach((section) => {
    gsap.from(section, {
        y: -50,          // Move from above
        opacity: 0,       // Start invisible
        duration: 1,      // Animation duration
        scrollTrigger: {
            trigger: section,
            start: 'top 85%', // Trigger when the top of the section hits 75% of the viewport height
            toggleActions: 'play none none reverse', // Play on enter, reverse on leave
            once: true,
        },
    });
});
