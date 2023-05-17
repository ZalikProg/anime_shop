<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <? require_once "./blocks/header.php"?>
    <div class="cart_container">
    <?php
        $result = array();        
        if(empty($_SESSION['cart'])) {
            echo "<p class='no_products'>Товаров в корзине нет...</p>";
        } else {
        foreach($_SESSION['cart'] as $block){
            foreach($block as $product){
                if(isset($result[$product['id']])){
                    $result[$product['id']]["count"] += 1;
                } else {
                    $result[$product['id']] = array("id" => $product['id'],
                                                    "name" => $product['name'],
                                                    "count" => 1,
                                                    "price" => $product['price'],
                                                    "image" => $product['image']);
                }
            }
        }

        foreach($result as $product){
            echo "<div class='cart_product'>";
            echo "<p>Название: ".$product['name']."</p>";
            echo "<img src='./content/".$product['image']."'>";
            echo "<div class'cart_count'><p>Количество: ".$product['count']."</p></div>";
            echo "<p>Стоимость: ".$product['price']*$product['count']."</p>";
            echo "<a href='./cart.php?id=".$product['id']."'>Удалить</a>";
            echo "</div>";
        }

    }
    ?>
    </div>
    <div class="cart_control">
        <p>Товаров в корзине: <?php
            echo (count($_SESSION['cart']));
        ?></p>
        <p>На сумму: <?php
            $sum = 0;
            foreach($_SESSION['cart'] as $block){
                foreach($block as $product){
                    $sum += $product['price'];
                }
            }

            echo $sum;
        ?>руб</p>

        <a href="vendor/create_order.php" class="create_order">Сделать заказ</a>
    </div>

    <style>

        .cart_container{
            width: 500px;
            float: left;
            padding-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cart_product img{
            width: 250px;
        }

        .no_products{
            text-align: center;
            font-size: 18px;
            color: gray;
            font-weight: bold;
        }

        .cart_product{
            padding: 10px;
            margin: 5px;
            background: orange;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }

        .cart_product *{
            margin: 5px 0;
        }

        .cart_control{
            width: 300px;
            float: right;
            padding-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: orange;
            height: 100vh;
            color: yellow;
            font-size: 18px;
            font-weight: bold;
        }

        .cart_count{
            display: flex;
        }

    </style>
</body>
</html>