<?php

require_once "vendor/connect.php";
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
    <div class="products_container">
    <?php
        $sql = 'SELECT * FROM `products`';
        $query = $pdo->prepare($sql);
        $query->execute();

        while($product = $query->fetch(PDO::FETCH_OBJ)){
            echo "<div class='product'>
                    <p>".$product->name."</p>
                    <img src='./content/".$product->image."'>
                    <p>".$product->price."руб</p>
                    <a href='vendor/addToCart.php?id=".$product->id."'><button>Добавить</button></a>
                  </div>";
        }
    ?>
    </div>
</body>
</html>