<?php
session_start();
include 'config2.php';
$user_id  = $_SESSION['user_id'];
$sql = "
SELECT
requests.id,
requests.request_date,
requests.comment,
users.email,
statuses.status_name
FROM
requests

JOIN users
ON requests.user_id = users.id

JOIN statuses
ON requests.status_id = statuses.id

WHERE requests.user_id = '$user_id'
";
$result = mysqli_query ($conn, $sql);
?>
<?php while($row = mysqli_fetch_assoc($result)) : ?>
    <p>
    Заявка<?= $row['id'] ?>
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

<?php endwhile; ?>
