<?php
    include('../database/connection.php');

    $login_err = '';

    if (isset($_POST['name'])) {
        // get admin
        $query = 'SELECT * FROM ADMINS WHERE EMAIL="' . $_POST['email'] . '"';
        $result = mysqli_query($conn, $query);

        // if admin doesn't exist or else
        if (!$result || mysqli_num_rows($result) == 0) {
            $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $query = 'INSERT INTO PENDING (NAME, EMAIL, PASSWORD) VALUES ('
                . '"' . $_POST['name']     . '", '
                . '"' . $_POST['email']    . '", '
                . '"' . $hash . '")';

            $result = mysqli_query($conn, $query);
            if (!$result) {
                $login_err = 'Oops, something went wrong!';
            }
            header('location: login.php');
        } else {
            $login_err = 'Email already in use!';
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign up</title>
</head>
<body>
    <div class="wrapper">
        <div id="formContent">
            <h2 class="inactive underlineHover"><a href="login.php">log In </a></h2>
            <h2 class="active"> Sign Up </h2>
            <h1>Request Admin Access</h1>
            <form action="" method="POST">
                <input type="text" id="login" name="name" placeholder="Name" required>
                <input type="text" name="email" required placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" minlength=8 required>
                <p style="color: red;"><?php echo $login_err ?></p>
                <input type="submit" value="Request">
            </form>
            <a href="/index.php">Back</a>
        </div>
    </div>
</body>
</html>