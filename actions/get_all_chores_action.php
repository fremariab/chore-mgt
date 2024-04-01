<?php
include "../settings/connection.php";

function getchores()
{
    global $conn;
    $sql = "SELECT * FROM chores ORDER BY cid ASC";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $chores = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $chores;
    }
}
