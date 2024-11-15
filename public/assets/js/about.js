// Hero Section Background Shape Animation
{
    const shapes = document.querySelectorAll('.bg-shape');
    const section = document.querySelector('.abt-inner-section');
    
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

}

// Animation on Data Numbers
{
    
    function animateCounter(id, targetNumber, symbol = "") {
        gsap.fromTo(
            `#${id}`, {
                innerHTML: 0
            }, {
                innerHTML: targetNumber,
                duration: 3, // Adjust duration as needed
                scrollTrigger: {
                    trigger: `#${id}`,
                    start: "top 80%", // Start when 80% of the element is in view
                    toggleActions: "play none none none",
                },
                snap: {
                    innerHTML: 1
                }, // Snap values to whole numbers
                onUpdate: function() {
                    document.getElementById(id).innerHTML = Math.floor(this.targets()[0].innerHTML) + symbol;
                },
            }
        );
    }
    
    // Animate each counter with different target numbers
    animateCounter("abt-counter1", 148, "");
    animateCounter("abt-counter2", 300, "+");
    animateCounter("abt-counter3", 24, "+");
}

// Animation on Video Platform section
{
    const mainVideo = document.getElementById('mainVideo');
    const videoOverlay = document.getElementById('videoOverlay');

    // Show overlay and prevent scroll
    mainVideo.addEventListener('click', () => {
        videoOverlay.style.display = 'flex';
        document.body.classList.add('no-scroll'); // Disable scroll
    });

    // Close overlay and restore scroll when clicking outside the video in overlay
    videoOverlay.addEventListener('click', (event) => {
        if (event.target === videoOverlay) {
            videoOverlay.style.display = 'none';
            document.body.classList.remove('no-scroll'); // Enable scroll
        }
    });

    //************** Animation on play btn controls */
    const innerSection = document.querySelector('.abt-video-inner');
    const playButton = document.querySelector('.play-btn');

    // Position the button near the mouse on mouseenter
    innerSection.addEventListener('mouseenter', (e) => {
        const rect = innerSection.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;

        // Position button slightly offset from cursor when entering
        gsap.to(playButton, {
            x: mouseX - playButton.offsetWidth / 2 - 20, // offset slightly left
            y: mouseY - playButton.offsetHeight / 2 - 20, // offset slightly above
            duration: 0.3,
            ease: "power2.out"
        });
    });

    // Slightly follow the cursor as it moves within the section
    innerSection.addEventListener('mousemove', (e) => {
        const rect = innerSection.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;

        // Use GSAP to animate the play button to follow the cursor
        gsap.to(playButton, {
            x: mouseX - playButton.offsetWidth / 2 - 10, // slight offset
            y: mouseY - playButton.offsetHeight / 2 - 10, // slight offset
            duration: 0.2,
            ease: "power1.out"
        });
    });


    //********************** Video gsap on scrub scrolling */
    gsap.utils.toArray('.vid-scrubbing').forEach((section) => {
      gsap.fromTo(section,
        {
            y: '-158px',
            scale: 0.6
        },
       {
        y: '0px',
        scale: 1,
        scrollTrigger: {
          trigger: section,
          start: "top 70%", // Adjust as needed
          end: "bottom 15%",
          scrub: 3,
          //markers: true,
          toggleActions: "play pause resume pause",
        },
      });
    });
}

//Logo Infinite Scroll Animation
{
    const wrapper = document.querySelector(".abt-client-carousel"); 

    // Create array of elements to tween on
    const boxes = gsap.utils.toArray(".abt-client-box");

    // Setup the tween
    const loop = horizontalLoop(boxes, {
      paused: true, // Sets the tween to be paused initially
      repeat: -1, // Makes sure the tween runs infinitely
      spacing: 10
    });

    // Start the tween
    loop.play() // Call to start playing the tween

    // -------------------------------------------------------------------------------------------------------------------------------------

    /*
    This helper function makes a group of elements animate along the x-axis in a seamless, responsive loop.

    Features:
     - Uses xPercent so that even if the widths change (like if the window gets resized), it should still work in most cases.
     - When each item animates to the left or right enough, it will loop back to the other side
     - Optionally pass in a config object with values like "speed" (default: 1, which travels at roughly 100 pixels per second), paused (boolean),  repeat, reversed, and paddingRight.
     - The returned timeline will have the following methods added to it:
       - next() - animates to the next element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
       - previous() - animates to the previous element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
       - toIndex() - pass in a zero-based index value of the element that it should animate to, and optionally pass in a vars object to control duration, easing, etc. Always goes in the shortest direction
       - current() - returns the current index (if an animation is in-progress, it reflects the final index)
       - times - an Array of the times on the timeline where each element hits the "starting" spot. There's also a label added accordingly, so "label1" is when the 2nd element reaches the start.
     */
    function horizontalLoop(items, config) {
      items = gsap.utils.toArray(items);
      config = config || {};
      let tl = gsap.timeline({repeat: config.repeat, paused: config.paused, defaults: {ease: "none"}, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)}),
        length = items.length,
        startX = items[0].offsetLeft,
        times = [],
        widths = [],
        xPercents = [],
        curIndex = 0,
        pixelsPerSecond = (config.speed || 1) * 100,
        spacing = config.spacing || 0,
        snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1), // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
        totalWidth, curX, distanceToStart, distanceToLoop, item, i;
      gsap.set(items, { // convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
        xPercent: (i, el) => {
          let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
          xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
          return xPercents[i];
        }
      });
      gsap.set(items, {x: 0});
      totalWidth = items[length-1].offsetLeft + xPercents[length-1] / 100 * widths[length-1] - startX + items[length-1].offsetWidth * gsap.getProperty(items[length-1], "scaleX") + (parseFloat(config.paddingRight) || 0)+ 
                   (spacing * (length - 1));
      for (i = 0; i < length; i++) {
        item = items[i];
        curX = xPercents[i] / 100 * widths[i];
        distanceToStart = item.offsetLeft + curX - startX;
        distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX") + spacing;;
        tl.to(item, {xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
          .fromTo(item, {xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)}, {xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
          .add("label" + i, distanceToStart / pixelsPerSecond);
        times[i] = distanceToStart / pixelsPerSecond;
      }
      function toIndex(index, vars) {
        vars = vars || {};
        (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length); // always go in the shortest direction
        let newIndex = gsap.utils.wrap(0, length, index),
          time = times[newIndex];
        if (time > tl.time() !== index > curIndex) { // if we're wrapping the timeline's playhead, make the proper adjustments
          vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
          time += tl.duration() * (index > curIndex ? 1 : -1);
        }
        curIndex = newIndex;
        vars.overwrite = true;
        return tl.tweenTo(time, vars);
      }
      tl.next = vars => toIndex(curIndex+1, vars);
      tl.previous = vars => toIndex(curIndex-1, vars);
      tl.current = () => curIndex;
      tl.toIndex = (index, vars) => toIndex(index, vars);
      tl.times = times;
      tl.progress(1, true).progress(0, true); // pre-render for performance
      if (config.reversed) {
        tl.vars.onReverseComplete();
        tl.reverse();
      }
      return tl;
    }
}
