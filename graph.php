<head>
<title>Graphs</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
.graphs{
	display:inline;	
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
	$publisher_query="select pname,pcount from publisher_table order by pcount desc limit 10";
	$publisher_result=mysqli_query($connection,$publisher_query);
	
	//school
	$school_query="select school,school_count from school_table";
	$school_result=mysqli_query($connection,$school_query);

	//subject
	$subject_query="select subject,sub_count from subject_table order by sub_count desc limit 10";
	$subject_result=mysqli_query($connection,$subject_query);
	
	//recby wise hits
	$recbyhit_query="select recby,sum(hits) as downloads from ebook_table e group by recby order by downloads desc limit 10";
	$recbyhit_result=mysqli_query($connection,$recbyhit_query);
	
	//school wise hits
	$schoolhit_query="select school,sum(hits) as downloads from ebook_table e,school_table s where s.sid=e.sid group by school order by downloads desc";
	$schoolhit_result=mysqli_query($connection,$schoolhit_query);
	
	//subject wise hits
	$subjecthit_query="select subject,sum(hits) as downloads from ebook_table e,subject_table s where s.sub_id=e.sub_id group by subject order by downloads desc limit 10";
	$subjecthit_result=mysqli_query($connection,$subjecthit_query);
	
	//publisher
	$counter=1;
	$publisher_data=NULL;
	while($row=mysqli_fetch_row($publisher_result)){
		if($counter!=1)
			$publisher_data.=",";
		$publisher_data.="{ label:'".$row[0]."',value:".$row[1]." }";
		$counter=2;
	}
	
	//school
	$counter=1;
	$school_data=NULL;
	while($row=mysqli_fetch_row($school_result)){
		if($counter!=1)
			$school_data.=",";
		$school_data.="{ label:'".$row[0]."',value:".$row[1]." }";
		$counter=2;
	}
	
	//subject
	$counter=1;
	$subject_data=NULL;
	while($row=mysqli_fetch_row($subject_result)){
		if($counter!=1)
			$subject_data.=",";
		$subject_data.="{ label:'".$row[0]."',value:".$row[1]." }";
		$counter=2;
	}
	
	//recby wise hits
	$counter=1;
	$recbyhit_data=NULL;
	while($row=mysqli_fetch_row($recbyhit_result)){
		if($counter!=1)
			$recbyhit_data.=",";
		$recbyhit_data.="{ label:'".$row[0]."',value:".$row[1]." }";
		$counter=2;
	}
	
	//subject wise hits
	$counter=1;
	$subjecthit_data=NULL;
	while($row=mysqli_fetch_row($subjecthit_result)){
		if($counter!=1)
			$subjecthit_data.=",";
		$subjecthit_data.="{ label:'".$row[0]."',value:".$row[1]." }";
		$counter=2;
	}
	
	//school wise hits
	$counter=1;
	$schoolhit_data=NULL;
	while($row=mysqli_fetch_row($schoolhit_result)){
		if($counter!=1)
			$schoolhit_data.=",";
		$schoolhit_data.="{ label:'".$row[0]."',value:".$row[1]." }";
		$counter=2;
	}
?>
<center>
<div class="graphs" id='subject_pie'></div>
<div class="graphs" id='school_pie'></div>
<div class="graphs" id='publisher_pie'></div>
<div class="graphs" id='schoolhit_pie'></div>
<div class="graphs" id='subjecthit_pie'></div>
<div class="graphs" id='recbyhit_pie'></div>
</center>
<?php include("includes/graph_data.php");?>
<?php
	include("includes/footer.php");
?>