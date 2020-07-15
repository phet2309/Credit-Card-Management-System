<?php
    include('../makeConnection.php');
    ob_start();
    session_start();
    if($_SESSION['sessionName']!='ccms')
    {   
        header('location:../index.php');
    }
    $UserId=$_SESSION['userId'];
    $UserName=$_SESSION['userName'];
    try
    {
        if(isset($_POST['transferMoney']))
        {
            $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$UserId'"));
            $query2=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `UserId`='$_POST[receiverId]'"));
            if($query2['UserId']==$_POST['receiverId'])
            {
                if($query1['Credit']>=$_POST['amount'])
                {
                    $query3=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$UserId'"));
                    $query4=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$_POST[receiverId]'"));
                    $senderCredit=$query3['Credit']-$_POST['amount'];
                    $senderLoan=$query3['Loan'];
                    $receiverCredit=$query4['Credit']+$_POST['amount'];
                    $receiverLoan=$query4['Loan'];
                    $query5=mysqli_query($connect,"DELETE FROM `report` WHERE `UserId`='$UserId'");
                    $query6=mysqli_query($connect,"DELETE FROM `report` WHERE `UserId`='$_POST[receiverId]'");
                    $query7=mysqli_query($connect,"INSERT INTO `report`(`UserId`,`Credit`,`Loan`) VALUES($UserId,$senderCredit,$senderLoan)");
                    $query8=mysqli_query($connect,"INSERT INTO `report`(`UserId`,`Credit`,`Loan`) VALUES($_POST[receiverId],$receiverCredit,$receiverLoan)");
                    $query9=mysqli_query($connect,"INSERT INTO `transaction`(`UserId`,`To`,`Date`) VALUES($UserId,$_POST[receiverId])");
                    echo ('<script type="text/JavaScript">alert("The amount has been transferred");</script>' );

                }
                else
                {
                    echo ('<script type="text/JavaScript">alert("You do not have enough balance");</script>' );
                }
            }
            else
            {
                echo ('<script type="text/JavaScript">alert("The receiver ID and name does not match");</script>' );
            }
        }
    }
    catch(Exception $e)
    {
        $loginFail=$e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
		<link href="../css/zima.css" rel='stylesheet' type='text/css'/>
	</head>
	<body>
		<?php include('../makeConnection.php');?>
        <?php include('navbar.php');?>
        <div class="container" id="bodyPage">
            <div class="heading">
                <h1>Transfer Portal</h1>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="loanMenu">
                    <form method="post" action="transfer.php">
                        <div class="form-group">
                            <label for="recieverId">Receiver's Id</label>
                            <input type="text" name="receiverId" id="receiverId" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recieverName">Receiver's Name</label>
                            <input type="text" name="receiverName" id="receiverName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="amount">Transfer Amount</label>
                            <select name="amount" id="amount" class="form-control">
                                <option value="5000">5000</option>
                                <option value="5000">10000</option>
                                <option value="5000">15000</option>
                                <option value="5000">20000</option>
                                <option value="5000">25000</option>
                                <option value="5000">30000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" name="transferMoney" id="button" value="Transfer Money" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>      
                <div class="col-md-4">
                    <?php include('helpSearch.php'); ?>
                </div>
            </div>
        </div>
	</body>
</html>