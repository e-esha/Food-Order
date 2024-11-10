<?php include('partials-front/menu-front.php');?>
<?php
//check whether food id is set or not
if(isset($_GET['food_id']))
{
    //get food id and details  of selected food
    $food_id=$_GET['food_id'];

    //get the details of selected food
    $sql="SELECT * FROM tbl_food WHERE id=$food_id";

    //execute query
    $res=mysqli_query($conn,$sql);

    //count rows
    $count=mysqli_num_rows($res);

    //check whether data is available or not
    if($count==1)
    {
        //we have data 
        //get data from database
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
    }

    else
    {
        //food unavilable
        //redirect to homepage
        header("location:".SITEURL);
    }


}
else{
    //redirect to homepage
    header("location:".SITEURL);
}

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-brown">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                         if($image_name=="")
                         {
                             //image not available
                             echo"<div class='error'Image not Found </div>";
                         }
                         else{
                           //image available
                           ?>
                             
                             <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                             <?php
                         }

                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g.Esha tamang" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. abc.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="button btn btn-primary">
                </fieldset>

            </form>
            <?php

            //check whether button is clicked or not
            if(isset($_POST['submit']))
            {
                //get all details from form
                $food=$_POST['food'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $order_date=date("Y-m-d h:i:sa");
                $total=$price * $qty;
                $status="Ordered"; //ordered, ON delivery, delivered,cancelled

                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                
                //save order in database
                //create sql to save data

                $sql2="INSERT INTO tbl_order SET
                food='$food',
                price=$price,
                qty=$qty,
                total=$total,
                order_date='$order_date',
                status='$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email='$customer_email',
                customer_address='$customer_address'
                ";

                // echo $sql2;
                // die();

                //execute query
                $res2=mysqli_query($conn,$sql2);

                //check whether query executed successfully or not
                if($res2==true)
                {
                    //query executed and order saved
                    $_SESSION['order']="<div class='success text-center' >Food Ordered Successfully!</div>";
                    header("location:".SITEURL);
                }

                else
                {
                    // failed to save order
                    $_SESSION['order']="<div class='error text-center' >Failed to Order Food!</div>";
                    header("location:".SITEURL);
                }


            }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer-front.php');?>

    <!-- Adding javascript -->
<script src="action/action.js"></script>