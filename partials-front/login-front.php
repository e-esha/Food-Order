<?php include('menu-front.php');?>
<link rel="stylesheet" href="../css/style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../admin/css/admin1.css">

<div class="wrapper">
    <form action="" method="post">
        <h1>Login</h1>
        <div class="input-box">
        <input type="text" placeholder="Username" required>
        <i class='bx bxs-user' ></i>
        </div>

        <div class="input-box">
            <input type="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="remember-forgot">
         <label><input type="checkbox">Remember Me </label>
                <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn">LogIn</button>

        <div class="register-link">
            <p>Don't have an account? <a href="">Register</a></p>
        </div>
    </form>
</div>
    
<?php include('footer-front.php');?>