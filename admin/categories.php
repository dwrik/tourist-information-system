<?php
    session_start();

    // redirect back to login if not authorized
    if (!isset($_SESSION['auth']) || $_SESSION['auth'] != true) {
        header('location: login.php');
        exit;
    }

    include('../database/connection.php');

    $upload_err = '';

    function validateImage($image) {
        // get file info
        $file_name = $_FILES[$image]['name'];
        $file_size = $_FILES[$image]['size'];
        $tmp_name = $_FILES[$image]['tmp_name'];

        $extensions = ['png', 'jpg', 'jpeg'];
        $file_name_parts = explode('.', $file_name);
        $file_ext = strtolower($file_name_parts[count($file_name_parts) - 1]);

        // limit extensions
        if (!in_array($file_ext, $extensions)) {
            return false;
        }

        // limit file size to 10 MB
        if ($file_size > 10000000) {
            return false;
        }

        // generate random filename with timestamp
        $path = '../images/categories/';
        $filename = $path . uniqid(rand(1, 999)) . '.' . $file_ext;
        return ['tmp_name' => $tmp_name, 'filename' => $filename];
    }

    if (isset($_POST['name'])) {
        // validate images uploaded
        $valid_cover = validateImage('cover');

        if ($valid_cover) {
            // add record
            if ($_GET['operation'] == 'add') {
                $query = 'INSERT INTO CATEGORIES (NAME, DESCRIPTION, COVER) VALUES ('
                    . '"' . $_POST['name']           . '", '
                    . '"' . $_POST['description']    . '", '
                    . '"' . $valid_cover['filename'] . '")';
            }

            // update record
            if ($_GET['operation'] == 'update') {
                // delete existing image from image directory
                $query = 'SELECT * FROM CATEGORIES WHERE ID=' . $_GET['id'];
                $row = mysqli_fetch_object(mysqli_query($conn, $query));
                unlink($row->cover);

                $query = 'UPDATE DESTINATIONS SET '
                    . 'NAME="' . $_POST['name']               . '", '
                    . 'DESCRIPTION="' . $_POST['description'] . '", '
                    . 'COVER="' . $valid_cover['filename']    . '" '
                    . 'WHERE ID=' . $_GET['id'];
            }

            // common operations b/w add and update

            move_uploaded_file($valid_cover['tmp_name'], $valid_cover['filename']);

            $result = mysqli_query($conn, $query);
            if ($result == false) {
                $upload_err = 'Oops something went wrong!';
            }
        } else {
            $upload_err = 'Invalid file extension. Please upload a valid image!';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Admin Portal</h1>
    <table>
        <tr>
            <td><strong>Name</strong>: <?php echo htmlspecialchars($_SESSION['user']->name); ?></td>
            <td><strong>Email</strong>: <?php echo htmlspecialchars($_SESSION['user']->email); ?></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    <hr>
    <h2><?php echo $_GET['operation'] ?> place</h2>
    <?php
        // set initial field values
        $name = '';
        $description = '';

        if ($_GET['operation'] == 'update') {
            $query = 'SELECT * FROM CATEGORIES WHERE ID=' . $_GET['id'];
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_object($result);

            $name = $row->name;
            $description = $row->description;
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" maxlength=80 required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description; ?>" maxlength=800 required></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="cover" accept="image/png, image/jpeg" required></td>
            </tr>
            <tr>
                <td></td>
                <td style="color: red;"><?php echo $upload_err ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save"></td>
            </tr>
        </table>
    </form>
    <a href="home.php">Back</a>
</body>
</html>