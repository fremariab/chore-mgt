<?php
include "../settings/connection.php";

$sql = "SELECT * FROM chores ORDER BY cid ASC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $chore_options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
