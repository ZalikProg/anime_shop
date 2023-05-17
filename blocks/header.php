<?php 
    session_start();
?>
<header class="header">
    <nav class="header_container">
        <div class="logo">
            <p>Oki<span>doki</span></p>
        </div>
        <nav class="header_menu">
            <a href="./index.php">Главная</a>
            <a href="./products.php">Каталог</a>
            <a href="">О нас</a>
        </nav>
        <?php
        if (isset($_SESSION['user'])){
            echo "<div class='mini_profile'>";
            echo "<a href='./cart.php'><img src='./content/basket.png'></a>";
            echo "<p>".$_SESSION['user']['login']."</p>";
            echo "<a class='logout' href='./vendor/logout.php'>&#10006;</a>";
            echo "</div>";
        } else {
            echo "<div class='header_buttons'>";
            echo "<a href='login.php'>Войти</a>";
            echo "<a href='createAccount.php'>Зарегистрироваться</a>";
            echo "</div>";
        }
        ?>
    </nav>
</header>

<style>
    .header{
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .header_container{
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 80px;
        background: #FFE365;
    }

    .logo{
        font-size: 38px;
        font-weight: bold;
    }

    .logo p{
        color: green;
    }

    .logo p span{
        color: orange;
    }

    .header_menu a{
        display: inline-block;
        margin: 0 10px;
        font-size: 18px;
        font-weight: bold;
        color: orangered;
    }
    .header_buttons a{
        padding: 5px;
        font-size: 14px;
        font-weight: bold;
        margin: 0 10px;
        cursor: pointer;
    }

    .header_buttons a:nth-child(1){
        background: orange;
        color: #ffe365;
        border-radius: 5px;
    }

    .header_buttons a:nth-child(2){
        background: none;
        border: 1px solid orange;
        border-radius: 5px;
        color: orange;
    }

    .mini_profile{
        display: flex;
        align-items: center;
    }

    .mini_profile *{
        margin: 0 20px;
    }

    .mini_profile p{
        font-size: 20px;
        font-weight: bold;
        color: orangered;
    }

    .mini_profile .logout{
        color: orangered;
        font-weight: bold;
        font-size: 30px;
        transition: all 1s ease;
    }

    .mini_profile .logout:hover{
        transform: rotate(180deg);
        transition: all 1s ease;
    }

</style>