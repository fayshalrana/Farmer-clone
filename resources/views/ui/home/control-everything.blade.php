@php
$buttonContent = [
[
'title' => 'Effortless Actions, Lightning-Fast',
'description' => 'Make anything in a snap with our command bar—dates, times, labels, and priority, done in a flash!',
'img' => ' <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
    aria-hidden="true" data-slot="icon" color="rgb(122, 128, 137)" style="width: 24px; height: 24px;">
    <path fill-rule="evenodd"
        d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z"
        clip-rule="evenodd"></path>
</svg>',
],
[
'title' => 'Spotify Groove Sharing',
'description' => "Get in sync with your team's music taste! See what they're currently jamming to on Spotify.",
'img' => '<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
    aria-hidden="true" data-slot="icon" color="var(--token-d3965f8d-ed09-4f81-a06d-765b94d820c1, rgb(122, 128, 137))"
    style="width: 24px; height: 24px;">
    <path fill-rule="evenodd"
        d="M19.952 1.651a.75.75 0 0 1 .298.599V16.303a3 3 0 0 1-2.176 2.884l-1.32.377a2.553 2.553 0 1 1-1.403-4.909l2.311-.66a1.5 1.5 0 0 0 1.088-1.442V6.994l-9 2.572v9.737a3 3 0 0 1-2.176 2.884l-1.32.377a2.553 2.553 0 1 1-1.402-4.909l2.31-.66a1.5 1.5 0 0 0 1.088-1.442V5.25a.75.75 0 0 1 .544-.721l10.5-3a.75.75 0 0 1 .658.122Z"
        clip-rule="evenodd"></path>
</svg>',
],
[
'title' => 'Share Availability',
'description' => 'Share your schedule effortlessly! No more email ping-pong or calendar tab switching.',
'img' => '<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
    aria-hidden="true" data-slot="icon" color="var(--token-f953d81a-fa9c-47fd-bf74-f612b36c2ec6, rgb(122, 128, 137))"
    style="width: 24px; height: 24px;">
    <path fill-rule="evenodd"
        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
        clip-rule="evenodd"></path>
</svg>',
]
];
@endphp

<section class="control_everything">
    <div class="control_main">
        <div class="control_text">
            <div class="section_title fade-animation">
                <h2>Control everything
                    <span>in the moment.</span>
                </h2>
            </div>
            <div class="control_items fade-animation">
                <div class="control_line"><span></span></div>
                <div class="control_buttons">
                    @foreach ($buttonContent as $index => $content)
                    <button class="control_item" id="button{{ $index }}">
                        <div class="item_logo">
                            <svg class="circle-border" width="50" height="50" viewBox="0 0 50 50">
                                <circle cx="25" cy="25" r="22" stroke="red" stroke-width="2" fill="none"></circle>
                            </svg>
                            {!! $content['img'] !!}
                        </div>
                        <div class="item_text">
                            <h4>{{ $content['title'] }}</h4>
                            <p>{{ $content['description'] }}</p>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="control_img fade-animation">
            <div class="img_box">
                <img src="{{ URL::asset('assets/img/control_one.svg') }}" alt="control-one-image">
            </div>
            <div class="img_box">
                <img src="{{ URL::asset('assets/img/control_two.svg') }}" alt="control-one-image">
            </div>
            <div class="img_box">
                <img src="{{ URL::asset('assets/img/control_three.svg') }}" alt="control-one-image">
            </div>


        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function() {
    let currentIndex = 0;
    const buttons = document.querySelectorAll('.control_item');
    const controlLine = document.querySelector('.control_line');
    const buttonIcons = document.querySelectorAll('.item_logo');
    const images = document.querySelectorAll('.control_img .img_box');
    const controlImgContainer = document.querySelector('.control_img');
    let interval; // To hold the interval reference
    // Set the initial display state for images
    images.forEach((image, index) => {
        image.style.display = index === 0 ? 'block' : 'none'; // Only image[0] is visible
    });

    function activateButton() {
        // Remove "active" class from all buttons
        buttons.forEach(button => button.classList.remove('active'));

        // Add "active" class to the current button
        buttons[currentIndex].classList.add('active');

        // Remove previous active classes from controlLine
        controlLine.classList.remove('active-one', 'active-two', 'active-three');
        buttonIcons.forEach(icon => icon.classList.remove('active-one', 'active-two', 'active-three'));

        // Add specific class to controlLine based on currentIndex
        if (currentIndex === 0) {
            controlLine.classList.add('active-one');
            buttonIcons[currentIndex].classList.add('active-one');
        } else if (currentIndex === 1) {
            controlLine.classList.add('active-two');
            buttonIcons[currentIndex].classList.add('active-two');
        } else {
            controlLine.classList.add('active-three');
            buttonIcons[currentIndex].classList.add('active-three');
        }
        // Set the background color of controlImgContainer based on currentIndex
        if (currentIndex === 0) {
            controlImgContainer.style.backgroundColor = '#fef9f8';
        } else if (currentIndex === 1) {
            controlImgContainer.style.backgroundColor = '#f7fdf9';
        } else if (currentIndex === 2) {
            controlImgContainer.style.backgroundColor = '#fcf8ff';
        }
        // Show only the image matching the currentIndex
        images.forEach((image, index) => {
            image.style.display = index === currentIndex ? 'block' : 'none';
        });

        // Move to the next button, reset if it's the last one
        currentIndex = (currentIndex + 1) % buttons.length;
    }

    // Set the first button and image as active on page load
    activateButton();

    // Run the function every 3 seconds
    interval = setInterval(activateButton, 3000);

    // Add click event listeners to each button
    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            // Immediately activate the clicked button
            currentIndex = index;
            activateButton();

            // Clear the existing interval and set a new one for the next button
            clearInterval(interval);
            interval = setInterval(activateButton, 3000);
        });
    });
});
</script>