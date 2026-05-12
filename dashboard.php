<?php
session_start();
include "config.php";
$user_id = $_SESSION['user_id'];
$sql = "
SELECT
requests.id,
requests.request_date,
requests.comment,
statuses.status_name,
users.email,
users.password

FROM requests

JOIN statuses
ON requests.status_id = statuses.id

JOIN users
ON requests.user_id = users.id

WHERE requests.user_id='$user_id'
";
$result = mysqli_query($conn, $sql);
?>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<p>
Заявка #<?= $row['id'] ?>
</p>
<p>
Дата:
<?= $row['request_date'] ?>
</p>
<p>
Комментарий:
<?= $row['comment'] ?>
</p>
<p>
Статус:
<?= $row['status_name'] ?>
</p>
<p>
Почта:
<?= $row['email'] ?>
</p>
<p>Пароль:
<?= $row['password'] ?>
</p>
<hr>
<?php endwhile; ?>