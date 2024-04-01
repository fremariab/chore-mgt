<?php
include "../settings/core.php";
ifLoggedIn();
$user_role=getUserRole();
if ($user_role == 1 || $user_role == 2) {
 include "../functions/select_assignee_fxn.php";

include "../functions/select_chore_fxn.php";
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
            <br>
            <div class="head">
                <div class="col-div-6">
                    <p> Assign Chore</p>
                </div>
                <div class="clearfix"></div>
            </div>

            <form class="form" action="../actions/assign_a_chore_action.php" method="post" id="">
                <?php
                if (isset($_GET['error'])) { ?>
                    <p class="error" style="color:red;font-size:12px;"><?php echo $_GET['error'] ?></p>
                <?php } ?><br>
                <label>Assignee</label>
                <select name="assignee" id="assignee">
                    <?php
                    foreach ($assignees as $assignee) {
                    ?> <option value="<?php echo $assignee['pid']; ?>"><?php echo $assignee['fname'] . " " . $assignee['lname']; ?> </option>
                    <?php
                    }
                    ?>
                </select> <br>
                <label>Assign Chore</label>
                <select name="chore" id="chore">
                    <?php
                    foreach ($chore_options as $chore_option) {
                    ?> <option value="<?php echo $chore_option['cid']; ?>"><?php echo $chore_option['chorname']; ?> </option>
                    <?php
                    }
                    ?>
                </select> <br>
                <label>Due Date</label>
                <input type="date" id="date" name="date" >
                <input type="submit"  class="button"name="submit_button" onclick="closeForm()" value=" Assign Chore"></button>

            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>

</body>
</html>
<?php } else {
    header("Location: ../view/user_home.php");
} ?>