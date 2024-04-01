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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Chores</title>
        <link rel="stylesheet" href="../css/admin_page_style.css">
    </head>

    <body>
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
                        <p> Chores List</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="button-container" style="float: right;">
                    <a href="../admin/addchore.php" style="text-decoration: none;"> <button>Add Chore</button></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="clearfix"></div>
                <div class="col-div-4-1">
                    <div class="box-1">
                        <div class="content-box-1">                            
                            <?php
                            include "../functions/chore_fxn.php";  ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br> 
                         </div>
        </div>

        <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    header("Location: ../view/user_home.php");
} ?>