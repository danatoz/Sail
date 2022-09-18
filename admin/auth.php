<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    $pass = md5($password."g452615ph33ssq");

    require "DbContext.php";
    $query = $pdo->prepare('SELECT * FROM Users WHERE Login=:login and Password=:pass');
    $query->execute(['login' => $login, 'pass' => $pass]);
    $users = $query->fetchAll();
    if(count($users) == 0){
        echo("Неверный логин или пароль!");
        exit();
    }
    print_r($users[0]['Login']);
    #header('Location: /');
?>