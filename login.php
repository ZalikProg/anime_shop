<?
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <? require_once "blocks/header.php"; ?>
    <form class="reg_form" action="vendor/signin.php" method="post">
        <h1>Вход</h1>
        <input type="text" name="username" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Войти</button>
        <?php
            if(isset($_SESSION['log_report'])){
                echo "<div class='report'>";
                echo $_SESSION['log_report'];
                echo "</div>";
                unset($_SESSION['log_report']);
            }
        ?>
    </form>
    <style>
        .reg_form{
            margin-top: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .reg_form h1{
            color: orangered;
        }

        .reg_form input{
            margin: 5px 0;
            width: 300px;
            padding: 3px;
            font-size: 16px;
            background: none;
            border: 1px solid orange;
            border-radius: 5px;
        }

        .reg_form button{
            margin-top: 5px;
            padding: 5px;
            background: orange;
            color: yellow;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .report{
            border: 2px solid orangered;
            padding: 3px 15px;
            color: orangered;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .good{
            border: 2px solid greenyellow;
            padding: 3px 15px;
            color: greenyellow;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</body>
</html>