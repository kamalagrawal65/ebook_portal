<?php
	if((!isset($_FILES['xsl'])) || $_FILES['xsl']=='')
		header("location:upload.php?error=Please fill all the details");

	$file_name = $_FILES['xsl']['name'];
	$file_size =$_FILES['xsl']['size'];
	$file_tmp =$_FILES['xsl']['tmp_name'];

	move_uploaded_file($file_tmp,"excel/".$file_name);
	
	
	include 'excel_reader/excel_reader.php';     // include the class
	$excel = new PhpExcelReader;
	$excel->read('excel/'.$file_name);
	
	
	
	function sheetData($sheet) {
	  $title=1;
	  $author=2;
	  $publisher=3;
	  $subject=4;
	  $year=5;
	  $category=6;
	  $accessno=7;
	  $biblono=8;
	  $content=9;
	  $doi=10;
	  $isbn=11;
	  $summary=12;
	  $recby=13;
	  $url=14;
	  $school=15;
	  $procured=16;
	  $source=17;
	  $invoice_no=18;
	  $invoice_date=19;
	  $currency=20;
	  $list_price=21;
	  $discount_per=22;
	  $discount_val=23;
	  $price_paid=24;
	  $conversion_rate=25;
	  $price_inr=26;
	  $remarks=27;
	  $short_subject=28;
	  
	  include("includes/connection.php");
	  
	  $x = 2;
	  
	  // d stands for data
	  while($x <= $sheet['numRows']) {
		//all details
		$dtitle=isset($sheet['cells'][$x][$title]) ? $sheet['cells'][$x][$title]:'NA';
		$dtitle=str_replace("'"," ",$dtitle);
		$dauthor=isset($sheet['cells'][$x][$author]) ? $sheet['cells'][$x][$author]:'NA';
		$dpublisher=isset($sheet['cells'][$x][$publisher]) ? $sheet['cells'][$x][$publisher]:'NA';
		$dsubject=isset($sheet['cells'][$x][$subject]) ? $sheet['cells'][$x][$subject]:'NA';
		$dyear=isset($sheet['cells'][$x][$year]) ? $sheet['cells'][$x][$year]:2016;
		$dcategory=isset($sheet['cells'][$x][$category]) ? $sheet['cells'][$x][$category]:'NA';
		$daccess=isset($sheet['cells'][$x][$accessno]) ? $sheet['cells'][$x][$accessno]:'NA';
		$dbiblo=isset($sheet['cells'][$x][$biblono]) ? $sheet['cells'][$x][$biblono]:'NA';
		$dcontent=isset($sheet['cells'][$x][$content]) ? $sheet['cells'][$x][$content]:'NA';
		$ddoi=isset($sheet['cells'][$x][$doi]) ? $sheet['cells'][$x][$doi]:'NA';
		$disbn=isset($sheet['cells'][$x][$isbn]) ? $sheet['cells'][$x][$isbn]:'NA';
		$dsummary=isset($sheet['cells'][$x][$summary]) ? $sheet['cells'][$x][$summary]:'NA';
		$drecby=isset($sheet['cells'][$x][$recby]) ? $sheet['cells'][$x][$recby]:'NA';
		$durl=isset($sheet['cells'][$x][$url]) ? $sheet['cells'][$x][$url]:'NA';
		$dschool=isset($sheet['cells'][$x][$school]) ? $sheet['cells'][$x][$school]:'NA';
		$dprocured=isset($sheet['cells'][$x][$procured]) ? $sheet['cells'][$x][$procured]:'NA';
		$dsource=isset($sheet['cells'][$x][$source]) ? $sheet['cells'][$x][$source]:'NA';
		$dinvoice_no=isset($sheet['cells'][$x][$invoice_no]) ? $sheet['cells'][$x][$invoice_no]:'NA';
		$dinvoice_date=isset($sheet['cells'][$x][$invoice_date]) ? $sheet['cells'][$x][$invoice_date]:'NA';
		$dcurrency=isset($sheet['cells'][$x][$currency]) ? $sheet['cells'][$x][$currency]:'NA';
		$dlist_price=isset($sheet['cells'][$x][$list_price]) ? $sheet['cells'][$x][$list_price]:0;
		$ddiscount_per=isset($sheet['cells'][$x][$discount_per]) ? $sheet['cells'][$x][$discount_per]:0;
		$ddiscount_val=isset($sheet['cells'][$x][$discount_val]) ? $sheet['cells'][$x][$discount_val]:0;
		$dpaid_price=isset($sheet['cells'][$x][$price_paid]) ? $sheet['cells'][$x][$price_paid]:0;
		$dconversion_rate=isset($sheet['cells'][$x][$conversion_rate]) ? $sheet['cells'][$x][$conversion_rate]:0;
		$dprice_inr=isset($sheet['cells'][$x][$price_inr]) ? $sheet['cells'][$x][$price_inr]:0;
		$dremarks=isset($sheet['cells'][$x][$remarks]) ? $sheet['cells'][$x][$remarks]:'NA';
		$dshort_subject=isset($sheet['cells'][$x][$short_subject]) ? $sheet['cells'][$x][$short_subject]:'NA';
		
		//dauthor are array of items.
		$author_arr=explode(';',$dauthor);
		$author_count=count($author_arr);
		
		$primary=$author_arr[0];
		$secondary="NA";
		if($author_count>1)
			$secondary=$author_arr[1];
		
		//school table insertion
		$query1="insert into school_table (`school`) values ('".$dschool."');";
		$result=mysqli_query($connection,$query1);
		$query2="update school_table set school_count=school_count+1 where school='".$dschool."';";
		$result=mysqli_query($connection,$query2);
		$query3="select sid from school_table where school='".$dschool."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dsid=$row[0];
		}else
			die();
		
		//subject table insertion
		$query1="insert into subject_table (`subject`) values ('".$dsubject."');";
		$result=mysqli_query($connection,$query1);
		$query2="update subject_table set sub_count=sub_count+1 where subject='".$dsubject."';";
		$result=mysqli_query($connection,$query2);
		$query3="select sub_id from subject_table where subject='".$dsubject."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dsub_id=$row[0];
		}
		else die();
		
		
		//publisher table insertion
		$query1="insert into publisher_table (`pname`) values ('".$dpublisher."');";
		$result=mysqli_query($connection,$query1);
		$query2="update publisher_table set pcount=pcount+1 where pname='".$dpublisher."';";
		$result=mysqli_query($connection,$query2);
		$query3="select pid from publisher_table where pname='".$dpublisher."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dpid=$row[0];
		}
		else die();
		
		//source table insertion
		$query1="insert into source_table (`source_name`) values ('".$dsource."');";
		$result=mysqli_query($connection,$query1);
		$query2="update source_table set scount=scount+1 where source_name='".$dsource."';";
		$result=mysqli_query($connection,$query2);
		$query3="select source_id from source_table where source_name='".$dsource."'";
		$result=mysqli_query($connection,$query3);
		if($result){
			$row=mysqli_fetch_row($result);
			$dsource_id=$row[0];
		}
		else die();
		
		//category table insertion
		$query1="insert into category_table (`category`) values ('".$dcategory."');";
		$result=mysqli_query($connection,$query1);
		$query2="select cid from category_table where category='".$dcategory."'";
		$result=mysqli_query($connection,$query2);
		if($result){
			$row=mysqli_fetch_row($result);
			$dcid=$row[0];
		}
		else die();
		
		//currency table insertion
		$query1="insert into currency_table (`currency`) values ('".$dcurrency."');";
		$result=mysqli_query($connection,$query1);
		$query2="select cid from currency_table where currency='".$dcurrency."'";
		$result=mysqli_query($connection,$query2);
		if($result){
			$row=mysqli_fetch_row($result);
			$dcurr_id=$row[0];
		}
		else die();
		
		//ebook table insertion
		$query="INSERT INTO `ebook_table`(`title`, `pri_author`, `sec_author`, `pid`, `sub_id`, `year`, `category_id`, `access_no`, `biblo_no`, `contents`, `doi`, `isbn`, `summary`, `recby`, `url`, `sid`, `procured_in`, `source_id`, `invoice_no`, `invoice_date`, `curr_id`, `list_price`, `discount_per`, `discount_val`, `paid_price`, `conversion_rate`, `price_inr`,`remarks`,`short_subject`) VALUES ('".$dtitle."','".$primary."','".$secondary."',".$dpid.",".$dsub_id.",".$dyear.",'".$dcid."','".$daccess."','".$dbiblo."','".$dcontent."','".$ddoi."','".$disbn."','".$dsummary."','".$drecby."','".$durl."',".$dsid.",".$dprocured.",".$dsource_id.",'".$dinvoice_no."','".$dinvoice_date."',".$dcurr_id.",".$dlist_price.",".$ddiscount_per.",".$ddiscount_val.",".$dpaid_price.",".$dconversion_rate.",".$dprice_inr.",'".$dremarks."','".$dshort_subject."');";
		$result=mysqli_query($connection,$query);
		if(!$result)
			echo $query;	  
		$query1="select slno from ebook_table where isbn='".$disbn."' and doi='".$ddoi."'";
		$result=mysqli_query($connection,$query1);
		$row=mysqli_fetch_row($result);
		$slno=$row[0];
		
		
		
		
		//author table insertion
		
		$auth="INSERT INTO `author_table`(`slno`, `aname`) VALUES ($slno,'".$author_arr[0]."')";
		$i=1;
		while($i<$author_count){
			$auth.=",($slno,'".$author_arr[$i]."')";
			$i++;
		}
		$result=mysqli_query($connection,$auth);
		
		
		$x++;
	  }
	}
	
	$excel_data = sheetData($excel->sheets[0]);  
	header("location:upload.php?message=Data Inserted");
?>    
