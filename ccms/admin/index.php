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
        <div class="container"  id="bodyPage">
            <div class="heading">
                <h1>Welcome to Credit Card Management</h1>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="adminMenu">
                    <div class="row" id="adminOptions">
                        <div class="col text-center"><p><a href="addUser.php">Add User</a></p></div>
                    </div>
                    <div class="row" id="adminOptions">
                        <div class="col text-center"><p><a href="deleteUser.php">Delete User</a></p></div>
                    </div>
                    <div class="row" id="adminOptions">
                        <div class="col text-center"><p><a href="addDesc.php">Add a Description</a></p></div>
                    </div>
                    <div class="row" id="adminOptions">
                        <div class="col text-center"><p><a href="getTransactions.php">Get Transactions Details</a></p></div>
                    </div>
                    <div class="row" id="adminOptions">
                        <div class="col text-center"><p><a href="getLoans.php">Get Loan Details</a></p></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php include('helpSearch.php'); ?>
                </div>
            </div>
        </div>
	</body>
</html>