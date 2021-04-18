<?php
    include('database/connection.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tourist Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // get category name
        $query = 'SELECT * FROM CATEGORIES WHERE ID=' . $_GET['id'];
        $result = mysqli_query($conn, $query);
        $category_name = mysqli_fetch_object($result)->name;

        // get individual destinations of category
        $query = 'SELECT * FROM DESTINATIONS WHERE CATEGORY_ID=' . $_GET['id'];
        $result = mysqli_query($conn, $query);
    ?>
    <h1>
        <?php echo $category_name ?>
    </h1>
    <div class="row justify-content-center">
        <?php while ($row = mysqli_fetch_object($result)) { ?>
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-features mt-40">
                    <div class="features-title-icon d-flex justify-content-between">
                        <h4 class="features-title">
                            <?php echo $row->name ?></a>
                        </h4>
                    </div>
                    <div class="features-content">
                        <img src="<?php echo $row->cover ?>" alt="cover">
                        <p class="text"><?php echo $row->description ?></p>
                    </div>
                </div> <!-- single features -->
            </div>
        <?php } ?>
    </div> <!-- row -->
    <a href="index.php">Back</a>
</body>
</html>