<head>
<title>Details</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
	.table th{
		color:white;
		background-color:#F60;	
		text-align:center;
	}
	tr:hover{
		background-color:#FC0;	
	}
	td,th{
		text-align:center;	
	}
	table {
    	table-layout: fixed;
    	word-wrap: break-word;
	}
	.table-content{
		width:70%;	
	}
</style>
<?php
	include("includes/header.php");
	include("includes/connection.php");
	session_start();
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");
		exit();	
	}
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	
	//publisher
	$publisher_query="select pname,pcount from publisher_table";
	$publisher_result=mysqli_query($connection,$publisher_query);
	
	//school
	$school_query="select school,school_count from school_table";
	$school_result=mysqli_query($connection,$school_query);

	//subject
	$subject_query="select subject,sub_count from subject_table";
	$subject_result=mysqli_query($connection,$subject_query);

	//procured year
	$procured_query="select procured_in,count(*) as counter from ebook_table group by procured_in order by procured_in desc limit 5";
	$procured_result=mysqli_query($connection,$procured_query);
	
	//rec by
	$rec_query="select recby,count(*) as counter from ebook_table group by recby order by counter desc limit 5";
	$rec_result=mysqli_query($connection,$rec_query);
?>

<center>
<div class="table-content">
<center><h3><u>Publisher Wise Details</u></h3></center>
<table class="table table-bordered table-striped">
	<th>Publisher</th>
    <th>Number of Books</th>
    <?php
		while($row=mysqli_fetch_row($publisher_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";	
		}
	?>
</table>
<br/>
<center><h3><u>School Wise Details</u></h3></center>
<table class="table-striped table-bordered table">
	<th>School</th>
    <th>Number of Books</th>
    <?php
		while($row=mysqli_fetch_row($school_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";	
		}
	?>
</table>
<br/>
<center><h3><u>Subject Wise Details</u></h3></center>
<table class=" table table-bordered table-striped table">
	<th>Subject</th>
    <th>Number of Books</th>
    <?php
		while($row=mysqli_fetch_row($subject_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";	
		}
	?>
</table>
<br/>
<center><h3><u>Procured Year Wise Details</u></h3></center>
<table class="table-bordered table-striped table">
	<th>Procured Year</th>
    <th>Number of Books</th>
    <?php
		while($row=mysqli_fetch_row($procured_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";	
		}
	?>
</table>
<br/>
<center><h3><u>Recommended Wise Details</u></h3></center>
<table class="table-bordered table-striped table">
	<th>Recommended By</th>
    <th>Number of Books</th>
    <?php
		while($row=mysqli_fetch_row($rec_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";	
		}
	?>
</table>
</div>
</center>
<?php
	include("includes/footer.php");
?>