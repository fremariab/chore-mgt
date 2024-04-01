<?php
include "../functions/select_role_fxn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="../css/login_style.css">
</head>
<body>
    <div class="form">
        <h1> Sign Up </h1>
        <form action="../actions/register_user_action.php" method="POST" name="" id="">
            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <div class="input-box">
                <input type="text" name="fname" id="fname" pattern="[A-Za-z]{2,50}" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="lname" id="lname" pattern="[A-Za-z]{2,50}" placeholder="Last Name" required>
            </div>
             <div class="radio">
                <label style="color:gray;">Gender </label>
                <div class="radio-container">
                    <input type="radio" name="gender" id="gender-male" value="male" required>
                    <label for="gender-male">Male</label>
                </div>
                <div class="radio-container">
                    <input type="radio" name="gender" id="gender-female" value="female" required>
                    <label for="gender-female">Female</label>
                </div>
            </div>
            <select name="fam-role" id="fam-role" required>
                <?php
                foreach ($options as $option) {
                ?> <option value="<?php echo $option['fid']; ?>"><?php echo $option['fam_name']; ?> </option>
                <?php
                }
                ?>
            </select>
            <div class="input-box">
                <input type="date" name="dob" id="dob" placeholder="Date of Birth (YYYY-MM-DD)" pattern="\d{4}-\d{2}-\d{2}" required title="Enter a valid date in the format YYYY-MM-DD">
            </div>
            <div class="input-box">
                <input type="text" name="phone_number" id="phone_number" pattern="^\+\d{0,9}\s\(\d{3}\)\s\d{3}-\d{4}$" placeholder="Phone Number" required>
            </div>
            <div class="input-box">
                <input type="email" name="register_email" id="register_email" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
            </div>
            <div class="input-box">
                <input type="password" name="register_password" id="register_password" placeholder="Password" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
            </div>
            <div class="input-box">
                <input type="password" name="register_password1" id="register_password1" placeholder="Confirm Password" required>
            </div>
            <div class="button-container">
                <button type="submit" name="submit_button" id="submit_button">
                    Sign Up
                </button>
            </div>
            <div class="user" >
                Already have an account?
                <a href="../login/login_view.php">
                    Log in
                </a>
            </div>        
        </form>
    </div>

</body>

</html>