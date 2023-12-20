<?php
echo $err_name;
echo $err_phone;
echo $err_email;
echo $err_address;
echo $err_password;
echo $err_confirm_password;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/css/styles.css">
    <!-- <link rel="stylesheet" href="./asset/css/responsive.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <form id="register-form" method="post" action="<?php echo _WEB_ROOT;?>/register/authenticate" class="col-md-4 form-login">
                <div class="d-flex justify-content-center  mt-5">
                    <div class="form-title" style="font-size: 35px;font-weight: 500;color: #fff;">REGISTER</div>
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-user col-md-2 col-2"></i>
                    <input type="text" name="name" class="col-md-8 col-8" placeholder="Username">
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-phone col-md-2 col-2"></i>
                    <input type="number" name="phone" min="0" class="col-md-8 col-8" placeholder="Phone">
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-envelope col-md-2 col-2"></i>
                    <input type="email" name="email" class="col-md-8 col-8" placeholder="Email">
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-location-dot col-md-2 col-2"></i>
                    <input type="text" name="address" class="col-md-8 col-8" placeholder="Address">
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-lock col-2"></i>
                    <input id=password name="password" type="password" class="col-md-8 col-8" placeholder="Password">
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-lock col-2"></i>
                    <input id=confirm-password name="confirm_password" type="password" class="col-md-8 col-8" placeholder="Confirm password">
                </div>
                <div class="input-form" style="background-color: none">
                    <button type="submit" class="btn-login">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        function registerForm() {
            var form = document.getElementById("register-form").addEventListener("submit", function (event) {
                event.preventDefault();
            });
            var password = document.getElementById("password");
            var confirmPassword = document.getElementById("confirm-password");
            console.log(password.value)
        }
    </script>
</body>

</html>