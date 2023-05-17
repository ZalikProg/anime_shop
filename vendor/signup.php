<?php
    session_start();
    require_once "connect.php";

    $login = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if($login == "" or $email == "" or $password == "" or $repassword == ""){
        $_SESSION['report'] =  "Вы заполнили не все поля";
        header("Location: ../createAccount.php");
    } else if($password != $repassword){
        $_SESSION['report'] = 'Пароли не совпадают';
        header("Location: ../createAccount.php");
    } else {
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->execute([NULL, $login, $password, $email]);
        $_SESSION['good'] = "Аккаунт успешно создан";
        header("Location: ../createAccount.php");
    }


?>