<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'>
<link href="css/zima.css" rel='stylesheet' type='text/css'>
<?php
    $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `UserId`='$UserId'"));
    $query2=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$UserId'"));
    $query3=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `transaction` WHERE `UserId`='$UserId'"));
?>
<div>
    <div class="row" id="summaryRow">
        <div class="col-sm-6" id="summaryCol">Card Number</div>
        <div class="col-sm-6" id=summaryCol><?php echo($query1['UserId']) ?></div>
    </div>
    <div class="row" id="summaryRow">
        <div class="col-sm-6" id="summaryCol">User Name</div>
        <div class="col-sm-6" id=summaryCol><?php echo($query1['UserName']) ?></div>
    </div>
    <div class="row" id="summaryRow">
        <div class="col-sm-6" id="summaryCol">DOB</div>
        <div class="col-sm-6" id=summaryCol><?php echo($query1['UserDOB']) ?></div>
    </div>
    <div class="row" id="summaryRow">
        <div class="col-sm-6" id="summaryCol">Card Type</div>
        <div class="col-sm-6" id=summaryCol><?php echo($query1['CardType']) ?></div>
    </div>
    <div class="row" id="summaryRow">
        <div class="col-sm-6" id="summaryCol">Credit</div>
        <div class="col-sm-6" id=summaryCol><?php echo($query2['Credit']) ?></div>
    </div>
    <div class="row" id="summaryRow">
        <div class="col-sm-6" id="summaryCol">Loan Due</div>
        <div class="col-sm-6" id=summaryCol><?php echo($query2['Loan']) ?></div>
    </div>
</div>