<?php
session_start();
include "config.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SESSION['role_id'] !== 1){
    header("Location: index.php");
    exit();
}
if (isset($_POST['request_id'])){
    $request_id = $_POST['request_id'];
    $status_id = $_POST['status_id'];

    mysqli_query($conn,
    "UPDATE requests SET status_id='$status_id' WHERE id='$request_id'");
}
$sql = "
SELECT 
requests.id, 
requests.request_date, 
requests.comment,
users.name,
statuses.status_name

FROM requests

JOIN users
ON requests.user_id = users.id

JOIN statuses
ON requests.status_id = statuses.id
";

$result = mysqli_query($conn, $sql);
$statuses = mysqli_query($conn, "SELECT * FROM statuses");
?>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>date</th>
    <th>comment</th>
    <th>name</th>
    <th>status</th>
    <th>edit status</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['request_date'] ?></td>
    <td><?= $row['comment'] ?></td>
    <td><?= $row['status_name'] ?></td>
    <td>

    <form method="POST">
        <input type="hidden" name="request_id" value="<?=  $row['id']?>">
        <select name="status_id">
            <?php
            mysqli_data_seek($statuses, 0);
            while ($s = mysqli_fetch_assoc($statuses)):
            ?>
        <option value="<?= $s['id'] ?>"><?= $s['status_name'] ?></option>
        <?php endwhile; ?>
        </select>
        <button type="submit">OK</button>
    </form>
    </td>
</tr>
<?php endwhile; ?>
</table>
