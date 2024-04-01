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
    <title>Manage Chores</title>
    <link rel="stylesheet" href="../css/admin_page_style.css">
</head>

<body>
    
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
            <br>
            <div class="head">
                <div class="col-div-6">
                    <p > Manage Chores</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
             
            <div class="clearfix"></div>
            <div class="col-div-4-1">
                <div class="box-1">
                    <div class="content-box-1">
                        <p class="head-1"><b>
                                Ongoing Chores
                            </b></p>
                         <?php display_ongoing($user_id,$user_role);?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-div-4-1">
                <div class="box-1">
                    <div class="content-box-1">
                        <p class="head-1"><b>
                                Completed Chores
                            </b></p>
                        
<?php                        display_completed($user_id,$user_role);
?>                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
</body>

</html>