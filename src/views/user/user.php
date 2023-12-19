<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/src/views/user/style.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div id="main">
        <div id="header">
            <!-- begin nav -->
            <ul id="nav">
                <li><a href="#">Home</a></li>
                <li><a href="#band">Band</a></li>
                <li><a href="#tour">Tour</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <a href="#">
                        More
                        <i class="nav-icon ti-angle-down"></i>
                    </a>
                    <ul class="subnav">
                        <li><a href="#">Merchandise</a></li>
                        <li><a href="#">Extras</a></li>
                        <li><a href="#">Media</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end nav -->

            <!-- mobile button -->
            <div id="mobile-menu" class="mobile-menu-btn">
                <i class="menu-icon ti-menu"></i>
            </div>

            <!-- search button -->
            <div class="search-btn">
                <div class="search-icon ti-search"></div>
            </div>
            <div class="search-btn">
                <i class="fa-solid fa-user search-icon" style="color:#fff"></i>
            </div>
        </div>
    </div>

    <div class="container d-flex" style="height: 100vh; background-color: red;">
        <div class="col-md-3 menu-container">

        </div>
        <div class="col-md-9 col-12 content-container" >
            
        </div>
    </div>

    <script>
        var header = document.getElementById('header');
        var mobileMenu = document.getElementById('mobile-menu');
        var headerHight = header.clientHeight;

        // Đóng/mở menu
        mobileMenu.onclick = function() {
            var isclose = header.clientHeight === headerHight;

            if (isclose) {
                header.style.height = 'auto';
            } else {
                header.style.height = null;
            }
        }

        // tự động đóng khi chon menu
        var menuItems = document.querySelectorAll('#nav li a[href*="#"]');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];

            menuItem.onclick = function(event) {
                var isparentMenu = this.nextElementSibling && this.nextElementSibling.classList.contains('subnav');
                if (!isparentMenu) {
                    header.style.height = null;
                } else {
                    event.preventDefault();
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>