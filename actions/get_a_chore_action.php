<?php
include "../settings/connection.php";


function get_chore($chor_id)
{
    global $conn;
    $sql = "SELECT * FROM Chores where cid='$chor_id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $chore = mysqli_fetch_assoc($result);

        return $chore;
    }
}
