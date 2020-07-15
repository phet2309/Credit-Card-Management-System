
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
        if(isset($_POST['getLoan']))
        {
            $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `report` WHERE `UserId`='$UserId'"));
            $Credit=$query1['Credit'];
            $Loan=$query1['Loan']+$_POST['loanAmount'];
            if((3*$Credit)>($_POST['loanAmount']))
            {
                mysqli_query($connect,"DELETE FROM `report` WHERE `UserId`='$UserId'");
                mysqli_query($connect,"INSERT INTO `report`(`UserId`,`Credit`,`Loan`) VALUES($UserId,$Credit,$Loan)");
                mysqli_query($connect,"INSERT INTO `loan`(`BorrowerId`,`Amount`) VALUES($UserId,$_POST[loanAmount])");

                echo ('<script type="text/JavaScript">alert("Congratulations, you have been granted the loan");</script>' );
            }
            else 
            {
                echo ('<script type="text/JavaScript">alert("You do not have enough credit");</script>' );

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
                <h1>Loan Borrow Portal</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3><?php echo"welcome ".$UserName."<br>";?></h3>
                </div>
                <div class="col-md-4" id="loanMenu">
                    <form method="post" action="loan.php">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Enter Your User Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="loanAmout">Loan Amount</label>
                            <select name="loanAmount" id="loanAmount" class="form-control">
                                <option value="10000">10000</option>
                                <option value="20000">20000</option>
                                <option value="30000">30000</option>
                                <option value="40000">40000</option>
                                <option value="50000">50000</option>
                                <option value="100000">100000</option>
                                <option value="150000">150000</option>
                                <option value="200000">200000</option>
                                <option value="300000">300000</option>
                                <option value="500000">500000</option>
                            </select>
                            <small id="loanNotice" class="form-text text-muted">The loan amount depends on the card type of the user.</small>
                        </div>
                        <div class="form-group">
                        <div class="col text-center">
                            <input type="submit" value="Get Loan" name="getLoan" class="btn btn-primary">
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