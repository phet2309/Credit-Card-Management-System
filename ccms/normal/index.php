<?php
    ob_start();
    session_start();
    if($_SESSION['sessionName']!='ccms')
    {   
        header('location: ../index.php');
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
                <h1>Welcome to Credit Card Management</h1>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="normalMenu">
                    <div class="row" id="normalOptions">
                        <div class="col text-center"><p><a href="report.php">Get account details</a></p></div>
                    </div>
                    <div class="row" id="normalOptions">
                        <div class="col text-center"><p><a href="transfer.php">Transfer Money</a></p></div>
                    </div>
                    <div class="row" id="normalOptions">
                        <div class="col text-center"><p><a href="loan.php">Get a Loan</a></p></div>
                    </div>
                    <div class="row" id="normalOptions">
                        <div class="col text-center"><p><a href="repayLoan.php">Repay Loan</a></p></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php include('helpSearch.php'); ?> 
                </div>
            </div>
        </div>
	</body>
</html>