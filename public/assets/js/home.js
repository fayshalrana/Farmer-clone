// Gsap Animation
{
    //document.querySelectorAll(".hero-bottom-area,.hero-inner-section,.shadow_img")
    document.querySelectorAll(".shadow_img").forEach((section) => {
      gsap.to(section, {
        y: -40, // Slight upward movement
        duration: 10,
        ease: "none",
        pause: true,
        scrollTrigger: {
          trigger: section,
          start: "top bottom", // when the top of section hits bottom of viewport
          end: "bottom top",   // when the bottom of section hits top of viewport
          scrub: true,         // Smooth transition with scroll
          onUpdate: (self) => {
            // Move up or down based on scroll direction
            gsap.to(section, { y: self.direction === 1 ? -40 : 40, overwrite: "auto" });
          }
        }
      });
    });

    // Hero Section Background Shape Animation
    const shapes = document.querySelectorAll('.bg-shape');
    const section = document.querySelector('.hero-section');

    function moveShape(shape) {
        const sectionWidth = section.clientWidth - 50;
        const sectionHeight = section.clientHeight - 50;
    
        gsap.to(shape, {
            duration: Math.random() * 20 + 3,
            x: Math.random() * sectionWidth,
            y: Math.random() * sectionHeight,
            ease: "power1.inOut",
            onComplete: () => moveShape(shape)
        });
    }

    shapes.forEach(moveShape);


    // Step Tab button background Animation
    document.addEventListener("DOMContentLoaded", function() {
        const tabButtons = document.querySelectorAll('.steps-nav-link');
        const background = document.querySelector('.step-tab-button-background');
        const activeButton = document.querySelector('.steps-nav-link.active');
    
        // Function to update the background position based on orientation
        function updateBackgroundPosition(button) {
            if (window.innerWidth <= 809) {
                // For vertical layout
                gsap.to(background, {
                    height: button.offsetHeight,
                    y: button.offsetTop,
                    x: 0,
                    width: "100%",
                    duration: 0.1,
                    ease: "power2.out"
                });
            } else {
                // For horizontal layout
                gsap.to(background, {
                    width: button.offsetWidth,
                    x: button.offsetLeft,
                    y: 0,
                    duration: 0.1,
                    ease: "power2.out"
                });
            }
        }
      
        // Initialize position of background based on active tab
        gsap.set(background, {
            width: window.innerWidth <= 809 ? "100%" : activeButton.offsetWidth,
            x: window.innerWidth <= 809 ? 0 : activeButton.offsetLeft,
            // height: window.innerWidth <= 809 ? activeButton.offsetHeight : "auto",
            y: window.innerWidth <= 809 ? activeButton.offsetTop : 0
        });
      
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                updateBackgroundPosition(button);
            });
        });
      
        // Update position on resize
        window.addEventListener('resize', () => {
            const activeButton = document.querySelector('.steps-nav-link.active');
            updateBackgroundPosition(activeButton);
        });
    });


    // Client Logo Animation

    // Animating the first list upwards
    gsap.to(".client-left-sec .firstcl", {
      y: -200, // Adjust based on how far up you want it to move
      duration: 3, // Duration for one loop
      ease: "none", // Ensures smooth, constant speed
      repeat: -1, // Infinite loop
      modifiers: {
        y: gsap.utils.unitize(y => parseFloat(y) % 200) // Ensures continuous looping
      }
    });

    // Animating the middle list downwards
    gsap.to(".client-left-sec .middlecl", {
      y: 200,
      duration: 3,
      ease: "none",
      repeat: -1,
      modifiers: {
        y: gsap.utils.unitize(y => parseFloat(y) % 200)
      }
    });

    // Animating the last list upwards
    gsap.to(".client-left-sec .lastcl", {
      y: -200,
      duration: 3,
      ease: "none",
      repeat: -1,
      modifiers: {
        y: gsap.utils.unitize(y => parseFloat(y) % 200)
      }
    });

    // Number Animation

    function animateNumber(targetNumber, element) {
      gsap.to({ number: 0 }, {
        number: targetNumber,
        duration: 2,
        onUpdate: function() {
          element.textContent = Math.floor(this.targets()[0].number);
        },
        ease: "power2.inOut",
        paused: true,
        scrollTrigger: {
          trigger: element,
          start: "top 90%",
          once: true
        }
      });
    }

    // Select all number elements
    const numberElements = document.querySelectorAll('.num-animation');

    // Iterate over each element and initialize the animation
    numberElements.forEach(element => {
      const targetNumber = parseInt(element.getAttribute('data-target'));
      animateNumber(targetNumber, element);
    });
}