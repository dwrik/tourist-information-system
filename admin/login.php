<?php
include('../database/connection.php');

$login_err = '';

if (isset($_POST['email'])) {
    // get admin
    $query = 'SELECT * FROM ADMINS WHERE EMAIL="' . $_POST['email'] . '"';
    $result = mysqli_query($conn, $query);

    // if admin doesn't exist or else
    if (!$result || mysqli_num_rows($result) == 0) {
        $login_err = 'Invalid email or password!';
    } else {
        $row = mysqli_fetch_object($result);
        $hash = $row->password;

        // verify password hash
        if (password_verify($_POST['password'], $hash)) {
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['user'] = $row;
            header('location: home.php');
        } else {
            $login_err = 'Invalid email or password!';
        }
    }
}

?>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Information System</title>
</head>
<body>
    <div class="wrapper">
        <div id="formContent">
            <h2 class="active"> Sign In </h2>
            <h2 class="inactive underlineHover"><a href="signup.php">Sign Up </a></h2>
            <form action="" method="POST">
                <input type="text" name="email" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <p style="color: red;"><?php echo $login_err ?></p>
                <input type="submit" value="Log In">
            </form>
            <a href="/index.php">Back</a>
        </div>
    </div>
</body>
</html>