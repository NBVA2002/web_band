<!-- Danh sách tour diễn -->
<?php

echo '<pre>';
print_r($tour_list);
echo '</pre>'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vé xem âm nhạc</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 20px auto;
        }

        .card {
            box-sizing: border-box;
            width: calc(33.33% - 20px);
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card .content {
            padding: 10px;
        }

        h2,
        p {
            margin: 0;
            color: #333;
        }

        .buy-ticket {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
            cursor: pointer;
        }

        .buy-ticket:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Thẻ trên -->
        <div class="card">
            <img src="background1.jpg" alt="Background 1">
            <div class="content">
                <h2>Địa điểm 1</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>

        <div class="card">
            <img src="background2.jpg" alt="Background 2">
            <div class="content">
                <h2>Địa điểm 2</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>

        <div class="card">
            <img src="background3.jpg" alt="Background 3">
            <div class="content">
                <h2>Địa điểm 3</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>

        <div class="card">
            <img src="background4.jpg" alt="Background 4">
            <div class="content">
                <h2>Địa điểm 4</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>

        <div class="card">
            <img src="background5.jpg" alt="Background 5">
            <div class="content">
                <h2>Địa điểm 5</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>
        <div class="card">
            <img src="background6.jpg" alt="Background 6">
            <div class="content">
                <h2>Địa điểm 6</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>
        <div class="card">
            <img src="background7.jpg" alt="Background 7">
            <div class="content">
                <h2>Địa điểm 7</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>
        <div class="card">
            <img src="background4.jpg" alt="Background 4">
            <div class="content">
                <h2>Địa điểm 8</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>
        <div class="card">
            <img src="background4.jpg" alt="Background 4">
            <div class="content">
                <h2>Địa điểm 9</h2>
                <p>Ngày giờ: DD/MM/YYYY - HH:MM AM/PM</p>
                <p>Mô tả: Mô tả chi tiết về sự kiện âm nhạc.</p>
                <button class="buy-ticket">Buy Ticket</button>
            </div>
        </div>
    </div>
</body>

</html>