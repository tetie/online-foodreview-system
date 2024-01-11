<div id="bids_content" class="bids">

    <table  class="table table-bordered table-hover m-3">
        <tr>
            <th>id</th>
            <th>Item Name</th>
            <th>Bid amount</th>
            <th>Date</th>
            <th>time</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php

        $items="select * from users where id ='$user_id'";

        $items_run=mysqli_query($conn,$items);
        while($posts=mysqli_fetch_assoc($items_run)) {
            ?>

            <tr>
                <td><?php echo $posts['id']?></td>
                <td><?php echo $posts['name']?></td>

                <td><?php echo $posts['email']?></td>
                <td><?php echo $posts['phone']?></td>
                <td><?php echo $posts['time']?></td>
                <td>
                    <form action="dashboard.php" method="post">
                        <input type="text" hidden="" name="item_id" value="<?php echo $posts['id']?>">
                        <button type="submit" class="btn btn-outline-info btn-primary" name="cancel"> Cancel Bid</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>


    </table>

</div>
<div id="success_bids" class="successbids">

    <table  class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>Item Name</th>
            <th>Bid amount</th>
            <th>Date</th>
            <th>time</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php

        $items="select * from biddings where user_id ='$uid'";

        $items_run=mysqli_query($conn,$items);
        while($posts=mysqli_fetch_assoc($items_run)) {
            ?>

            <tr>
                <td><?php echo $posts['id']?></td>
                <td><?php echo $posts['item_name']?></td>

                <td><?php echo $posts['bid_amount']?></td>
                <td><?php echo $posts['date']?></td>
                <td><?php echo $posts['time']?></td>
                <td>
                    <form action="dashboard.php" method="post">
                        <input type="text" hidden="" name="item_id" value="<?php echo $posts['id']?>">
                        <button type="submit" class="btn btn-outline-info btn-primary" name="cancel"> Cancel Bid</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>


    </table>

</div>