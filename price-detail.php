<?php
	if(isset($_POST['download'])){
		include("excel-format.php");
		die();
	}
?><head>
<title>Price Details</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>

<style>
	.search-table{
		max-height:600px;
		overflow:auto;	
	}
</style>
<?php
	session_start();
	include("includes/connection.php");
	include("includes/find_query_string.php"); 
	include("includes/header.php");
	include("includes/resubmission.php");
		
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");
		exit();	
	}
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	
	if(isset($_GET['message'])){
		echo "<center><h3>".$_GET['message']."</h3></center>";	
	}	
	include("includes/price-detail-dd.php");
	
	
?>

<?php
	if(isset($_POST['filter'])){ 
	
?>


<center>
<div class="container">
<div class="search-table">

<?php
		$query="select title,pname,subject,year,procured_in,school,price_inr,recby,slno,remarks,category from ebook_table e,subject_table sub,school_table s,publisher_table p,category_table c where $query_string and c.cid=e.category_id and  e.sid=s.sid and e.pid=p.pid and e.sub_id=sub.sub_id";

		$counter_query="select count(distinct title) as count_title,count(distinct pname) as count_publisher,count(distinct subject) as count_subject,count(distinct school) as count_school from ebook_table e,subject_table sub,school_table s,publisher_table p where $query_string and e.sid=s.sid and e.pid=p.pid and e.sub_id=sub.sub_id";
		
		$result=mysqli_query($connection,$query); 
		
		if(!$result)
			echo "No Results Found"; 
		else{
			$counter_result=mysqli_query($connection,$counter_query);
			$counter_row=mysqli_fetch_row($counter_result);
			
			echo "<code>Showing Results for <mark>$counter_row[0]</mark> titles, <mark>$counter_row[1]</mark> publishers, <mark>$counter_row[3]</mark> schools, <mark>$counter_row[2]</mark> subjects</code><br/><br/>";
			
			echo "<table class='table table-bordered'>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th>Subject</th>
				<th>Published In</th>
				<th>Procured In</th>
				<th>School</th>
				<th>Mode of Access</th>
				<th>Recommended By</th>
				<th>Price In INR</th>
				<th>Remarks</th>
				<th>Edit</th>
				<th>Delete</th>";
			
			while($row=mysqli_fetch_row($result)){
				$author_query="select aname from author_table where slno=$row[8]";
				$author_result=mysqli_query($connection,$author_query);
				$author=NULL;
				$auth_row=mysqli_fetch_row($author_result);
				$author=$auth_row[0];
				while($auth_row=mysqli_fetch_row($author_result)){
					$author.=",".$auth_row[0];
				}
				
				echo "<tr><td>$row[0]</td><td>$author</td><td>$row[1]</td><td>$row[2]</td>
				<td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[10]</td><td>$row[7]</td><td>$row[6]</td><td>$row[9]</td><td><a href='edit.php?bookno=".$row[8]."'>Edit</a></td><td><a href='delete.php?bookno=".$row[8]."'>Delete</a></td>
				</tr>";
			}
	  }
	}
?>
</table>
</div>
</div>
</center>
<?php
	include("includes/footer.php");
?>