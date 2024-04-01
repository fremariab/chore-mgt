<?php session_start();
include "../settings/connection.php";

if (isset($_POST['submit_button'])) {
    $chorename = mysqli_real_escape_string($conn, $_POST['chorename']);


    if (empty($chorename)) {
        header("Location: ../admin/addchore.php?error=Chore Name is required");
        exit();
    }

    $sql = "Select * from chores where chorname='$chorename'";
    $result = mysqli_query($conn, $sql);
    $count_chore = mysqli_num_rows($result);

    if ($count_chore == 0) {
        $sql = "INSERT INTO Chores(chorname) VALUES('$chorename')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../admin/chore_control_view.php");
        }
    } else {
        if ($count_chore > 0) {
            header("Location: ../admin/addchore.php?error=This chore already exists in the database");
        }
    }
}
