<?php
include "../settings/connection.php";

if (isset($_POST['submit_button'])) {
    $chor_name = $_POST['n_chorename'];
    $chor_id = $_POST['id'];

    $sql = "UPDATE Assignment SET chorname='$chor_name' where cid='$assign_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../admin/assignchores.php");
    } else {
        header("Location: ../admin/assignchores.php?error=This chore could not be edited");
    }
} else {
    header("Location: ../admin/assignchores.php");
}
