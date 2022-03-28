<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Designs\bootstrap\css\bootstrap.min.css">
    <script src="Design\bootstrap\js\bootstrap.min.js"></script>
    <link rel="stylesheet" href="Designs\fontawesome\css\all.css">
    <link rel="stylesheet" href="Designs\fontawesome\css\fontawesome.min.css">
    <link rel="stylesheet" href="Designs\Style.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

    <title>Research Store</title>
</head>
<body>
    <div class="custom">
    <div class="container NavBar">
    <nav class="navbar navbar-expand-md navbar-light">
    <a href="home.php" class="navbar-brand">

        <img style="width:79px; height:40px;" src="/Picture/Wix-Logo.png" class="logo"  alt="" srcset="" />

    </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#toggleMobileMenu"
            aria-controls="toggleMobileMenu"
            aria-expanded="false"
            ria-label="Toggle Navigation" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  " id="toggleMobileMenu">
                <ul class=" text-center navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"  href="men.php">Men</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="women.php">Women</a>
                     </li>
                </ul>

                <ul class="text-center navbar-nav mb-2 mb-lg-0 "><li><a class="nav-link  mx-2" href="mycard.php">My Card
                            <?php
                                if (isset($_SESSION['card'])){
                                    $count=count($_SESSION['card']);
                                    echo "<span id=\"card_counter\">$count</span>";
                                }else{
                                    echo "<span id=\"card_counter\">0</span>";
                                }

                            ?>


                        </a></li></ul>

                <form class="d-flex" action="registor.php" method="post">


                <a class="btn btn-outline-success mx-2">Search</a>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                </form>
            </div>

    </nav>
    </div>

    </div>
