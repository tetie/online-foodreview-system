<?php
session_start();

include 'connection.php';
if(!isset($_SESSION['user_id'])){
    $_SESSION['status'] = 'Something went wrong';
    header("location:login.php");
}
$user_id=$_SESSION['user_id'];


$data="select * from orders where user_id='$user_id' && status='0'";
$datarun=mysqli_query($conn,$data);
$rows=mysqli_fetch_all($datarun,MYSQLI_ASSOC);
$num=mysqli_num_rows($datarun);
$totalminprice =0;
$transactionid=time();
include 'header.php';
?>

<body>
<style>
    /*td,th{*/
    /*    border: 2px solid #ddd;*/
    /*}*/
</style>
<div style="background: #7C25;">
    <div style="width: 100vw;height: 100vh;" class="food d-flex flex-column  align-items-center">
        <div style="border: 1px solid blue; padding: 1rem;" class="w-50">
        <h2 class="text-center text-uppercase">My orders </h2>
        <form action="Foods/foodprocessor.php" method="post">
        <table class="table table-responsive-sm table-primary table-hover table-bordered">
            <thead>
            <tr>
                <th>item_id</th>
                <th>name</th>
                <th>Price</th>
                <th colspan="2">Operation</th>
            </tr>
            </thead>
            <tbody>



<?php


           foreach ($rows as $row){

            echo'<tr>
                <td>'.$row['item_id'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['price'].'</td>
                <td><button class="btn btn-primary">Edit</button></td>
                <td><button class="btn btn-primary">Delete</button></td>
                

            </tr>';
               $totalminprice +=$row['price'];
            }
?>
<!--           -->
          <tr>
                <th colspan="4">Total order price</th>
                <th colspan="1"><?php echo'KSH= '. $totalminprice; ?></th>
            </tr>
           </tbody>
        </table>
            <input type="number" hidden="" name="totalminprice" value="<?php echo $totalminprice; ?>">
            <input type="number" hidden="" name="transactionid" value="<?php echo $transactionid; ?>">




               <?php

               if($num=='0'){
                   echo '<h2>Start ordering for items before you checkout </h2>';
                   echo '<a href="food.php">shop now</a>';
               }
               else{
                   echo '<div class="d-flex mt-4 flex-column align-items-center justify-content-center">
                   <p class="text-center">Orders are always delivered within one hour after order is received</p>

                <div>
                <button class="btn btn-success btn-sm p-1 me-2">Chage time of delivery
                   </button><span>
                    <input type="time"  name="time" >
                </span>
                </div>
                <button type="submit" name="confirm_order" class="btn my-2 btn-primary w-75">Confirm Order</button>

                    </div>';
               }
               ?>
            <hr>



        </form>
            <p>We would like hearfrom you concerning the foods you have previously bought</p>
            <div class="d-flex mt-4 flex-column align-items-center justify-content-center">
            <a href="reviews.php" class="btn btn-danger btn-sm p-1 w-75">review now</a>
            </div>
        </div>
    </div>

</div>



