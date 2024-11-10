<?php include('partials-front/menu-front.php');?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center text-brown">Explore Categories</h2>

            <?php
            //display all categories that are active
            //query
            $sql="SELECT * FROM tbl_category WHERE active='Yes'";

            //execute query
            $res=mysqli_query($conn,$sql);

            
            //count rows 
            $count=mysqli_num_rows($res);
             
            //count whether categories available or not
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
                  <a href="<?php SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container ">
                        <?php
                        //check whether image is available or not
                        if($image_name=="")
                        {
                            //display message
                            echo"<div class='error'Image not Found </div>";
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
            </div>   
    </section>
    <div class="clearfix"></div>
    <!-- Categories Section Ends Here -->

<?php include('partials-front/footer-front.php');?>

<!-- Adding javascript -->
<script src="action/action.js"></script>