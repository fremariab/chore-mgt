<?php
include "../settings/connection.php";

if (isset($_GET['id'])) {
    $chor_id = $_GET['id'];

    $sql = "DELETE FROM Chores where cid='$chor_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../admin/chore_control_view.php");
    } else {
        header("Location: ../admin/chore_control_view.php?error=This chore could not be deleted");
    }
} else {
    header("Location: ../admin/chore_control_view.php");
}
