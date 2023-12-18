<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo _WEB_ROOT?>/cart/file" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <h1>giỏ hàng</h1>
    <?php foreach ($cart_list as $item) { ?>
        <div> <?php print_r($item); ?> </div>
    <?php } ?>
    <form action="<?php echo _WEB_ROOT; ?>/cart/create" method="post">
        <input type="hidden" name="tour_id" value="<?php echo $_COOKIE['cart'][0]['tour_id'] ?>">
        <button type="submit">Order</button>
    </form>
        <div>abscabscosbc</div>

    <script>
    </script>
</body>

</html>