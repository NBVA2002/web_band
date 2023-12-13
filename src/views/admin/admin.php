<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= _WEB_ROOT ?>/public/assets/css/admin.css">
    <script src="https://kit.fontawesome.com/4afa83a413.js" crossorigin="anonymous"></script>


    <title>Trang quản lý</title>
</head>

<body>
    <center>
        <table class="top">
            <tbody>
                <tr>
                    <td width="46%" align="left" class="text">TRANG QUẢN LÝ THE BAND</td>
                    <td width="54%" align="right">
                        <div id="timer">0:05:09</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
    <div class="container">
        <div class="sidebar">
            <nav class="menu">
                <div class="navbar">
                    <a href="<?= _WEB_ROOT ?>/user" id="user-bar" class="nav-link nav-item">Quản lý người dùng</a>
                    <a href="<?= _WEB_ROOT ?>/src/views/admin/ticket.php" id="user-bar" class="nav-link nav-item">Quản lý vé</a>
                    <a href="<?= _WEB_ROOT ?>/src/views/admin/order.php" id="user-bar" class="nav-link nav-item">Quản lý đơn hàng</a>
                </div>
            </nav>
        </div>
        <form name="userman" method="POST">
            <main id="content" class="content">
            </main>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/js/admin.js"></script>
    <script>
        $(document).ready(function() {
            $("a.nav-link").click(function(e) {
                e.preventDefault()
                var url = $(this).attr('href');
                // url = window.history.pushState('user','Title',<?= _WEB_ROOT ?>/user);
                // const nextURL = '<?= _WEB_ROOT ?>/user';
                // const nextTitle = 'My new page title';
                // const nextState = {
                //     additionalInformation: 'Updated the URL with JS'
                // };

                // // This will create a new entry in the browser's history, without reloading
                // window.history.pushState(nextState, nextTitle, nextURL);

                // // This will replace the current entry in the browser's history, without reloading
                // window.history.replaceState(nextState, nextTitle, nextURL);
                $('main#content').load(url);
                return false;
            });
        });
    </script>
</body>

</html>