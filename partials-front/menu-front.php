<?php include('C:/xampp/htdocs/food-order/admin/config/constant.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    

    <section class="navbar">
     <div class="container sticky-nav">
     <div class="logo">
        <!-- <a href="#" title="Logo"> -->
        <!-- <img src="./images/logo.jpg" alt="Restaurant Logo" class="img-responsive"> -->
        <h3>Dhulikhel Restuarant</h3>
    <!-- </a> -->
     </div>

     <div class="menu text-right ">
       <ul>
        <li><a href="<?php echo SITEURL;?>">Home</a>
        </li>

        <li><a href="<?php echo SITEURL;?>categories.php">Categories</a>
        </li>

        <li><a href="<?php echo SITEURL;?>foods.php">Foods</a>
        </li>

        <li><a href="<?php echo SITEURL;?>contact.php">Contact Us</a>
        </li>

        <li><a href="<?php echo SITEURL; ?>partials-front/login-front.php">Log In</a>
        </li>
       </ul>
     </div>

     <div class="clearfix"></div>
    </div>
    </section>
    </body>
</html>