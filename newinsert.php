<?php
	include("includes/connection.php");
	session_start();
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");	
	}
	
	$title=$_POST['title'];
	$author=$_POST['author'];
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
	
	//dauthor are array of items.
		$author_arr=explode(',',$author);
		$author_count=count($author_arr);
		
		$primary=$author_arr[0];
		$secondary="NA";
		if($author_count>1)
			$secondary=$author_arr[1];
	
	//school table insertion
		$query1="insert into school_table (`school`) values ('".$school."');";
		$result=mysqli_query($connection,$query1);
		$query2="update school_table set school_count=school_count+1 where school='".$school."';";
		$result=mysqli_query($connection,$query2);
		$query3="select sid from school_table where school='".$school."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dsid=$row[0];
		}else
			die();
		
		//subject table insertion
		$query1="insert into subject_table (`subject`) values ('".$subject."');";
		$result=mysqli_query($connection,$query1);
		$query2="update subject_table set sub_count=sub_count+1 where subject='".$subject."';";
		$result=mysqli_query($connection,$query2);
		$query3="select sub_id from subject_table where subject='".$subject."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dsub_id=$row[0];
		}
		else die();
		
		
		//publisher table insertion
		$query1="insert into publisher_table (`pname`) values ('".$publisher."');";
		$result=mysqli_query($connection,$query1);
		$query2="update publisher_table set pcount=pcount+1 where pname='".$publisher."';";
		$result=mysqli_query($connection,$query2);
		$query3="select pid from publisher_table where pname='".$publisher."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dpid=$row[0];
		}
		else die();
		
		//source table insertion
		$query1="insert into source_table (`source_name`) values ('".$source."');";
		$result=mysqli_query($connection,$query1);
		$query2="update source_table set scount=scount+1 where source_name='".$source."';";
		$result=mysqli_query($connection,$query2);
		$query3="select source_id from source_table where source_name='".$source."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dsource_id=$row[0];
		}
		else die();
		
		//category table insertion
		$query1="insert into category_table (`category`) values ('".$category."');";
		$result=mysqli_query($connection,$query1);
		$query2="select cid from category_table where category='".$category."'";
		$result=mysqli_query($connection,$query2);
		if($result){
			$row=mysqli_fetch_row($result);
			$dcid=$row[0];
		}
		else die();
		
		//currency table insertion
		$query1="insert into currency_table (`currency`) values ('".$currency."');";
		$result=mysqli_query($connection,$query1);
		$query2="select cid from currency_table where currency='".$currency."'";
		$result=mysqli_query($connection,$query2);
		if($result){
			$row=mysqli_fetch_row($result);
			$dcurr_id=$row[0];
		}
		else die();
		
		//ebook table insertion
		$query="INSERT INTO `ebook_table`(`title`, `pri_author`, `sec_author`, `pid`, `sub_id`, `year`, `category_id`, `access_no`, `biblo_no`, `doi`, `isbn`, `summary`, `recby`, `url`, `sid`, `procured_in`, `source_id`, `invoice_no`, `invoice_date`, `curr_id`, `list_price`, `discount_per`, `discount_val`, `paid_price`, `conversion_rate`, `price_inr`) VALUES ('".$title."','".$primary."','".$secondary."',".$dpid.",".$dsub_id.",".$year.",'".$dcid."','".$accessno."','".$biblono."','".$doi."','".$isbn."','".$summary."','".$recby."','".$url."',".$dsid.",".$procured.",".$dsource_id.",'".$invoiceno."','".$invoice_date."',".$dcurr_id.",".$list_price.",".$discount_per.",".$discount_val.",".$paid_price.",".$conversion_rate.",".$price_inr.");";
		$result=mysqli_query($connection,$query);
		if(!$result)
			echo $query;	  
		$query1="select slno from ebook_table where isbn='".$isbn."' and doi='".$doi."'";
		$result=mysqli_query($connection,$query1);
		$row=mysqli_fetch_row($result);
		$slno=$row[0];
		
		//echo $query;
		//author table insertion
		
		$auth="INSERT INTO `author_table`(`slno`, `aname`) VALUES ($slno,'".$author_arr[0]."')";
		$i=1;
		while($i<$author_count){
			$auth.=",($slno,'".$author_arr[$i]."')";
			$i++;
		}
		$result=mysqli_query($connection,$auth);	
	
	header("location:form.php?message=Data Inserted");
?>