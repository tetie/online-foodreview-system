<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylo.css">
</head>
<body>
<style>
    .users{
        background-color: #a4b0be;
        margin: 5rem;
        width:15rem;
        border-radius: 7px;
    }
</style>
<h2>Generate report</h2>
<div class="d-flex justify-content-center align-content-center">

    <div class="users">

        <h4 class="text-center m-1">Reviews</h4>


        <div style="display: grid;justify-content: center;" class="m-4  align-items-center">
            <form action="recentreviews.php" method="post">
                <button type="submit" class="btn btn-success">recent reviews</button>
            </form>

        </div>
        <div style="display: grid;justify-content: center;" class="m-4 align-items-center">
            <button class="btn btn-primary">Advanced Report</button>

        </div>
    </div>
    <div class="users">

        <h4 class="text-center m-1">Orders</h4>

        <div style="display: grid;justify-content: center;" class="m-4 align-items-center">
            <form action="recentorders.php" method="post">
                <button type="submit" class="btn btn-success">recent orders</button>
            </form>
        </div>
        <div style="display: grid;justify-content: center;" class="m-4 align-items-center">
            <button class="btn btn-primary">Advanced Report</button>

        </div>
    </div>
</div>
<div class="advance d-flex w-100 justify-content-center">
    <div style="background: white; border:1px solid green;margin:1rem;width: 17rem;padding: 1rem;" class="filter">
        <form action="reports/advancedorders.php"  method="post">

            <p>Enter period to Genarate report on orders</p>
            <hr>
            <label for="">Enter Date from</label><br><br>
            <input type="date" required name="from" ><br><br>
            <label for="">Enter Date To</label><br><br>
            <input type="date" required name="to" ><br><br>
            <button class="btn btn-primary" name="report" type="submit">Generate Report</button>
        </form>
    </div>  <div style="background: white; border:1px solid green;margin:1rem;width: 17rem;padding: 1rem;" class="filter">
        <form action="reports/advancereviews.php" method="post">
            <p>Enter period to Genarate report on Reviews</p>
            <hr>
            <label for="">Enter Date from</label><br><br>
            <input type="date" required name="from" ><br><br>
            <label for="">Enter Date To</label><br><br>
            <input type="date" required name="to" ><br><br>
            <button class="btn btn-primary" name="report" type="submit">Generate Report</button>
        </form>
    </div>
</div>
</body>
</html>