<?php
    include('makeConnection.php');
    try
    {
        if(isset($_POST['login']))
        {
            if($query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `admin` WHERE `UserName`='$_POST[userName]' AND `UserType`='$_POST[userType]'")))
            {
                $UserId=$query1['UserId'];
                $UserName=$query1['UserName'];
                session_start();
			    $_SESSION['sessionName']='ccms';
			    $_SESSION['userId']=$UserId;
			    $_SESSION['userName']=$UserName;
			    header('location:normal/index.php');
            }
            else
            {
                echo ('<script type="text/JavaScript">alert("The Entered Details are Wrong");</script>' );
            }
        }
    }
    catch(Exception $e)
    {

    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
		<link href="css/zima.css" rel='stylesheet' type='text/css'/>
	</head>
	<body>
        <div class="container" id="bodyPage">
            <div class="heading">
                <h1> Login Page</h1>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="index.php">
                        <div class="form-group">
                            <label for="userName"> User Name</label>
                            <input type="text" name="userName" id="userName" placeholder="Enter Your Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password"> Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Your Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="userType" value="admin" class="form-check-input" id="radio1" checked>
                                    <label for="radio1" class="form-check-label">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="userType" value="normal" class="form-check-input" id="radio2">
                                    <label for="radio2" class="form-check-label">Normal</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" value="Login" name="login" class="btn btn-primary" id="button">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                   <?php include('helpSearch.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col text-center" id="loginSignUp">
                    <p>Dont have an account?</p>
                    <p><a href="signUp.php">Sign Up</a></p>
                </div>
            </div>
        </div>
	</body>
</html>