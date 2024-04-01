<?php
include "../settings/connection.php";

$sql = "SELECT * FROM family_name ORDER BY fid ASC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
