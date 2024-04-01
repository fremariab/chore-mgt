<?php session_start();
include "../settings/connection.php";

if (isset($_POST['submit_button'])) {
    $chore = mysqli_real_escape_string($conn, $_POST['chore']);
    $assignee = mysqli_real_escape_string($conn, $_POST['assignee']);
    $due_date =  $_POST['date'];
    function isValidDate($date, $format = 'Y-m-d')
    {
        $dateTime = DateTime::createFromFormat($format, $date);
        return $dateTime && $dateTime->format($format) === $date;
    }

    if (!(isValidDate($due_date))) {
        header("Location: ../admin/assignchores.php?error=Invalid date");
        exit();
    }

    if (empty($chore)) {
        header("Location: ../admin/assignchores.php?error=Chore Name is required");
        exit();
    }
    if (empty($assignee)) {
        header("Location: ../admin/assignchores.php?error=Assignee is required");
        exit();
    }

    if (empty($due_date)) {
        header("Location: ../admin/assignchores.php?error=Due Date is required");
        exit();
    } 


    $sql = "SELECT * FROM Assigned_people AS ap, Assignment AS a WHERE ap.assignmentid = a.assignmentid     AND a.cid = '$chore' AND ap.pid = '$assignee'";
    $result = mysqli_query($conn, $sql);

    $count_assignments = mysqli_num_rows($result);
    $dateCompleted = date('Y-m-d', strtotime('+2 weeks'));

    $sql = "INSERT INTO assignment(cid,sid,date_assign,	date_due,	last_updated,	date_completed,who_assigned) 
           VALUES ('$chore',1, NOW(), '$dateCompleted', NOW(),'$dateCompleted', '$assignee')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $assignment_id = mysqli_insert_id($conn);
        $sql = "INSERT INTO Assigned_people (pid, assignmentid) VALUES ('$assignee', '$assignment_id')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../admin/assign_chore_view.php");
            exit();
        } else {
            header("Location: ../admin/assignchores.php?error=Failed to assign chore");
            exit();
        }
    } else {
        header("Location: ../admin/assignchores.php?error=Failed to create assignment");
        exit();
    }
} else {
    // If the assignment already exists, redirect with an error message
    header("Location: ../admin/assignchores.php?error=This chore is already assigned to the selected person");
    exit();
}
