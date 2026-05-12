<?php
$conn = mysqli_connect('localhost', 'root', '', 'demo');
if (!$conn){
    die("не удалось выполнить подключение к БД");
}
mysqli_set_charset($conn, 'utf8mb4');
?>