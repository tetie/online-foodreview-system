<?php
session_start();
if(!$_SESSION['user_id']){
    $_SESSION['login'] ='Login first to view that page';
    header('Location:login.php');
}
$user_id=$_SESSION['user_id'];
include "connection.php";
include "header.php";
?>
<style>
    .fodsfromdb{
        margin-top:1rem;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;gap:0.5rem;
    }
    .item{
        width: 26rem;
    }p-2
    .link{
        display: flex;
        justify-content: space-between;
    }
    .card{
        position:fixed;
        top:20rem;
        left:50rem;
        background-color:blue;
        height:24rem;
        width:41rem;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
    }
    @media screen and (max-width: 700px) and (min-width: 450px) {
        .fodsfromdb{
            margin-top:1rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap:0.5rem;
        }
        .item{
            width: 100%;
        }
    }
    @media screen and (max-width: 450px) and (min-width: 200px) {
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
<?php
if(isset($_SESSION['review'])){
    ?>
    <div>
        <div class="d-flex bg-success justify-content-between align-content-center p-2">

            <p class="text-center text-uppercase"><?php echo $_SESSION['review'] ?></p>
            <a class="btn btn-danger float-end" href="food.php">Close</a>
        </div>
    </div>
    <?php
    unset($_SESSION['review']);
}
?>
      <div   class="fodsfromdb">
          <?php

          $sql =  "SELECT i.name, i.id ,i.price,i.image,o.status FROM items i INNER JOIN orders o ON o.item_id = i.id WHERE o.user_id = '$user_id' && o.status=1 ";
          $sqlrun=mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($sqlrun)) {
              ?>
              <div style="border:1px solid grey;padding: 1px; border-radius: 7px;" class="item">
                  <div class="foodItem">

                          <img src="Foods/fooditems/<?php echo $row['image']; ?>" width="100%" height="300">


                  </div>
                  <div class="detail d-flex justify-content-between bg-gradient bg-info-subtle align-items-center p-1">
                      <h4 class="text-center "><?php echo $row['name']; ?></h4>
                      <p>Price Ksh: <?php echo $row['price']; ?></p>
                  </div>
                  <div class="review">

                      <form action="Foods/reviewsprocessor.php" method="post">


                      <p>comment</p>
                      <textarea name="comment"  id="" cols="15" rows="2" class="form-control"></textarea>
                          <input type="number" hidden="" name="food_id" value="<?php echo $row['id']; ?>">
                          <input type="text" hidden="" name="name" value="<?php echo $row['name']; ?>">
                     <div class="d-flex my-2 align-items-center justify-content-center">
                         <button name="review" type="submit" class="btn btn-primary w-75">comment</button>
                     </div>
                  </form>
                  </div>
              </div>
              <?php
          }

          ?>
      </div>