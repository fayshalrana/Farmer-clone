<?php
$plans = [
    [
        'title' => 'Basic',
        'price' => 'Free',
        'most_picked' => false,
        'features' => [
            'Unlimited Projects',
            'Share with 5 team members',
            'Sync across devices'
        ]
    ],
    [
        'title' => 'Premium',
        'monthly_price' => '$29.99',
        'yearly_price' => '$24.99', // Discounted yearly price
        'most_picked' => true,
        'features' => [
            'Everything in Basic Plan',
            'Unlimited team members',
            'Collaborative workspace',
            '30 Days Version History'
        ]
    ],
    [
        'title' => 'Team',
        'monthly_price' => '$49.99',
        'yearly_price' => '$39.99', // Discounted yearly price
        'most_picked' => false,
        'features' => [
            'Everything in Standard Plan',
            'Advanced Security',
            'User Provisioning (SCIM)',
            '3SAML SSO'
        ]
    ]
];

?>
<section class="get_started fade-animation">
    <div class="get_start_header">
        <h2>It’s easy to <span>get started.</span></h2>
        <p>Choose a plan tailored to your needs.</p>
    </div>
    <div class="pricing_body">
        <div class="control">
            <ul class="steps-tab" id="stepTabs" role="tablist">
                <div class="button-background"></div>
                <li class="nav-item" role="presentation">
                    <button class="s-nav-link active" id="year-tab" data-bs-toggle="pill" type="button">Yearly<span>Save
                            25%</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="s-nav-link" id="month-tab" data-bs-toggle="pill" type="button" role="tab"
                        aria-controls="Monthly" aria-selected="false">Monthly</button>
                </li>
            </ul>
        </div>
        <div class="pricing_cards">
            <?php foreach ($plans as $index => $plan) : ?>
            <div class="card">
                <div class="card_top <?php echo $index === 1 ? 'premium' : ''; ?>">
                    <h4><?php echo $plan['title']; ?></h4>
                    <div class="price_rang">
                        <div class="price">
                            <?php if ($index === 0): ?>
                            <h3 class="price-free show">Free</h3>
                            <?php else: ?>
                            <div class="multiPrice">
                                <h3 class="price-monthly"><?php echo $plan['monthly_price'] ?? 'Free'; ?></h3>
                                <h3 class="price-yearly show"><?php echo $plan['yearly_price'] ?? 'Free'; ?></h3>
                            </div>
                            <span>/ month</span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <?php if ($plan['most_picked']) : ?>
                    <div class="most_pick">
                        <p>Most picked</p>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="card_body">
                    <ul>
                        <?php foreach ($plan['features'] as $feature) : ?>
                        <li>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" color=" rgb(2, 7, 16)" style="width: 12px; height: 12px;">
                                    <path fill-rule="evenodd"
                                        d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p><?php echo $feature; ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="card_footer">
                    <div class="action_btn">
                        <a class="<?php echo $index !== 1 ? 'secondary' : ''; ?>" href="#">Get Started Free</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const yearlyTab = document.getElementById("year-tab");
    const monthlyTab = document.getElementById("month-tab");
    const background = document.querySelector('.button-background');
    const priceElements = document.querySelectorAll('.price');

    function updateBackgroundPosition(activeTab) {
        if (activeTab === yearlyTab) {
            background.style.left = "4px";
            background.style.width = "144px";
        } else if (activeTab === monthlyTab) {
            background.style.left = "149px";
            background.style.width = "143px";
        }
    }

    function togglePriceView(showYearly) {
        priceElements.forEach((price, index) => {
            if (index === 0) return; // Skip the Basic (Free) plan

            const monthlyPrice = price.querySelector('.price-monthly');
            const yearlyPrice = price.querySelector('.price-yearly');

            if (showYearly) {
                monthlyPrice.classList.remove('show');
                yearlyPrice.classList.add('show');
            } else {
                monthlyPrice.classList.add('show');
                yearlyPrice.classList.remove('show');
            }
        });
    }

    yearlyTab.addEventListener('click', function() {
        updateBackgroundPosition(yearlyTab);
        togglePriceView(true); // Show yearly prices
    });

    monthlyTab.addEventListener('click', function() {
        updateBackgroundPosition(monthlyTab);
        togglePriceView(false); // Show monthly prices
    });

    // Set initial state
    updateBackgroundPosition(yearlyTab); // Position background on yearly tab
    togglePriceView(true); // Show yearly prices initially
});
</script>