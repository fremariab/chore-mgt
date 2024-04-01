<?php session_start();
include "../settings/connection.php";

if (isset($_POST['submit_button'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $dob = $_POST['dob'];
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $register_email = mysqli_real_escape_string($conn, $_POST['register_email']);
    $register_password = mysqli_real_escape_string($conn, $_POST['register_password']);
    $register_password1 = mysqli_real_escape_string($conn, $_POST['register_password1']);

    function isValidDate($date, $format = 'Y-m-d')
    {
        $dateTime = DateTime::createFromFormat($format, $date);
        return $dateTime && $dateTime->format($format) === $date;
    }

    if (!(isValidDate($dob))) {
        header("Location: ../login/register_view.php?error=Invalid date");
        exit();
    }
    if (empty($fname)) {
        header("Location: ../login/register_view.php?error=First Name is required");
        exit();
    } else if (empty($lname)) {
        header("Location: ../login/register_view.php?error=Last Name is required");
        exit();
    } else if (empty($dob)) {
        header("Location: ../login/register_view.php?error=Date of Birth is required");
        exit();
    } else if (empty($phone_number)) {
        header("Location: ../login/register_view.php?error=Phone number is required");
        exit();
    } else if (empty($register_email)) {
        header("Location: ../login/register_view.php?error=Email is required");
        exit();
    } else if (empty($register_password)) {
        header("Location: ../login/register_view.php?error=Password is required");
        exit();
    } else if (empty($register_password1)) {
        header("Location: ../login/register_view.php?error=Confirm Password is required");
        exit();
    }

    if (!(isset($_POST['gender']))) {
        header("Location: ../login/register_view.php?error=No radio button was selected.");
        exit();
    } else {
        $gender = $_POST["gender"];
    }

    if (isset($_POST["fam-role"])) {
        $fid = $_POST["fam-role"];
    } else {
        header("Location: ../login/register_view.php?error=Please select a role.");
        exit();
    }

    $sql = "Select * from People where email='$register_email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_email == 0) {

        if ($register_password == $register_password1) {

            $hash = password_hash($register_password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO People(rid,fid,fname, lname, gender,dob,tel,email,passwd) VALUES(3,'$fid','$fname' ,'$lname','$gender','$dob','$phone_number','$register_email','$hash')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: ../login/login_view.php");
            }
        } else {
            header("Location: ../login/register_view.php?error=Passwords do not match");
        }
    } else {
        if ($count_email > 0) {
            header("Location: ../login/register_view.php?error=This user already exists.");

        }
    }
}
