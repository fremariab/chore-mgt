<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="/images/favicon.ico">

    <link rel="stylesheet" href="../css/login_style.css">
</head>
<body>
    <div class="form">
        <h1> Log In </h1>
        <form action="../actions/login_user_action.php" method="POST" name="login_form" id="login_form">
            <div class="input-box">
                <input type="email" name="login_email" id="login_email" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
            </div>
            <div class="input-box">
                <input type="password" name="login_password" id="login_password" placeholder="Password" required pattern=".{6,}" title="Password must be at least 6 characters long">
            </div>
            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <div class="button-container">
                <button type="submit" name="submit_button" id="submit_button">
                    Log In
                </button>
            </div>
            <div class="user">
                Don't have an account?
                <a href="../login/register_view.php">
                    Sign up!
                </a>
            </div>
        </form>
    </div>

</body>

</html>