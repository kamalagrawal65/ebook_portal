<head>
<title>Upload</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<?php
	include("includes/header.php");
	session_start();
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");	
	}
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
?>
<style>
.form{
	height:50%;
	padding-top:2%;
	width:50%;
	margin-top:5%;
	background-color:#F93;	
}
.upload{
	font-size:20px;	
}
#file{
	margin-top:15%;
	margin-left:32%;	
}
.upload{
	margin-top:10%;	
}
#new_book{
	background-color:#09F;
	color:white;
	width:250px;
	height:50px;
	padding:10px;
	border-radius:10px;
	font-size:20px;
}
a:link {
    color: white;
}

/* visited link */
a:visited {
    color: white;
}

/* mouse over link */
a:hover {
    color: white;
}

/* selected link */
a:active {
    color: white;
}
a:hover{
	text-decoration:none;	
}
#book_link:hover{
	text-decoration:none;	
}
</style>
<?php
	if(isset($_GET['error']) && $_GET['error']=="Please fill all the details")
		echo "<center><b>{$_GET['error']}</b></center>";
	if(isset($_GET['message']) && $_GET['message']=="Data Inserted")
		echo "<center><h3><b>{$_GET['message']}</b></h3></center>";
?>
<center>
<a href="form.php" id='book_link'><div id='new_book'>New Book Entry</div></a>
<div class="form">
<div class='upload label'>Upload XSL file</div>
<form action="insert.php" method="post" enctype="multipart/form-data">
	<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
              <input type="file" name='xsl' id='file'">
        </div>
        <div class="col-md-3"></div>
    </div>
    <input type="submit" name="upload" class="btn btn-primary active upload" value="Upload"></button>
</form>
</div>
</center>
<?php
	include("includes/footer.php");
?>