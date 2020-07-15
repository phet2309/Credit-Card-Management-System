<?php
    $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `UserId`='$UserId'"));
    $query2=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$UserId'"));
    $query3=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `transaction` WHERE `UserId`='$UserId'"));
    $rows=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `transaction` WHERE `UserId`='$UserId'"));
    if($rows==0)
    {
        echo ('<script type="text/JavaScript">alert("You have made no transactions");</script>' );
    }
    while($rows--)
    {
        ?>
        <div class="row">
            <div class="col-sm-4">Transaction Id</div>
            <div class="col-sm-4">Sent To</div>
            <div class="col-sm-4">Date and Time</div>
        </div>
        <div class="row">
            <div class="col-sm-4"><?php echo($query3['TranId']) ?></div>
            <div class="col-sm-4"><?php echo($query3['To']) ?></div>
            <div class="col-sm-4"><?php echo($query3['Time']) ?></div>
        </div>
        <?php
    }
?>