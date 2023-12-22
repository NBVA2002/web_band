<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vé Ca Nhạc</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Custom styles go here */
        .event-details {
            padding: 20px;
        }

        .event-image {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <!-- Bên trái: Ảnh của nơi diễn ra -->
            <div class="col-md-6">
                <img src="<?php echo _WEB_ROOT . "/tour/readfile/" . $tour_detail['img_url'] ?>" alt="Nơi diễn ra" class="event-image">
            </div>

            <!-- Bên phải: Thông tin vé -->
            <div class="col-md-6">
                <form class="event-details" method="post" action="<?php echo _WEB_ROOT ."/tour/addCart"?>">
                    <h2><?php echo $tour_detail['address'] ?></h2>
                    <p><?php echo $tour_detail['date'] ?></p>
                    <p><?php echo $tour_detail['description'] ?></p>

                    <!-- Nút tăng giảm số lượng vé -->
                    <div class="form-group">
                        <label for="ticketQuantity">Số lượng vé:</label>
                        <div class="input-group">
                            <input type="number" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $num_ticket ?>">
                            <input type="hidden" name="tour_id" value="<?php echo $tour_detail['id'] ?>">
                        </div>
                    </div>

                    <!-- Hiển thị số vé còn lại trong kho -->
                    <p>Số vé còn lại: <span id="num-ticket"><?php echo $num_ticket ?></span></p>

                    <!-- Nút giỏ hàng và thanh toán -->
                    <button id="add_cart" type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript for number input -->
    <script>
        const btnAddCart = document.getElementById("add_cart");
        const numTicket = document.getElementById("num-ticket");
        console.log(numTicket.innerHTML)
        if(numTicket.innerHTML==0) {
            btnAddCart.disabled = true;
            btnAddCart.style.backgroundColor="red";
            btnAddCart.innerHTML="Sold out";
        }
    </script>

</body>

</html>