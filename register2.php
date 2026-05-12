<?php
session_start();
include 'config2.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result)>0){
        echo "Вы уже зарегистрированы";
        header('Location: index1.php');
    } else {
        $sql = "INSERT INTO users (email, password, role_id) VALUES ('$email', '$password', 2)";
        mysqli_query($conn, $sql);
         }
}
?>