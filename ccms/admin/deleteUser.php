<?php
    include('../makeConnection.php');
    try
    {
        if(isset($_POST['deleteUser']))
        {
            if(mysqli_num_rows((mysqli_query($connect,"SELECT * FROM `admin` WHERE `UserId`='$_POST[userId]'")))==0)
            {
                mysqli_query($connect,"DELETE FROM `admin` WHERE `UserId`='$_POST[userId]'");
                echo ('<script type="text/JavaScript">alert("The User Has Been Deleted");</script>' );
            }
            else
            {
                echo ('<script type="text/JavaScript">alert("The User Does not Exist");</script>' );
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
            if(isset($signUpSuccess))
                echo("Sign Up Successful");
            if(isset($signUpFail))
                echo("Sign Up Failed")
        ?>
        <div class="container" id="bodyPage">
            <div class="heading">
                <h1>Delete a User</h1>
            </div>
            <div class="row">
                    <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="deleteUser.php">
                        <div class="form-group">
                            <label for="userId"> User ID</label>
                            <input type="text" name="userId" placeholder="Enter User ID" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" value="Delete" name="deleteUser" class="btn btn-primary">
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
