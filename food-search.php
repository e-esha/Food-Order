<?php include('partials-front/menu-front.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
              //get the search keyword
              $search=mysqli_real_escape_string($conn,$_POST['search']);

             ?>
            
            <h2>Foods on Your Search <a href="#" class="text-brown"><?php echo "'$search'" ;?></a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
        
            <?php

            //sql query to get foods based on search keyword
            //$search=momo
            //SELECT * FROM tbl_food WHERE title LIKE '%momo'%' OR description LIKE'%momo'%';
            $sql="SELECT * FROM tbl_food WHERE title LIKE'%$search%' OR description LIKE '%$search%'";
            // echo $sql;

            //execute query
            $res=mysqli_query($conn,$sql);

            //count rows
            $count=mysqli_num_rows($res);

            //check whether food available or not
            if($count>0)
            {
                //food available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values
                    $id=$row['id'];
                    $title=$row['title'];  
                    $image_name=$row['image_name'];
                    $price=$row['price'];
                    $description=$row['description'];
                    ?>

                <div class="food-menu-box">
                  <div class="food-menu-img">

                  <?php
                  //check whether image name is available or not
                  if($image_name=="")
                  {
                    //image not available
                    echo"<div class='error'>Image not Found </div>";

                  }
                  else{
                    //image available
                     ?>
                     <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>"  alt="<?php echo $title; ?>" class="img-responsive img-curve">

                    <?php

                  }

                  ?>
               </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">Rs.<?php echo $price;?></p>
                    <p class="food-detail">
                      <?php echo $description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

                </div>
            </div>


                    <?php
                }
                    
            }

            else{
                //food unavailable
                echo"<div class='error'>Food not Found </div>";

            }

            ?>
        </div>
        <div class="clearfix"></div>
    </section>

    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer-front.php');?>

    <!-- Adding javascript -->
<script src="action/action.js"></script>