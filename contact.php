<?php include('partials-front/menu-front.php');?>
<link rel="stylesheet" href="css/styles.css">
<?php

if(isset($_SESSION['contact']))
  {
    echo $_SESSION['contact'];
    unset($_SESSION['contact']);
  }
  ?>
    <div class="contact-container">
        <h1 class="text-brown">Contact Us</h1>

        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
             <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" title="Enter a valid 10-digit phone number" required> <!-- pattern="[0-9]{10}" -->

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {

    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

     // Validate email
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['contact'] = "<div class='error text-center'>Invalid email format!</div>";
        header('location:'.SITEURL.'contact.php');
        exit();
    }
    
 // Insert into database
    $sql = "INSERT INTO tbl_contact(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
   
    //execute query
    $res=mysqli_query($conn,$sql);

    //check whether query executed successfully or not
    if($res==true){

//Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

   try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eshatamang999@gmail.com';                     //SMTP username
    $mail->Password   = 'mgod qqaw vufc ooge';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('eshatamang999@gmail.com', 'Contact Form');
    $mail->addAddress('eshatamang999@gmail.com', 'Food-Order Website');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact Form Submission';
    $mail->Body    = "Name: $name<br/> Email: $email <br/> Phone: $phone<br/> Message: $message";


    $mail->send();
    $_SESSION['contact'] = "<div class='success text-center'>Thank you for contacting us, $name.</div>";
} 

catch (Exception $e)
 {
    $_SESSION['contact'] = "<div class='error text-center'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
}

 // Redirect to contact page
 header('location:'.SITEURL.'contact.php');
}
      else
    {
       // failed to save contact
        $_SESSION['contact']="<div class='error text-center' >Failed to save</div>";
        header('location:'.SITEURL.'contact.php');
    }
}
?>
<?php include('partials-front/footer-front.php');?>