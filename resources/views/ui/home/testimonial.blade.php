<?php
// Array containing client data
$clients = [
    [
        'image' => 'assets/img/client1.webp',
        'review' => 'The meeting attendance tracking feature is a game-changer for our sales team. It keeps us on track and accountable.',
        'name' => 'Emily Wilson',
        'position' => 'CEO',
        'brand' => 'assets/img/brand1.svg'
    ],
    [
        'image' => 'assets/img/client2.webp',
        'review' => 'This tool has significantly improved our project workflow and team productivity.',
        'name' => 'John Doe',
        'position' => 'Project Manager',
         'brand' => 'assets/img/brand2.svg'
    ],
    [
        'image' => 'assets/img/client3.webp',
        'review' => 'A highly recommended tool for tracking client interactions and project timelines.',
        'name' => 'Sarah Taylor',
        'position' => 'Sales Lead',
         'brand' => 'assets/img/brand3.svg'
    ],
    [
        'image' => 'assets/img/client4.webp',
        'review' => 'Helps us stay organized and achieve our sales targets more efficiently.',
        'name' => 'Michael Brown',
        'position' => 'Sales Director',
         'brand' => 'assets/img/brand4.webp'
    ]
];
?>

<section class="testimonial">
    <div class="testimonial_header fade-animation">
        <h2>Kind words from our
            <span>customers.</span>
        </h2>
    </div>
    <div class="testimonial_items fade-animation">
        <ul>
            <?php foreach ($clients as $client) : ?>
            <li class="item">
                <div class="client_img">
                    <img src="{{ secure_asset($client['image']) }}" alt="logo">
                </div>
                <div class="item_text">
                    <div class="client_info">
                        <div class="stars">
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                            <div class="star">
                                <svg height="12px" width="12px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94"
                                    xml:space="preserve">
                                    <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                                            c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                                            c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                                            c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                                            c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                                            C22.602,0.567,25.338,0.567,26.285,2.486z" />
                                </svg>
                            </div>
                            <?php endfor; ?>
                        </div>
                        <h4>"<?php echo $client['review']; ?>"</h4>
                    </div>
                    <div class="client_info_footer">
                        <div class="client_logo">
                            <img src="{{ secure_asset($client['brand']) }}" alt="logo">
                        </div>
                        <div class="client_name">
                            <h3><?php echo $client['name']; ?></h3>
                            <p><?php echo $client['position']; ?></p>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const items = document.querySelectorAll('.item');
    const itemsContainer = document.querySelector('.testimonial_items ul');

    // Get the width of a single item plus margin
    const itemWidth = items[0].offsetWidth + 20; // Adjust for margin
    const totalWidth = itemWidth * items.length; // Total width of items

    // Clone the items to create a seamless effect
    const clonedItems = itemsContainer.innerHTML; // Get the initial HTML
    itemsContainer.innerHTML += clonedItems; // Duplicate the items in the container

    // Set the total width of the items container
    itemsContainer.style.width = `${totalWidth * 2}px`; // Double the width for the clone
    itemsContainer.style.display = 'flex'; // Ensure it stays flex

    // Set initial position and scroll speed
    let currentPosition = 0; // Start from left 0
    let scrollSpeed = 2; // Base scroll speed
    let hoverSpeed = scrollSpeed / 2; // Speed when hovering (half of normal speed)
    let currentSpeed = scrollSpeed; // Variable to hold current speed
    let animationId = null; // Store the animation ID

    itemsContainer.style.transform = `translateX(${currentPosition}px)`; // Set initial position

    // Event listeners to control speed on hover
    itemsContainer.addEventListener('mouseenter', function() {
        currentSpeed = hoverSpeed; // Reduce speed by half on hover
    });

    itemsContainer.addEventListener('mouseleave', function() {
        currentSpeed = scrollSpeed; // Return to normal speed
    });

    function animateMarquee() {
        currentPosition -= currentSpeed; // Move left by currentSpeed
        itemsContainer.style.transform = `translateX(${currentPosition}px)`;

        // Check if the first item has fully moved out of view
        if (Math.abs(currentPosition) >= totalWidth) {
            // Reset the position to the beginning
            currentPosition = 0;
        }

        animationId = requestAnimationFrame(animateMarquee); // Continue the animation
    }

    function startMarquee() {
        if (animationId) cancelAnimationFrame(animationId); // Stop any ongoing animation
        currentPosition = 0; // Reset position
        // if (window.innerWidth > 809) {} // Start the animation if screen width is > 809px
        animateMarquee();
    }

    // Start the marquee initially if on desktop
    startMarquee();

    // Restart animation on window resize
    window.addEventListener('resize', startMarquee);
});
</script>