@php
$newsItems = [
[
'image' => 'assets/img/new1.webp',
'category' => 'Data Insights',
'title' => 'Unleash the Power of Advanced Analytics',
'readTime' => '4 min read',
'link' => '#'
],
[
'image' => 'assets/img/new2.webp',
'category' => 'Market Trends',
'title' => 'Exploring Emerging Technologies in 2024',
'readTime' => '5 min read',
'link' => '#'
],
[
'image' => 'assets/img/new3.webp',
'category' => 'Industry News',
'title' => 'Top Predictions for AI Development',
'readTime' => '3 min read',
'link' => '#'
]
];
@endphp

<section class="latest_news">
    <div class="section_title fade-animation">
        <h2>Discover the <span>latest news.</span></h2>
        <p>Stay informed and inspired with valuable insights for business growth.</p>
    </div>
    <div class="latest_news_main">
        @foreach ($newsItems as $news)
        <a href="{{ $news['link'] }}">
            <div class="news_item">
                <div class="news_img">
                    <img src="{{ secure_asset($news['image']) }}" alt="logo">
                </div>
                <div class="news_info">
                    <h4>{{ $news['category'] }}</h4>
                    <h3>{{ $news['title'] }}</h3>
                    <div class="info_footer">
                        <div class="left">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" focusable="false"
                                style="width: 16px; height: 16px; fill: rgb(122, 128, 137);">
                                <g weight="regular">
                                    <path
                                        d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z">
                                    </path>
                                </g>
                            </svg>
                            <p>{{ $news['readTime'] }}</p>
                        </div>
                        <div class="right">
                            <button>Read
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" focusable="false"
                                    style="width: 20px; height: 20px;">
                                    <g weight="regular">
                                        <path
                                            d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z">
                                        </path>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>