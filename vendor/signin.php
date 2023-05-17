<?php
    session_start();
    require_once "connect.php";

    $login = $_POST['username'];
    $password = $_POST['password'];

    if($login == "" or $password == ""){
        $_SESSION['log_report'] = "Вы заполнили не все поля";
    }

    $sql = "SELECT * FROM users WHERE username = ?";

    $query = $pdo->prepare($sql);
    $query->execute([$login]);

    $user = $query->fetch(PDO::FETCH_OBJ);

    if($user->password == $password){
        $_SESSION['user'] = [
            'login' => $user->username,
            'email' => $user->email
        ];

        header('Location: ../products.php');
    } else {
        $_SESSION['log_report'] = "Такой пользователь не найден";
        header('Location: ../login.php');
    }


?>