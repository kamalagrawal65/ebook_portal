<head>
<title>Downloads</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
	.table th{
		background-color:#F60;
		text-align:center;	
		color:white;
	}
	tr:hover{
		background-color:#FC0;	
	}
	table{
		table-layout: fixed;
		text-align:center;	
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
		
	//school wise hits
	$school_query="select school,sum(hits) as downloads from ebook_table e,school_table s where s.sid=e.sid group by school order by downloads desc";
	$school_result=mysqli_query($connection,$school_query);
	
	//subject wise hits
	$subject_query="select subject,sum(hits) as downloads from ebook_table e,subject_table s where s.sub_id=e.sub_id group by subject order by downloads desc limit 10";
	$subject_result=mysqli_query($connection,$subject_query);
	
	//publisher wise hits
	$publisher_query="select pname,sum(hits) as downloads from ebook_table e,publisher_table p where p.pid=e.pid group by pname order by downloads desc limit 10";
	$publisher_result=mysqli_query($connection,$publisher_query);
	
	//recby wise hits
	$recby_query="select recby,sum(hits) as downloads from ebook_table e group by recby order by downloads desc limit 10";
	$recby_result=mysqli_query($connection,$recby_query);
?>

<center><h3><u>School Wise Downloads</u></h3></center>
<div class="container">
<table class="table table-bordered table-striped">
	<th>School</th>
    <th>Downloads</th>
<?php
	if(!$school_result)
		echo "No Results Found"; 
  	else{
  		while($row=mysqli_fetch_row($school_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
		}
  }
?>
</table>

<center><h3><u>Subject Wise Downloads</u></h3></center>
<table class="table table-bordered table-striped">
	<th>Subject</th>
    <th>Downloads</th>
<?php
	if(!$subject_result)
		echo "No Results Found"; 
  	else{
  		while($row=mysqli_fetch_row($subject_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
		}
  }
?>
</table>

<center><h3><u>Publisher Wise Downloads</u></h3></center>
<table class="table table-bordered table-striped">
	<th>Publisher</th>
    <th>Downloads</th>
<?php
	if(!$publisher_result)
		echo "No Results Found"; 
  	else{
  		while($row=mysqli_fetch_row($publisher_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
		}
  }
?>
</table>

<center><h3><u>Recommended By Wise Downloads</u></h3></center>
<table class="table table-bordered table-striped">
	<th>Recommended By</th>
    <th>Downloads</th>
<?php
	if(!$recby_result)
		echo "No Results Found"; 
  	else{
  		while($row=mysqli_fetch_row($recby_result)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
		}
  }
?>
</table>
</div>
</center>
<?php
	include("includes/footer.php");
?>