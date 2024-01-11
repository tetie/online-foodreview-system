<?php
include 'connection.php';
session_start();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JKS | Food</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/JKS-icons.css">
<link rel="stylesheet" type="text/css" href="css/settings.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="css/zerogrid.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/loader.css">
<link rel="shortcut icon" href="images/favicon.png">

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
<style>
    .fodsfromdb{
        margin-top:1rem;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;gap:0.5rem;
    }
    .item{
        width: 40rem;
    }
    .link{
        display: flex;
        justify-content: space-between;
    }

    @media screen and (max-width: 500px) and (min-width: 200px) {
        .fodsfromdb{
            margin-top:1rem;
            display: grid;
            grid-template-columns: 1fr;
            gap:0.5rem;
        }
        .item{
            width: 100%;
        }
    }
</style>
<!--Loader-->
<div class="loader"> 
   <div class="cssload-container">
     <div class="cssload-circle"></div>
     <div class="cssload-circle"></div>
   </div>
</div>

<!--Top bar-->


<!--Topbar-->
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs">JKS Foods and Restaurant, the Best in Town</p>
        <p class="pull-right"><i class="fa fa-phone"></i>Order Online +254-892-808-5056</p>
      </div>
    </div>
  </div>
</div>
    <?php
    if(isset($_SESSION['order'])){
        ?>

            <div style="display: flex; padding-right: 2rem; background: #0f5132;padding-left: 2rem; align-items: center; justify-content: space-between;" class="">
                <div class="">
                    <p style="font-size: 27px;" class="text-center p-3 bg-secondary text-uppercase"><?php echo $_SESSION['order'] ?></p>

                </div>
                <div class="pe-4">
                  <a class="btn btn-primary   my-2" href="food.php">Close</a>
              </div>
            </div>

        <?php
        unset($_SESSION['order']);
    }
    ?>

<!--Header-->
<header id="main-navigation">
  <div id="navigation" data-spy="affix" data-offset-top="20">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar" aria-expanded="false"> 
            <span class="icon-bar top-bar"></span> <span class="icon-bar middle-bar"></span> <span class="icon-bar bottom-bar"></span> 
            </button>
           <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo" class="img-responsive"></a>
         </div>
        
            <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li>
                   <a href="index.php">Home</a>
                   
                </li>
                <li><a href="food.php">Our Food</a></li>
                
                
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                  
                <li><a href="confirmorder.php">Order Now</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">REGISTER</a></li>
              </ul>
            </div>
         </nav>
         </div>
       </div>
     </div>
  </div>
</header>

<!--Featured Receipes -->
<section id="news" class="bg_grey padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
      <h2 class="heading">General menu</h2>
      <hr class="heading_space">
      </div>
    </div>

      <div   class="fodsfromdb">
          <?php

          $sql =  "SELECT *  FROM items";
          $sqlrun=mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($sqlrun)) {
              ?>
              <div style="border:1px solid grey;padding: 1px; border-radius: 7px;" class="item">
                  <div class="foodItem">
                      <p style="text-align: center; font-size: 19px; background-color: #0dcaf0;"><?php echo $row['name']; ?></p>
                          <img src="Foods/fooditems/<?php echo $row['image']; ?>" width="100%" height="300">


                  </div>
                  <br>
                  <div class="link">
                          <form action="orderprocessor.php" method="post">
                              <input type="number" hidden="" name="id" value="<?php echo $row['id']; ?>">
                              <input type="number" hidden="" name="price" value="<?php echo $row['price']; ?>">
                              <input type="text" hidden="" name="name" value="<?php echo $row['name']; ?>">
                             <button style="width: 16rem;" name="add_order" class="btn btn-danger">Add order to cart</button>
                          </form>
                      <div>
                          <a style="width: 16rem;"  class="btn btn-info" href="order_details.php?id=<?php echo $row['id'] ?>&order_now=">
                              View order details
                          </a> </p>
                      </div>
                  </div>
              </div>
              <?php
          }

          ?>
      </div>
  </div>
</section>


<!-- testinomial -->
<section id="testinomial" class="padding">
  <div class="container">
  <div class="row">
      <div class="col-md-12 text-center">
      <h2 class="heading">Our &nbsp; happy &nbsp; Customers</h2>
      <hr class="heading_space">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <div id="testinomial-slider" class="owl-carousel text-center">
        <div class="item">
          <h3>Awesome Food. Food from some of the finest restaurants in Nairobi!</h3>
          <p>Boniface ndolo</p>
        </div>
        <div class="item">
          <h3>Good Recipes, Nice staff and customer care. A good service overall</h3>
          <p>Alex Mutuku</p>
        </div>
        <div class="item">
          <h3>Awesome Food. Food from some of the finest restaurants in Nairobi!</h3>
          <p>Shane Robertson</p>
        </div>
       </div>
      </div>
    </div>
  </div>
</section>


<!--Footer-->
<footer class="padding-top bg_black">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Who are we?</h4>
        <hr class="half_space">
        <p class="half_space"></p>
        <p>Launched in Nairobi, JKS has grown from a home project to one of the largest food aggregators in the world. We are present in 24 countries and 10000+ cities globally, enabling our vision of better food for more people. We not only connect people to food in every context but work closely with restaurants to enable a sustainable ecosystem.</p>
      </div>
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Quick Links</h4>
        <hr class="half_space">
        <ul class="widget_links">
          <li><a href="startindex.php">Home</a></li>
          <li><a href="food.html">Our Food</a></li>
          <li><a href="about.html">About Us</a></li>
          
          <li><a href="faq.html">Faq's</a></li>
          <li><a href="./account/register.php">Order Now</a></li>
          
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Newsletter</h4>
        <hr class="half_space">
        <p class="icon"><i class="icon-dollar"></i>Sign up with your name and email to get updates fresh updates.</p>
        <div id="result1" class="text-center"></div>        
        
       <form action="http://themesindustry.us13.list-manage.com/subscribe/post-json?u=4d80221ea53f3a4487ddebd93&id=494727d648&c=?" method="get" onSubmit="return false" class="newsletter">
          <div class="form-group">
            <input type="email" placeholder="E-mail Address" required name="EMAIL" id="EMAIL" class="form-control" />
          </div>
          <div class="form-group">
            <input type="submit" class="btn-submit button3" value="Subscribe" />
          </div>
        </form>
      </div>
      <div class="col-md-3 col-sm-6 footer_column">
        <h4 class="heading">Get in Touch</h4>
        <hr class="half_space">
        <p></p>
        <p class="address"><i class="icon-location"></i>JKS, Opposite S.L.Raheja Hospital, Moi Avenue, Nairobi.</p>
        <p class="address"><i class="fa fa-phone"></i>(+254) 892 808 5056</p>
        <p class="address"><i class="icon-dollar"></i><a href="office@jks.com">office@jks.com</a></p>
      </div> 
    </div>
    <div class="row">
     <div class="col-md-12">
        <div class="copyright clearfix">
          <p>Copyright &copy; 2023 JKS. All Right Reserved</p>
          <ul class="social_icon">
               <li><a href="#" class="facebook"><i class="icon-facebook5"></i></a></li>
               <li><a href="#" class="twitter"><i class="icon-twitter4"></i></a></li>
               <li><a href="#" class="google"><i class="icon-google"></i></a></li>
              </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<a href="#" id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

<script src="js/jquery-2.2.3.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/jquery.appear.js"></script>  
<script src="js/jquery-countTo.js"></script> 
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/functions.js" type="text/javascript"></script>

</body>
</html>
