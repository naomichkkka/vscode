<?php
session_start();
include 'config2.php';
if (!isset($_SESSION['user_id'])){
    echo "Вы не авторизованы!";
    header ('location: register2.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $request_date = $_POST ['request_date'];
    $comment = $_POST['comment'];
    $sql = "
    INSERT INTO requests (user_id, request_date, comment, status_id)
    VALUES ('$user_id', '$request_date', '$comment', 1)";

    mysqli_query($conn, $sql);
    header('location: dashboard.php');
    exit();
}
?>
<h2>Создать заявку2</h2>
<form method="POST">
<p>Дата:</p>
<input type="date" name="request_date">
<p>Комментарий:</p>
<textarea name="comment"></textarea>
<br><br>
<button>Создать</button>
</form>

