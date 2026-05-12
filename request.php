<?php
session_start();
include "config.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $comment = $_POST['comment'];
    $sql = "
    INSERT INTO requests
    (user_id, status_id, request_date, comment)
    VALUES
    ('$user_id', 1, '$date', '$comment')
    ";
    mysqli_query($conn, $sql);
    header("Location: dashboard.php");
    exit();
}
?>
<h2>Создать заявку</h2>
<form method="POST">
<p>Дата:</p>
<input type="date" name="date">
<p>Комментарий:</p>
<textarea name="comment"></textarea>
<br><br>
<button>Создать</button>
</form>
