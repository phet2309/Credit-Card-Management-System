<?php
	$connect=mysqli_connect('localhost','root','hellozima') or die('Cannot connect to server');
	mysqli_select_db($connect,'ccmsdatabase') or die ('Cannot find database');
?>