<?php
session_start();

// redirect back to login if not authorized
if (!isset($_SESSION['auth']) || $_SESSION['auth'] != true) {
    header('location: login.php');
    exit;
}

include('../database/connection.php');

// helper
function deleteImage($conn, $table, $id)
{
    $query = 'SELECT * FROM ' . $table . ' WHERE ID=' . $id;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_object($result);
    unlink($row->cover);
}

// helper
function deleteRecord($conn, $table, $id)
{
    $query = 'DELETE FROM ' . $table . ' WHERE ID=' . $id;
    mysqli_query($conn, $query);
}

if (isset($_GET['approve'])) {
    if ($_GET['approve'] == 'true') {
        $query = 'SELECT * FROM PENDING WHERE ID=' . $_GET['id'];
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_object($result);

        $query = 'INSERT INTO ADMINS (NAME, EMAIL, PASSWORD) VALUES ('
            . '"' . $row->name     . '", '
            . '"' . $row->email    . '", '
            . '"' . $row->password . '")';
        mysqli_query($conn, $query);
    }
    deleteRecord($conn, 'PENDING', $_GET['id']);
    header('location: home.php');
}

// delete record if id is set or delete entire category
if (isset($_GET['operation']) && $_GET['operation'] == 'delete') {
    if (isset($_GET['id'])) {
        deleteImage($conn, 'DESTINATIONS', $_GET['id']);
        deleteRecord($conn, 'DESTINATIONS', $_GET['id']);
        header('location: home.php?category=' . $_GET['category']);
    } else {
        $query = 'SELECT * FROM DESTINATIONS WHERE CATEGORY_ID=' . $_GET['category'];
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            deleteImage($conn, 'DESTINATIONS', $row->id);
            deleteRecord($conn, 'DESTINATIONS', $row->id);
        }
        deleteImage($conn, 'CATEGORIES', $_GET['category']);
        deleteRecord($conn, 'CATEGORIES', $_GET['category']);
        header('location: home.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Panel</title>
</head>
<body>
    <section id="services" class="features-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-10">
                        <h1>Admin Portal</h1>
                        <strong>Name</strong>: <?php echo htmlspecialchars($_SESSION['user']->name); ?>
                        <strong>Email</strong>: <?php echo htmlspecialchars($_SESSION['user']->email); ?>
                        <a href="logout.php">Logout</a>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
            <hr>
            <?php
            // show selected category
            if (isset($_GET['category'])) {
                $category_id = $_GET['category'];

                // get category name
                $query = 'SELECT * FROM CATEGORIES WHERE ID=' . $category_id;
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_object($result);
                $category_name = $row->name;

                // get destinations in category
                $query = 'SELECT * FROM DESTINATIONS WHERE CATEGORY_ID=' . $category_id;
                $result = mysqli_query($conn, $query);
            ?>
                <h2><?php echo $category_name ?></h2>
                <a style="margin:10px 0px" href="destinations.php?category=<?php echo $category_id ?>&operation=add">
                    Add Place
                </a>
                <table>
                    <?php while ($row = mysqli_fetch_object($result)) { ?>
                        <tr>
                            <td>
                                <img width=50 height=40 src="<?php echo $row->cover ?>" alt="Cover">
                            </td>
                            <td><?php echo $row->name ?></td>
                            <td>
                                <a href=<?php echo 'destinations.php?'
                                            . 'category=' . $category_id
                                            . '&operation=update'
                                            . '&id=' . $row->id; ?>>Update</a>
                            </td>
                            <td>|</td>
                            <td>
                                <a href=<?php echo '?'
                                            . 'category=' . $category_id
                                            . '&operation=delete'
                                            . '&id=' . $row->id; ?>>Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <a href="home.php">Back</a>
                <?php
            } else {
                $query = 'SELECT * FROM PENDING';
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    echo '<h2>Notifications</h2>';
                    while ($row = mysqli_fetch_object($result)) {
                ?>
                        <table>
                            <tr>
                                <td><?php echo $row->name
                                        . ' (' . $row->email . ') ' ?> has requested admin acess.</td>
                                <td><a href="?id=<?php echo $row->id ?>&approve=true">Approve</a></td>
                                <td>|</td>
                                <td><a href="?id=<?php echo $row->id ?>&approve=false">Reject</a></td>
                            </tr>
                        </table>
                <?php
                    }
                }
                // show all categories
                $query = 'SELECT * FROM CATEGORIES';
                $result = mysqli_query($conn, $query);
                ?>
                <h2>Categories</h2>
                <a style="margin:10px 0px" href="categories.php?operation=add">
                    Add Category
                </a>
                <table>
                    <?php while ($row = mysqli_fetch_object($result)) { ?>
                        <tr>
                            <td>
                                <img width=50 height=40 src="<?php echo $row->cover ?>" alt="Cover">
                            </td>
                            <td>
                                <a href="?category=<?php echo $row->id ?>"><?php echo $row->name ?></a>
                            </td>
                            <td>
                                <a href=<?php echo 'categories.php?'
                                            . 'id=' . $row->id
                                            . '&operation=update' ?>>Update</a>
                            </td>
                            <td>|</td>
                            <td>
                                <a href=<?php echo '?category='
                                            . $row->id . '&operation=delete' ?>>Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div> <!-- container -->
    </section>
</body>

</html>