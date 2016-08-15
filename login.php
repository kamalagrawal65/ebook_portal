<head>
<title>Admin Login</title>
</head>
<?php
include('includes/header.php');
session_start();
if(isset($_SESSION['usertype'])){
	header("location:search.php");
	exit();	
}
?>
<style>
.input{
	border-radius:5px;
	height:12%;
	width:90%;
	margin-top:2%;
	padding:2%;
	font-size:20px;
}
#emaili{
	margin-top:16%;	
}
#submit{
	margin-top:4%;
	height:10%;
	width:90%;	
}
#login{
	align:center;
	background-color:#CCC;
	height:60%;
	width:50%;
	margin-top:3%;
}
#wpass{
	font-size:25px;	
	text-align:center;
}
</style>
<body>
<div id="wpass">

<?php 
if(isset($_GET['msg'])){
	if($_GET['msg']=="Wrong Password! Please Try Again")
		echo $_GET['msg'];
	else
		header("location:error.php");
}
?>

</div>
<center>
<div id="login">
<form action="search.php" method="post">
	<input id="emaili" class="input" type="email" placeholder="EMAIL" name="email" required/>
    <br/>
    <input class="input" type="password" placeholder="PASSWORD" name="pass" required/>
    <br/>
    <input type="submit" id="submit" name="login"/>
</form>
</div>
</center>

</body>
<?php
	include("includes/footer.php");
?>