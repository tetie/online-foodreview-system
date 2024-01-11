<?php

include 'connection.php';
if(isset($_GET['order_now'])){
    $id=$_GET['id'];
}
$sql="select * from items where id='$id'";
$sqlrun=mysqli_query($con,$sql);
$items=mysqli_fetch_all($sqlrun,MYSQLI_ASSOC);
foreach ($items as $item){
    $price=$item["price"];
    $image=$item["image"];
    $name=$item["name"];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>orders</title>
    <link rel="stylesheet" href="css/stylo.css">
</head>
<body>
<?php include 'header.php';?>
<style>
    .itemdetails{
        width:100vw;
        height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .item{
        border: 1px solid #dda;
        width: 30rem;
        padding: 1rem;
        /*background-color: pink;*/
    }
</style>
<div class="itemdetails">
    <div class="item">
        <h4 style="text-align: center;text-transform: uppercase;"><?php echo $name; ?></h4>
        <img src="account/items/<?php echo $image ?>" alt="" width="100%" height="300">
        <div class="buydetails mt-3">
        <form action="orderprocessor.php" method="post">
            <div class="quantity">
                Quantity:
                <input type="number"  name="quantity" min="1">
            </div>
            <div class="quantity">
                <p>Orders are always delivered within one hour after order is requested</p>

                    <button class="btn btn-success btn-sm p-1 me-2">Chage time of delivery</button><span><input type="time"  name="quantity" min="1"></span>

            </div>

            <button type="submit" class="btn  mt-1 btn-danger w-100" name="confirm_order">Confirm Order</button>
         </form>
        </div>
        <p>We will be glad to hear from you concerning this food</p>
        <label for="">Comment</label>
        <form action="orderprocessor.php" method="post">
            <textarea name="comment" id="" cols="30" rows="3" class="form-control"></textarea>
            <button class="btn btn-primary w-100 mt-1" name="review">Comment</button>
        </form>
        </div>

    </div>

</div>
</body>
</html>