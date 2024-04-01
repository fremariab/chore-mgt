<?php
include "../settings/connection.php";

$sql = "SELECT * FROM People where rid=2 or rid = 3 ORDER BY pid ASC ";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $assignees = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
