<?php
include "../settings/core.php";
include "../functions/home_fxn.php";

ifLoggedIn();
$user_role=getUserRole();
$user_id=getUserID();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/dash_style.css">
</head>

<body>
    <div class="left-div">
        <a href="../admin/admin_home.php"><img class="logo" src="../images/logo.png" alt=""></a> 
        <hr class="hr" />
        <ul class="nav">
            <li>
                <a href="../view/user_home.php">
                    <i class="fa-solid fa-house" style="color: #fff;"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="../view/managechores.php">
                    <i class="fa-solid fa-list-check" style="color: #fff;"></i>
                    Manage Chores
                </a>
            </li>
            <br><br><br><br> <br><br> <br>
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
                    <p class="nav"> Dashboard</p>
                </div>
                <div class="clearfix"></div>
            </div>
             <br> 
            <div class="col-div-4-1">
            <div class="box" style="background-color:#018575">
                    <p class="head-1" style="color:#fff">All Chores</p>
                    <p class="number" style="color:#fff"><?php echo
                    all_stat($user_id,$user_role) ;?></p>
                </div>
            </div>
            <div class="col-div-4-1">
            <div class="box" style="background-color:#FED84D">
                    <p class="head-1" style="color:#fff">In Progress</p>
                    <p class="number" style="color:#fff" ><?php echo
                    inprogress_stat($user_id,$user_role) ;?></p>
                </div>
            </div>
            <div class="col-div-4-1">
            <div class="box" style="background-color:#FF3D4D">
                    <p class="head-1" style="color:#fff">Incomplete</p>
                    <p class="number" style="color:#fff"><?php echo
                    incomplete_stat($user_id,$user_role) ;?></p>
                </div>
            </div>
            <div class="col-div-4-1">
                <div class="box" style="background-color:#38B6FF">
                    <p class="head-1" style="color:#fff">Completed</p>
                    <p class="number" style="color:#fff"><?php echo
                    completed_stat($user_id,$user_role) ;?></p>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-div-4-1">
                <div class="box-1" style="background-color:#fff">
                    <div class="content-box-1">
                        <p class="head-1"><b>
                                Recently Assigned Chores
                            </b></p>
                       <?php display_recent_stat($user_id,$user_role);?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
</body>
</html>
