<header class="header_container fade-animation-load-up-header">
    <div class="sticky_header">
        <nav class="navbar">
            <div class="logo">
                <a href="/ui/home">
                    <img src="https://raw.githubusercontent.com/fayshalrana/Farmer-clone/main/public/assets/img/logo.png"
                        alt="logo">
                    Chronify
                </a>

            </div>
            <nav class="menu_xl">
                <ul class="manus">
                    <li><a href="#">Features</a></li>
                    <li><a href="/ui/about">About</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="action_btn"><a href="#">Buy Template</a></div>
            </nav>

            <label class="toggle_button">
                <input type="checkbox">
                <div class="checkmark">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </label>
        </nav>
        <nav class="menu_sm">
            <ul>
                <li><a href="#">Features</a></li>
                <li><a href="/ui/about">About</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="action_btn">
                <a href="#">Buy Template</a>
            </div>
        </nav>
    </div>
</header>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector('.toggle_button input');
    const menuSm = document.querySelector('.menu_sm');
    const header = document.querySelector('.sticky_header');
    const menuLinks = document.querySelectorAll('.menu_sm ul li a'); // Select all links in menuSm

    function handleToggleButton() {
        if (toggleButton.checked) {
            menuSm.classList.add('active');
            header.style.marginTop = "-10px";
            header.style.marginLeft = "0px";
            header.style.marginRight = "0px";
            header.style.borderTopLeftRadius = "0";
            header.style.borderTopRightRadius = "0";
            header.style.boxShadow = "rgba(215, 216, 223, 0.16) 0px 2px 4px 0px";
        } else {
            header.style.marginTop = "32px";
            if (window.innerWidth < 1236) {
                header.style.marginLeft = "12px";
                header.style.marginRight = "12px"
            } else {
                header.style.marginLeft = "auto";
                header.style.marginRight = "auto"
            }
            header.style.boxShadow = "none";
            updateHeaderBorderRadius();
            menuSm.classList.remove('active');
        }
    }

    function updateHeaderBorderRadius() {
        if (window.scrollY === 0 && !toggleButton.checked) {
            header.style.marginTop = "0";
            header.style.borderTopLeftRadius = "0";
            header.style.borderTopRightRadius = "0";
        } else {
            if (window.innerWidth < 1236) {
                header.style.marginTop = "16px"; // Add margin-top when scrolled or toggle button is unchecked
            } else {
                header.style.marginTop = "32px"; // Add margin-top when scrolled or toggle button is unchecked
            }
            header.style.borderTopLeftRadius = "24px";
            header.style.borderTopRightRadius = "24px";
        }
    }

    if (window.innerWidth < 1236) {
        toggleButton.addEventListener('change', handleToggleButton);

        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                toggleButton.checked = false;
                menuSm.classList.remove('active');
                handleToggleButton(); // Reset the header style when a menu link is clicked
            });
        });
    }

    window.addEventListener('scroll', updateHeaderBorderRadius); // Ensure scroll event is added globally
    window.addEventListener('resize', function() {
        handleToggleButton();
    });
});
</script>