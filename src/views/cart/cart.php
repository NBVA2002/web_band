<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>giỏ hàng</h1>
    <?php foreach ($cart_list as $item) { ?>
        <div style="width: 100%;"> <?php print_r($item); ?> </div>
    <?php } ?>

    <form action="<?php echo _WEB_ROOT; ?>/cart/create" method="post">
        <button type="submit">Order</button>
    </form>
    <script>
    </script>
</body>

</html>