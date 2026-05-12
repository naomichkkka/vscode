<?php
session_start();
include 'config.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
    WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role_id'] = $user['role_id'];

        if ($user['role_id'] == 1) {
            header("Location: admin.php");
            exit();
        } else {
            header("Location: dashboard.php");
            exit();
        }

    }
    else{
        echo"Неправильный логин или пароль";
    }
}
?>
<h2>Вход</h2>
<form method="POST">
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Пароль">
<button>Войти</button>
</form>
<a href="register.php">Регистрация</a>