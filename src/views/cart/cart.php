<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo _WEB_ROOT ?>/cart/fileupload" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <h1>giỏ hàng</h1>
    <?php foreach ($cart_list as $item) { ?>
        <div> <?php print_r($item); ?> </div>
    <?php } ?>

    <div>abscabscosbc</div>
        <img src="<?php echo _WEB_ROOT ?>/cart/readfile/user/143086968_2856368904622192_1959732218791162458_n.png" alt="">

    <form action="<?php echo _WEB_ROOT; ?>/cart/create" method="post">
        <input type="hidden" name="tour_id" value="<?php echo $_COOKIE['cart'][0]['tour_id'] ?>">
        <button type="submit">Order</button>
    </form>
    <script>
    </script>
</body>

</html>