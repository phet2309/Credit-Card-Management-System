<?php
    include('../makeConnection.php');
    try
    {
        if(isset($_POST['addDesc']))
        {
            mysqli_query("INSERT INTO `help`(`helpInfo`,`helpDesc`) VALUES($_POST[helpInfo],$_POST[helpDesc])");
            echo ('<script type="text/JavaScript">alert("The Description Has been added");</script>' );

        }
    }
    catch(Exception $e)
    {

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
        <div class="container">
            <div class="heading">
                <h1>Add a Description</h1>
            </div>
            <div class="row">
                    <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="deleteUser.php">
                        <div class="form-group">
                            <label for="helpInfo">Enter Title</label>
                            <input type="text" name="helpInfo" placeholder="Enter Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="helpDesc">Enter Description</label>
                            <input type="text" name="helpDesc" placeholder="Enter Description" class="form-control" id="descBox">
                        </div>
                        <div class="form-group">
                            <div class="col text-center">
                                <input type="submit" value="Add" name="addDesc" class="btn btn-primary">
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
