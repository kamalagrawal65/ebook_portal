<?php
	include("connection.php");
	$query="update ebook_table set hits=hits+1 where slno=".$_GET['slno'];
	//echo $query;
	$result=mysqli_query($connection,$query);
?>