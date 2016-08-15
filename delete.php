<?php
	include("includes/connection.php");
	$slno=$_GET['bookno'];
	
	//author table removal
	$query="delete from author_table where slno=".$slno;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	//chapter table removal
	$query="delete from chapter_table where slno=".$slno;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	//all query
	$query="select pid,sid,source_id,sub_id from ebook_table where slno=".$slno;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	$row=mysqli_fetch_row($result);
	$pid=$row[0];
	$sid=$row[1];
	$source_id=$row[2];
	$sub_id=$row[3];
	
	//decrease publisher_count
	$query="update publisher_table set pcount=pcount-1 where pid=".$pid;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	//decrease school count
	$query="update school_table set school_count=school_count-1 where sid=".$sid;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	
	//decrease subject count
	$query="update subject_table set sub_count=sub_count-1 where sub_id=".$sub_id;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	//decrease source count
	$query="update source_table set scount=scount-1 where source_id=".$source_id;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	//delete from ebook table
	$query="delete from ebook_table where slno=".$slno;
	$result=mysqli_query($connection,$query);
	if(!$result){
		header("location:price-detail.php?message=Failed To Delete");
		exit();
	}
	
	header("location:price-detail.php?message=Record Successfully Deleted");
?>