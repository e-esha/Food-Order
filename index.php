<?php include('partials-front/menu-front.php');?>

<!-- Food search section -->
<div class="content">
    <section class="food-search text-center">
        <div class="container">
           <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food..." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
           </form>
        </div>
       </section>
  <!-- Food search section ends -->

  <?php
  if(isset($_SESSION['order']))
  {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
  }


?>

<!--categories section-->
    <section class="categories">
        <div class="container">
            <h2 class="text-center text-brown">Explore Categories</h2>

            <?php

            //create sql query to display categories from database
            // LIMIT 3
            $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'";

            //execute query
            $res=mysqli_query($conn,$sql);

            //count rows to check whether category is available or not
            $count=mysqli_num_rows($res);

            if($count>0)
            {
                //category available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values
                    $title=$row['title'];
                    $id=$row['id'];
                    $image_name=$row['image_name'];
                    ?>
                  <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id;?>">
                    <div class="box-3 float-container ">
                        <?php
                        //check whether image is available or not
                        if($image_name=="")
                        {
                            //display message
                            echo"<div class='error'Image not Available </div>";
                        }

                        else{
                            //image available
                            ?>
                             <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>"class="img-responsive img-curve"> 
                           

                            <?php
                        }
                        ?>
                       
                       <h3 class="float-text text-white" ><?php echo $title ?></h3>
                  </div>
                 </a>

                    <?php
                }
            }
            else{

                //category unavailable
                echo"<div class='error'>Category not found</div>";
            }
            ?>
        <div class="clearfix"></div>
        </div>
    </section>
    </div>

    <!--categories section end-->

   <!--Food Menu section-->
    <!-- <section class="food-menu">
     <div class="container">
       <h2 class="text-center">Food Menu</h2> -->

       <!-- <?php 
       //Getting foods from database that are active and featured
       //sql query LIMIT 6
    //    $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";

       //Execute query
       //$res2=mysqli_query($conn,$sql2);

       //count rows
       //$count2=mysqli_num_rows($res2);
             
       //count whether food available or not
    //    if($count2>0)
    //    {
        //food available
        // while($row=mysqli_fetch_assoc($res2))
        // {
            //get the values
            // $id=$row['id'];
            // $title=$row['title'];
            // $price=$row['price'];
            // $description=$row['description'];
            // $image_name=$row['image_name'];
            
            // ?>
            
        <div class="food-menu-box">
         <div class="food-menu-img">
            <?php
            
            //check whether image available or not
            //   if($image_name=="")
            //   {
                  //display message
            //       echo"<div class='error'Image not Available</div>";
            //   }

             // else{
                  //image available
                  ?>
                  <img src="<?//php echo SITEURL;?>images/food/<?//php echo $image_name;?>"class="img-responsive img-curve"> 
                 

                  <?php
             // }
            ?>
        </div>

        <div class="food-menu-desc">
          <h4><?php// echo $title;?></h4>
          <p class="food-price">Rs.<?php //echo $price;?></p>
          <p class="food-detail">
            <?php// echo $description;?>
        </p>
         <br>

         <a href="<?php //SITEURL?><?php //echo SITEURL; ?>order.php?food_id=<?php //echo $id; ?>" class="btn btn-primary">Order Now</a>
     </div>
 </div>

            <?php
//}
//}
      // else{
         //food unavailable
         //echo"<div class='error'>Food not available</div>";
      // }
       ?>
   <div class="clearfix"></div>
</div>

    <p class="text-center">
     <a href="#">See all Foods</a>
    </p>
</section>
    
 Food Menu section end -->
 <!-- Footer section -->
    <?php include('partials-front/footer-front.php');?>

    <!-- adding javascript -->
 <script src="action/action.js"></script>
 
    