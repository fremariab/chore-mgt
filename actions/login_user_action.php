<?php session_start();
include "../settings/connection.php";

if (isset($_POST['submit_button'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_mail = validate($_POST['login_email']);
    $psswrd = validate($_POST['login_password']);

    if (empty($user_mail)) {
        header("Location: ../login/login_view.php?error=Email is required");
        exit();
    } else if (empty($psswrd)) {
        header("Location: ../login/login_view.php?error=Password is required");
        exit();
    }

    $sql = "SELECT * FROM People where email='$user_mail'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($psswrd, $row['passwd'])) {
            $_SESSION['user_id'] = $row['pid'];
            $_SESSION['user_role'] = $row['rid'];
            if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) {
                header("Location: ../admin/admin_home.php");
                exit();
            } else {
                header("Location: ../view/user_home.php");
                exit();
            }
        } else {
            header("Location: ../login/login_view.php?error=Incorrect email or password.");
            exit();
        }
    } else {
        header("Location: ../login/login_view.php?error=No user with these details. Please sign up");
        exit();
    }
}
