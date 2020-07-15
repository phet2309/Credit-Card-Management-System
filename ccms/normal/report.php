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
        <div class="container">
            <div class="heading" id="bodyPage">
                <h1>Account Report</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="report.php">
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" value="Get Summary" name="getSummary" class="btn btn-primary" id="button">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" value="Get Transactions" name="getTransactions" class="btn btn-primary" id="button">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <?php
                        try
                        {
                            if(isset($_POST['getSummary']))
                            {
                                include('getSummary.php');
                            }
                            if(isset($_POST['getTransactions']))
                            {
                                include('getTransactions.php');
                            }
                        }
                        catch(Exception $e)
                        {
                            $loginFail=$e->getMessage();
                        }    
                    ?>
                </div>
            </div>
        </div>
	</body>
</html>