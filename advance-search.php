<head>
<title>Advanced Search</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
</head>
<style>
	form{
		background-color:#CCC;
		width:60%;
		padding:2%;
		PADDING-TOP:1px;
		border-radius:20px;
	}
	
	.dropdown{
		height:32px;
		width:150px;
	}
	input[type=text]{
		height:32px;	
	}
	#search{
		margin-top:20px;
		border:none;	
		background-color:#09F;
		color:white;
		height:32px;
		width:80px;
	}
	legend{
		color:green;	
	}
</style>
<?php
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	session_start();
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	else
		allnav();
	
?>
<center>
<form action="book.php" method="post">
	<LEGEND><h3>ADVANCED SEARCH</h3></legend>
    <input type="text" name='input1'></input> in 
	<select name='dropdown1' class="dropdown">
    	<option value="author">Author</option>
        <option value="title">Title</option>
        <option value="publisher">Publisher</option>
        <option value="school">School</option>
        <option value="subject">Subject</option>	    
    </select><br/><br/>
    
    <input type="radio" name="boolean1" value="and" id="and1">&nbsp;</input><label for="and1">AND</label>&nbsp;&nbsp;&nbsp;
   	<input type="radio" name="boolean1" value="or" id="or1">&nbsp;</input><label for="or1">OR</label>&nbsp;&nbsp;&nbsp;
    <input type="radio" name="boolean1" value="not" id="not1">&nbsp;</input><label for="not1">NOT</label>
    <br/><br/>
    
    
    
    <input type="text" name='input2'></input> in 
    <select name='dropdown2' class="dropdown">
    	<option value="author">Author</option>
        <option value="title">Title</option>
        <option value="publisher">Publisher</option>
        <option value="school">School</option>
        <option value="subject">Subject</option>	    
    </select><br/><br/>
    
    <input type="radio" name="boolean2" value="and" id="and1">&nbsp;</input><label for="and1">AND</label>&nbsp;&nbsp;&nbsp;
   	<input type="radio" name="boolean2" value="or" id="or1">&nbsp;</input><label for="or1">OR</label>&nbsp;&nbsp;&nbsp;
    <input type="radio" name="boolean2" value="not" id="not1">&nbsp;</input><label for="not1">NOT</label>
    <br/><br/>
    
    
    <input type="text" name='input3'></input> in 
    <select name='dropdown3' class="dropdown">
    	<option value="author">Author</option>
        <option value="title">Title</option>
        <option value="publisher">Publisher</option>
        <option value="school">School</option>
        <option value="subject">Subject</option>	    
    </select><br/>
    
    <input type="submit" value="Search" name="advance-search" id='search'/>
</form>
</center>

<?php
	include("includes/footer.php");
?>