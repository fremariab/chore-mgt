<?php
include "../settings/core.php";
ifLoggedIn();
$user_role=getUserRole();
if ($user_role == 1 || $user_role == 2) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class=" form-container" id="form-container">
    <title>Add Chore</title>
    <link rel="stylesheet" href="../css/admin_page_style.css">
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="left-div">
        <a href="../admin/admin_home.php"><img class="logo" src="../images/logo.png" alt=""></a> 
        <hr class="hr" />
        <ul class="nav">
            <li>
                <a href="../admin/admin_home.php">
                    <i class="fa-solid fa-house" style="color: #fff;"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="../admin/chore_control_view.php">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                    Add Chores
                </a>

            </li>
            <li>
                <a href="../admin/assign_chore_view.php">
                    <i class="fa-solid fa-list-check" style="color: #fff;"></i>
                    Assign Chores
                </a>
            </li>
            <br><br><br><br> 
            <hr class="hr" />
            <li>
                <a href="../login/logout_view.php">
                    <i class="fa-solid fa-right-from-bracket" style="color: #fff;"></i>
                    Logout
                </a>
            </li>
        </ul>
        <br><br>
    </div>
    <div class="right-div">
        <div class="main">
             <div class="head">
                <div class="col-div-6">
                    <p> Add Chore</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <form class="form" action="../actions/add_chore_action.php" method="post" id="">
                <?php
                if (isset($_GET['error'])) { ?>
                    <p class="error" style="color:red;font-size:12px;"><?php echo $_GET['error'] ?></p>
                <?php } ?>
                <input type="text" id="name" name="chorename" placeholder="Chore Name"  pattern="[A-Za-z0-9\s\-_]+">
                <input type="submit" class="button" name="submit_button" value=" Add Chore"></button>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>

</body>
</html>
<?php } else {
    header("Location: ../view/user_home.php");
} ?>