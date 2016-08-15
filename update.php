<?php
	include("includes/connection.php");
	session_start();
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");	
	}
	
	$title=$_POST['title'];
	$publisher=$_POST['publisher'];
	$subject=$_POST['subject'];
	$year=$_POST['published'];
	$category=$_POST['category'];
	$accessno=$_POST['accessno'];
	$biblono=$_POST['biblono'];
	$doi=$_POST['doi'];
	$isbn=$_POST['isbn'];
	$summary=$_POST['summary'];
	$recby=$_POST['recby'];
	$url=$_POST['url'];
	$school=$_POST['school'];
	$procured=$_POST['procured'];
	$source=$_POST['source'];
	$invoiceno=$_POST['invoiceno'];
	$invoice_date=$_POST['invoice_date'];
	$currency=$_POST['currency'];
	$list_price=$_POST['list_price'];
	$discount_per=$_POST['discount_per'];
	$discount_val=$_POST['discount_val'];
	$paid_price=$_POST['paid_price'];
	$conversion_rate=$_POST['conversion'];
	$price_inr=$_POST['price_inr'];
	$slno=$_POST['slno'];
	
	//school
	$query3="select sid from school_table where school='".$school."'";
	$result=mysqli_query($connection,$query3);
	if($result){
		$row=mysqli_fetch_row($result);
		$sid=$row[0];
	}else
		die();
	
	//subject
	$query3="select sub_id from subject_table where subject='".$subject."'";
	$result=mysqli_query($connection,$query3);
	if($result){
		$row=mysqli_fetch_row($result);
		$sub_id=$row[0];
	}
	else die();
	
	//publisher
	$query3="select pid from publisher_table where pname='".$publisher."'";
	$result=mysqli_query($connection,$query3);
	if($result){
		$row=mysqli_fetch_row($result);
		$pid=$row[0];
	}
	else die();
	
	//source
	$query3="select source_id from source_table where source_name='".$source."'";
	$result=mysqli_query($connection,$query3);
	if($result){
		$row=mysqli_fetch_row($result);
		$source_id=$row[0];
	}
	else die();
	
	//category
	$query2="select cid from category_table where category='".$category."'";
	$result=mysqli_query($connection,$query2);
	if($result){
		$row=mysqli_fetch_row($result);
		$cid=$row[0];
	}
	else die();
		
	//currency	
	$query2="select cid from currency_table where currency='".$currency."'";
	$result=mysqli_query($connection,$query2);
	if($result){
		$row=mysqli_fetch_row($result);
		$curr_id=$row[0];
	}
	else die();
	
		
	$query="UPDATE `ebook_table` SET `title`='{$title}',`pid`=$pid,`sub_id`=$sub_id,`year`=$year,`category_id`=$cid,`access_no`='{$accessno}',`biblo_no`='{$biblono}',`doi`='{$doi}',`isbn`='{$isbn}',`summary`='{$summary}',`recby`='{$recby}',`url`='{$url}',`sid`=$sid,`procured_in`=$procured,`source_id`=$source_id,`invoice_no`='{$invoiceno}',`invoice_date`='{$invoice_date}',`curr_id`=$curr_id,`list_price`=$list_price,`discount_per`=$discount_per,`discount_val`=$discount_val,`paid_price`=$paid_price,`conversion_rate`=$conversion_rate,`price_inr`=$price_inr WHERE slno=$slno";
	$result=mysqli_query($connection,$query);
	header("location:edit.php?bookno=$slno&message=Data Updated");
?>
