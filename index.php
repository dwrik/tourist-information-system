<?php
    include('database/connection.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tourist Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="navbar-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="navbar-btn d-none d-sm-inline-block">
                    <ul>
                        <li><a class="solid" href="admin/login.php">admin login</a></li>
                    </ul>
                </div>
            </nav> <!-- navbar -->
        </div> <!-- container -->
    </section>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider-content">
                            <h1 class="title">TOURIST INFORMATION SYSTEM</h1>
                            <p class="text">By Wrik Das and Pourab Roy
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="slider-image-box d-none d-lg-flex align-items-end">
                <div class="slider-image">
                    <img src="images/slider/1.png" alt="Hero">
                </div> <!-- slider-imgae -->
            </div> <!-- slider-imgae box -->
        </div> <!-- carousel-item -->
    </div>
</div>
    
<?php
    $query = 'SELECT * FROM CATEGORIES';
    $result = mysqli_query($conn, $query);
?>
    <section id="services" class="features-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-title text-center pb-10">
                        <h3 class="title">DESTINATIONS</h3>
                        <p class="text">
                            From the mighty Himalayas to the greenery of Gangetic planes, 
                            from serene beaches to mangrove estuaries - West Bengal is a land of many natural splendours.
                            Adding to its charm and appeal are the magnificent heritage architecture, colourful folk festivals,
                            beautiful arts and crafts, traditional and contemporary music, theatre and films and delicious ethnic
                            specialities that make West Bengal truly a brilliant experience offering unique diversities.
                        </p>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <?php while ($row = mysqli_fetch_object($result)) { ?>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="single-features mt-40">
                            <div class="features-title-icon d-flex justify-content-between">
                                <h4 class="features-title">
                                    <a href="destination.php?id=<?php echo $row->id ?>">
                                    <?php echo $row->name ?></a>
                                </h4>
    
                            </div>
                            <div class="features-content">
                                <img src="admin/<?php echo $row->cover ?>" alt="cover">
                                <p class="text"><?php echo $row->description ?></p>
                            </div>
                        </div> <!-- single features -->
                    </div>
                <?php } ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</body>
</html>