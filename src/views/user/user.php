<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="container-fluid d-flex" style="height: 100vh; padding: 0">
        <div class="col-md-3 menu-container">
            <div class="user-info d-flex flex-wrap justify-content-center">
                <img class="avatar-img" src="<?php echo _WEB_ROOT; ?>/user/readfile/<?php echo $user_context['img_url'] ?>" alt="">
                <div style="width: 100%; text-align: center;">Hello <?php echo $user_context['name'] ?></div>
            </div>
            <div class="menu-list">
                <div id="info" class="menu-item menu-item-active" onclick="changeContent(1)"><i class="fa-solid fa-user"></i>&nbsp; USER INFOMATION</div>
                <div id="order" class="menu-item" onclick="changeContent(2)"><i class="fa-solid fa-cart-shopping"></i>&nbsp; USER ORDER</div>
                <form class="menu-item" action="<?php echo _WEB_ROOT; ?>/user/logout" method="post">
                    <button type="submit" name="runLink"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp; LOGOUT</button>
                </form>
            </div>
        </div>
        <div class="col-md-9 col-12 content-container" id="content-container">
            <div id="info-content">USER INFOMATION</div>
            <div id="order-content">USER ORDER</div>
        </div>
    </div>

    <script>
        function changeContent(idContent) {
            var content = document.getElementById("content-container")
            var info = document.getElementById("info");
            var order = document.getElementById("order");
            var infoContent = document.getElementById("info-content");
            var orderContent = document.getElementById("order-content");
            if (idContent == 1) {
                infoContent.style.display = "block"
                orderContent.style.display = "none"
                info.classList.add('menu-item-active');
                order.classList.remove('menu-item-active');
            } else if (idContent == 2) {
                infoContent.style.display = "none"
                orderContent.style.display = "block"
                info.classList.remove('menu-item-active');
                order.classList.add('menu-item-active');
            }
        }
    </script>

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