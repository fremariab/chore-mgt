<?php
include "../settings/connection.php";

if ((isset($_GET['sid'])) && (isset($_GET['id']))) {
    $sid = $_GET['sid'];
    $assign_id = $_GET['id'];

    $sql = "UPDATE Assignment SET sid='$sid' where assignmentid='$assign_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../view/managechores.php");
    } else {
        header("Location: ../view/managechores?error=This could not be edited");
    }
} else {
    header("Location: ../view/managechores.php");
}
