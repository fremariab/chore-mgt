<?php
include "../settings/connection.php";

if (isset($_GET['id'])) {
    $assign_id = $_GET['id'];

    $sql = "DELETE FROM Assignment where assignmentid='$assign_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../admin/assign_chore_view.php");
    } else {
        header("Location: ../admin/assign_chore_view.php?error=This chore could not be deleted");
    }
} else {
    header("Location: ../admin/assign_chore_view.php");
}
