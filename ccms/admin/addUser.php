<?php
    include('../makeConnection.php');
    try
    {
        if(isset($_POST['addUser']))
        {
            if(empty($_POST['userName']))
                throw new Exception("User Name can't be empty.");
            if(empty($_POST['password']))
                throw new Exception("Password can't be empty.");
            if(empty($_POST['dob']))
                throw new Exception("DOB can't be empty.");
            if(empty($_POST['credit']))
                throw new Exception("Credit can't be empty.");

            if(mysqli_num_rows((mysqli_query($connect,"SELECT * FROM `admin` WHERE `UserName`='$_POST[userName]'")))<=0)
            {
                mysqli_query($connect,"INSERT INTO `admin`(`Password`,`UserName`,`UserType`) VALUES('$_POST[userName]','$_POST[password]','$_POST[userType]')");
                $query1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `admin` WHERE `UserName`='$_POST[userName]'"));
                $UserId=$query1["UserId"];
                mysqli_query($connect,"INSERT INTO `report`(`UserId`,`Credit`,`loan`) VALUES($UserId,$_POST[credit],$_POST[loan])");
                mysqli_query($connect,"INSERT INTO `user`(`UserId`,`UserName`,`Password`,`UserDOB`,`CardType`) VALUES($UserId,'$_POST[userName]','$_POST[password]','$_POST[dob]','$_POST[cardType]')");
                echo ('<script type="text/JavaScript">alert("The User Has Been Added");</script>' );

            }
            else
            {
                echo ('<script type="text/JavaScript">alert("The User Has Been Taken");</script>' );
            }
        }
    }
    catch(Exception $e)
    {
        $signUpFail=$e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Credit Card Management System</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/zima.css"> 
    </head>
    <body>
        <?php
            include('navbar.php');
        ?>
        <div class="container" id="bodyPage">
            <div class="heading">
                <h1>Add a User</h1>
            </div>
            <div class="row">
                    <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="addUser.php">
                        <div class="form-group">
                            <label for="userName"> User Name</label>
                            <input type="text" name="userName" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password"> Password</label>
                            <input type="password" name="password" placeholder="Enter User Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="text" name="dob" placeholder="YYYY-MM-DD" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="credit">Initial Credit</label>
                            <input type="text" name="credit" placeholder="Add Initial Credit" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="credit">Initial Loan</label>
                            <input type="text" name="loan" placeholder="Add Initial Loan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="userType">User Type</label>
                            <select name="userType" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="normal">Normal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cardType">Card Type</label>
                            <select name="cardType" class="form-control">
                                <option value="bronze">Bronze</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platinum">Platinum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" value="Add" name="addUser" class="btn btn-primary">
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
