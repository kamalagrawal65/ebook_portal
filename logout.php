<head>
<title>Logout</title>
</head>
<style>
#logout{
text-align:center;
 font-size:30px;
 margin-top:6%;
 background-color:#CCC;
 width:500px;
 padding:5px;
 
}
</style>
<?php
	session_start();
	if(!isset($_SESSION['usertype']))
		header("location:search.php");
	unset($_SESSION['usertype']);
	include('includes/header.php');
	
?>
<center>
<div id="logout">
	<?php echo "You have Successfully logged out"; ?>
</div>
</center>
<?php
	include("includes/footer.php");
?>