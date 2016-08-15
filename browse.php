<head>
<title>Browse</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	else
		allnav();
?>
<style>
.browse-header-last{
	display:inline-block;
	margin-left:15%;
	text-align:left;
}

.browse-header{
	float:left;
	margin-left:17%;
	text-align:left;
}
.browse-info{
	margin-left:20px;	
}
a{
	font-size:18px;	
}
.head{
	color:green;	
}
</style>
<center>
<div class="browse-header">
<h3 class='head'>Publishers Wise</h3>
<div class="browse-info">
<?php
	$query="select pname,pcount from publisher_table where pcount>0 order by pname";
	$result=mysqli_query($connection,$query);
	$index=1;
	while($row=mysqli_fetch_row($result)){
		echo "$index. <a href='book.php?searchby=publisher&search-text=".$row[0]."'>$row[0] ($row[1])</a><br/>";
		$index++;
	}
?>
</div>
</div>

<div class="browse-header">
<h3 class='head'>Schools Wise</h3>
<div class="browse-info">
<?php
	$query="select school,school_count from school_table where school_count>0 order by school";
	$result=mysqli_query($connection,$query);
	$index=1;
	while($row=mysqli_fetch_row($result)){
		echo "$index. <a href='book.php?searchby=school&search-text=".$row[0]."'>$row[0] ($row[1])</a><br/>";
		$index++;
	}
?>
</div>
</div>

<div class="browse-header-last">
<h3 class='head'>Subjects Wise</h3>
<div class="browse-info">
<?php
	$query="select subject,sub_count from subject_table where sub_count>0 order by subject";
	$result=mysqli_query($connection,$query);
	$index=1;
	while($row=mysqli_fetch_row($result)){
		echo "$index. <a href='book.php?searchby=subject&search-text=".$row[0]."'>$row[0] ($row[1])</a><br/>";
		$index++;
	}
?>
</div>
</div>



<br/>

<?php
	include("includes/footer.php");
?>
</center>
