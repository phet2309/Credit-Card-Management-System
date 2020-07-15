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
        if(isset($_POST['repayLoan']))
        {
            $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$UserId'"));
            $Credit=$query1['Loan']-$query1['Credit'];

            if($Credit>$Loan)
            {
               mysqli_query($connect,"UPDATE `report` SET `loan`=`0`,`credit`=$Credit WHERE `UserId`='$UserId'");
               echo ('<script type="text/JavaScript">alert("You Loan has been repaid");</script>' );
            }
            else
            {
                echo ('<script type="text/JavaScript">alert("You do not have enough credit.");</script>' );
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
                <h1>Loan Repay Portal</h1>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="loanMenu">
                    <?php   
                        $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`=$UserId"));
                        if($query1['Loan']==0)
                        {
                            echo ('<script type="text/JavaScript">alert("You do not have any loans.");</script>' );
                        }
                    ?>
                    <div class="row">
                        <h2><?php echo("Available Balance: ".$query1['Credit']); ?></h2>
                        <h2><?php echo("Amount Due: ".$query1['Loan']); ?></h2>
                    </div>
                    <form method="post" action="repayLoan.php">
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" name="repayLoan" id="button" value="Repay Loan" class="btn btn-primary">
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