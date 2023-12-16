<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/css/styles.css">
    <!-- <link rel="stylesheet" href="./asset/css/responsive.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <form id="login-form" class="col-md-4 form-login">
                <div class="d-flex justify-content-center  mt-5 mb-5">
                    <img src="<?php echo _WEB_ROOT; ?>/public/assets/img/item/143086968_2856368904622192_1959732218791162458_n.png" class="user-img" alt="">
                </div>
                <!-- <div class="form-title">LOGIN</div> -->
                <div class="input-form">
                    <i class="fa-solid fa-user col-md-2 col-2"></i>
                    <input id="email" type="email" class="col-md-8 col-8" placeholder="Email">
                </div>
                <div class="input-form">
                    <i class="fa-solid fa-lock col-md-2  col-2"></i>
                    <input id="password" type="password" class="col-md-8  col-8" placeholder="Password">
                    <!-- <i cl ass="fa-solid fa-eye"></i> -->
                    <!-- <i class="fa-solid fa-eye-slash"></i> -->
                </div>
                <div class="form-title" style="text-align: end;">
                    <a style=" color: #ccc;" href="">Forgot password</a>
                </div>
                <div class="input-form" style="background-color: none">
                    <button type="submit" onclick="submitForm()" class="btn-login">Login</button>
                </div>
                <div class="form-title" style="text-align: center; color: #ccc;">
                    Don't have account &nbsp;
                    <a href="register.php">Create new</a>
                </div>
                <div id="err">
                    <?php
                    if ($err_email != '' || $err_password != '') {
                    ?>
                        <div class="alert alert-danger form-title" role="alert">
                            <?php echo $err_email . $err_password
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <!-- <script src="main.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        var err_alert = document.getElementById("err");
        setTimeout(function() {
            while (err_alert.firstChild) {
                err_alert.removeChild(err_alert.firstChild);
            }
        }, 3000);

        function submitForm() {
            var form = document.getElementById("login-form").addEventListener("submit", function(event) {
                event.preventDefault();
            });
            var email = document.getElementById("email")
            var password = document.getElementById("password")
            var err_alert = document.getElementById("err");

            var err = [];
            if (email.value == "") {
                err[0] = "Email is required";
                var err_email = document.createElement('div');
                err_email.classList.add("alert");
                err_email.classList.add("alert-danger");
                err_email.classList.add("form-title");
                const textnode = document.createTextNode(err[0]);
                err_email.appendChild(textnode);
                err_alert.appendChild(err_email);
            }
            if (password.value == "") {
                err[1] = "Password is required";
                var err_password = document.createElement('div');
                err_password.classList.add("alert");
                err_password.classList.add("alert-danger");
                err_password.classList.add("form-title");
                const textnode = document.createTextNode(err[1]);
                err_password.appendChild(textnode);
                document.getElementById("err").appendChild(err_password);
            }
            setTimeout(function() {
                while (err_alert.firstChild) {
                    err_alert.removeChild(err_alert.firstChild);
                }
            }, 3000);
            console.log(err)

            if (err.length == 0) {
                window.location.href = "<?php echo _WEB_ROOT; ?>/login/authenticate/" + email.value + "/" + password.value
            }
        }
    </script>

</body>

</html>