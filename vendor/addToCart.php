<?php
    session_start();
    require_once "connect.php";

    if(isset($_SESSION['user'])){
        $id = $_GET['id'];

        $sql = 'SELECT * FROM products WHERE id = ?';
        $query = $pdo->prepare($sql);
        $query->execute([$id]);
    
        $product = $query ->fetch(PDO::FETCH_ASSOC);
    
        $_SESSION['cart'][$product['name']][] = $product;
    
        header('Location: ../products.php');
    } else {
        $_SESSION['log_report'] = 'Сначала необходимо войти в аккаунт';
        header('Location: ../login.php');
    }
?>