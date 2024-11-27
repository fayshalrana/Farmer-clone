@extends('ui.layouts.mainLayout')

@section('styles')
<style>

</style>
@endsection

@section('content')

<section class=" about-header-section">
    <div class="abt-inner-section">
        <div class="abt-area fade-animation-load-up">
            <h2 class="section-title text-white">About <span>our company.</span></h1>
                <p class="text-white">The best Framer template for just about everything.</p>
        </div>
        <div class="bg-shape"></div>
    </div>
    <div class="abt-outer-section">
        <div class="abt-outer-inner">
            <div class="abt_wrapper fade-animation-load-up">
                <div class="abt-left-section">
                    <div class="abt-img-sec">
                        <div class="abt-img"><img src="{{ env('BASE_IMAGE_URL') }}assets/img/new1.webp"></div>
                        <div class="abt-img"><img src="{{ env('BASE_IMAGE_URL') }}assets/img/new2.webp"></div>
                    </div>
                    <div class="abt-content-section">
                        <div class="abt-content-area">
                            <h2 class="section-title">Millions of <br>users <span>around <br>the world.</span></h2>
                            <p>At our core, we're driven by the mission to enhance productivity and empower individuals
                                to
                                seize control of their time. With an ever-growing community spanning the globe, our
                                productivity calendar app has touched the lives of millions. From freelancers to Fortune
                                500
                                companies, our user-centric approach and intuitive features have transformed the way
                                people
                                approach scheduling, planning, and collaboration.</p>
                        </div>
                        <div class="abt-counter-area">
                            <div class="abt-counter-box">
                                <div class="abt-counter" id="abt-counter1">148</div>
                                <p>Countries</p>
                            </div>
                            <div class="abt-counter-box">
                                <div class="abt-counter" id="abt-counter2">300</div>
                                <p>Team Members</p>
                            </div>
                            <div class="abt-counter-box">
                                <div class="abt-counter" id="abt-counter3">24 +</div>
                                <p>Years of Operation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="abt-right-section">
                    <div class="abtr-img">
                        <img src="{{ env('BASE_IMAGE_URL') }}assets/img/new4.jpg">
                    </div>
                    <div class="question">
                        <div class="question_info">
                            <div class="question_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" data-slot="icon"
                                    color="var(--token-b4bca847-68b6-472e-b536-157ec13a7cd1, rgb(251, 85, 47))"
                                    style="width: 100%; height: 100%;">
                                    <path
                                        d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="question_text">
                                <h3>Got feedback for us?</h3>
                                <p>We appreciate every bit of feedback to enhance our product.</p>
                            </div>
                        </div>
                        <div class="action_btn">
                            <a href="#">Get in touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="abt-video-section vid-scrubbing">
    <div class="abt-video-inner">
        <!-- Main Video (Hidden initially until play button is clicked) -->
        <video class="" id="mainVideo" src="https://framerusercontent.com/assets/hMT2frd9BRyaYkRJ13vFdbjQY.mp4" autoplay
            loop preload="auto" muted playsinline
            style="cursor:pointer; width:100%; height:100%; border-radius:0; display:block; object-fit:cover; background-color:rgba(0, 0, 0, 0); object-position:50% 50%;"></video>

        <!-- Play Button Overlay -->
        <button id="playButton" class="play-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" style="fill: white;">
                <path
                    d="M240,128a15.74,15.74,0,0,1-7.6,13.51L88.32,229.65a16,16,0,0,1-16.2.3A15.86,15.86,0,0,1,64,216.13V39.87a15.86,15.86,0,0,1,8.12-13.82,16,16,0,0,1,16.2.3L232.4,114.49A15.74,15.74,0,0,1,240,128Z">
                </path>
            </svg>
        </button>
    </div>

    <!-- Overlay Video Container -->
    <div id="videoOverlay" class="overlay">
        <div class="overlay-content">
            <video src="https://framerusercontent.com/assets/hMT2frd9BRyaYkRJ13vFdbjQY.mp4" autoplay controls loop muted
                playsinline style="width: 90%; height: auto; object-fit: contain;">
            </video>
        </div>
    </div>
</section>

<section class="abt-client-section">
    <h2 class="section-title">Meet our <span>partners.</span></h2>
    <div class="abt-client-carousel-inner" role="marquee">
        <div class="abt-client-carousel">
            <div class="abt-client-box">
                <img src="{{ env('BASE_IMAGE_URL') }}'assets/img/abtc-1.svg">
            </div>
            <div class="abt-client-box">
                <img src="{{ env('BASE_IMAGE_URL') }}assets/img/abtc-2.svg">
            </div>
            <div class="abt-client-box">
                <img src="{{ env('BASE_IMAGE_URL') }}assets/img/abtc-3.svg">
            </div>
            <div class="abt-client-box">
                <img src="{{ env('BASE_IMAGE_URL') }}assets/img/abtc-4.svg">
            </div>
            <div class="abt-client-box">
                <img src="{{ env('BASE_IMAGE_URL') }}assets/img/abtc-5.svg">
            </div>
            <div class="abt-client-box">
                <img src="{{ env('BASE_IMAGE_URL') }}assets/img/abtc-6.svg">
            </div>
        </div>
    </div>
</section>

<section class="abt-team-section fade-animation-load-up">
    <div class="abt-team-inner">
        <h2 class="section-title">Meet our <span>amazing team.</span></h2>
        <div class="abt-team">
            <div class="abt-team-box">
                <div class="abt-team-img">
                    <img src="{{ env('BASE_IMAGE_URL') }}assets/img/team-1.png">
                </div>
                <div class="abt-team-info">
                    <h4>Adam Wilson</h4>
                    <p>Lead Product Designer</p>
                </div>
            </div>
            <div class="abt-team-box">
                <div class="abt-team-img">
                    <img src="{{ env('BASE_IMAGE_URL') }}assets/img/team-2.png">
                </div>
                <div class="abt-team-info">
                    <h4>Matthew Thompson</h4>
                    <p>Chief Technical Officer</p>
                </div>
            </div>
            <div class="abt-team-box">
                <div class="abt-team-img">
                    <img src="{{ env('BASE_IMAGE_URL') }}assets/img/team-3.png">
                </div>
                <div class="abt-team-info">
                    <h4>Daniel Roberts</h4>
                    <p>Marketing Strategist</p>
                </div>
            </div>
            <div class="abt-team-box">
                <div class="abt-team-img">
                    <img src="{{ env('BASE_IMAGE_URL') }}assets/img/team-4.png">
                </div>
                <div class="abt-team-info">
                    <h4>James Lee</h4>
                    <p>Senior Software Engineer</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('ui.home.testimonial')
@include('ui.home.faq')

@endsection

@section('scripts')
<script src="https://fayshalrana.github.io/Farmer-clone/public/assets/js/about.js"></script>
@endsection