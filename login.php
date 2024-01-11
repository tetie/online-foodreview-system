<?php
 session_start();
 ?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<?php include 'header.php'; ?>
<style>

</style>
<body style="background-image:url('Foods/fooditems/2865fgcjnf.jpeg');background-size: cover;background-color: white;height: 90vh;">
<div class="row m-1 mb-4 d-flex align-items-center justify-content-center">

    <div  style="width: 23rem;" class="form border bg-white pt-5 mt-4 mb-3 rounded">
        <form action="processor.php" method="post">
            <h2 class="text-center text-uppercase">Login</h2>
            <?php

            if(isset($_SESSION['login'])){
                ?>
                <div>
                    <p class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['login']; ?> ?</p>
                </div>
                <?php
                unset($_SESSION['login']);
            }
            ?>
            <form method="post" action="processor.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input  type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control boxshadow" >
                </div>
                <button style="color: blue;" type="submit" name="login" class="btn text-uppercase btn-outline-primary w-100">Login</button>

                <div class="d-flex justify-content-between">

                   <span>Don't remember password?</span> <a  class="" href="forgetpassword.php">Click here</a>
                </div>
            </form>
            <p class="text-center text-uppercase" > <a  href="register.php">Dont have an Account?</a></p>
    </div>
</div>
</div>
</body>
</html>
