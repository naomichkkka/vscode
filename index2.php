<?php
session_start();
include 'config2.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user){
        $_SESSION['user_id'] = $user ['id'];
        $_SESSION['role_id'] = $user ['role_id'];

        if ($user['role_id'] == 1){
            header('location: admin2.php');
            exit();
        } else {
            header('location: dashboard2.php');
        }

    }else {
        echo"Логин или пароль неверные!";
    }
}
    ?>
    <form method="POST">
        <input name="email" type="text" placeholder="Email" required>
        <input name="password" type="password" placeholder="password" required>
        <button type="submit">Войти</button>
    </form>
    <a href="register.php">Регистрация</a>