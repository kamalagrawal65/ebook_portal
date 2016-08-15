<head>
<title>Books</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/book.css">
</head>
</head>
<style>
.div-title{
	color:#603;	
}
</style>
<?php
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	session_start();
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	else
		allnav();
	
	if(!isset($_POST['search']) && (!isset($_GET['search-text']) || !isset($_GET['searchby']) ) && (!isset($_POST['advance-search']))){
		header("location:search.php");
		exit();	
	}
	
	//perpage how many data	
	$perpage=20;

?>

<?php
	$col=NULL;
	$key=NULL;
	
	$query_string=NULL;
	
	if(isset($_POST['search']) && isset($_POST['searchby'])){
		$col=htmlentities($_POST['searchby']);
		$key=htmlentities($_POST['search-text']);
	}
	else if(isset($_POST['search']) && isset($_POST['query_string'])){
		$query_string=$_POST['query_string'];	
	}
	if(isset($_GET['searchby']) && $_GET['search-text']){
		$col=htmlentities($_GET['searchby']);
		$key=htmlentities($_GET['search-text']);
	}
	
	$limit=1;
	if(isset($_POST['jumpto'])){
		$limit=htmlentities($_POST['jumpto']);	
	}
	

	$query=NULL;
	//normal search
	if($col!=NULL && $key!=NULL){
		include("includes/normal-search.php");
	}
	//advance search
	else if($query_string==NULL){
		include("includes/advance-search-query.php");
	}
	
	 
	$query="select title,pri_author,sec_author,pname,subject,year,access_no,biblo_no,doi,isbn,summary,url,school,slno,img from ebook_table e,subject_table sub,school_table s,publisher_table p where $query_string and e.sid=s.sid and e.pid=p.pid and e.sub_id=sub.sub_id ORDER BY (CASE 
    WHEN title LIKE 'the %' THEN substr(title,5) 
    WHEN title LIKE 'a %' THEN substr(title,3) 
    WHEN title LIKE 'an %' THEN substr(title,4) 
    ELSE title END)";
	$result='';
	//echo $query;
	//pagination
	$count=0;
	$counter=0;
	if(isset($_POST['count'])){
		$count=$_POST['count'];
		$counter=$_POST['counter'];
	}
		
	if($limit==1){
		$result=mysqli_query($connection,$query);
		if(!$result) die("No Results Found");
		$count=$counter=mysqli_num_rows($result);
		$count=(int)($count/$perpage);
		if((int)($counter)%(int)($perpage)!=0){
			$count=$count+1;
		}
	}
	//normal search
	if($col!=NULL && $key!=NULL){
		echo "<center><div class='path'><code>Showing results for <mark>". ucfirst($col) ."</mark> and Search Keyword  <mark>$key  </mark>($counter) - Page: $limit</code></div></center>";
	}
	$val=($limit-1)*$perpage;
	$query.=" limit $val,$perpage";
	$result=mysqli_query($connection,$query);

	echo "<center>

<div class='main-result-box'>";
	
	$index=$val+1;
	if(!$result || mysqli_num_rows($result)==0){
		echo "<center class='center'>No Results Found.</center>";	
	}
	else{
		while($row=mysqli_fetch_row($result)){
			echo "<div class='index_no'>$index.</div>";
			echo "<div class='detail'>";
			$image="images/books/notavailable.png";
			if($row[14]!="NA")
				$image="images/books/".$row[14];
				
			echo "<img src='".$image."' id='det-img' width='200px' height='100%' style='float:left; padding-right:10px;'/>";
			echo "<a class='title_link' href='book-detail.php?book=".$row[13]."'> $row[0] </a>"." <br/>
			<span class='div-title'>By</span>: $row[1]";
			if($row[2]!='' && $row[2]!='NA') 
				echo "; $row[2]";
			
			echo "<br/> <span class='div-title'>Publisher</span>:<b><i>$row[3] ($row[8]) </i></b>";
			echo " <br/> <span class='div-title'>School</span>:$row[12] <br/> <span class='div-title'>Subject</span>:$row[4]";
			echo "<br/> <span class='div-title'>ISBN</span>:$row[9] <br/> <span class='div-title'>Year</span>:$row[5]";
			
			
			echo "</div>";
			echo "<div class='detcopy'>";
			echo "<hr/> </div>";
			$index++;	
		}
		
	}
?>

<?php
	echo "<form action='book.php' method='post'>";
		if($col!=NULL && $key!=NULL){
			echo "<input type='hidden' value='".$col."' name='searchby'/>";
			echo "<input type='hidden' value='".$key."' name='search-text'/>";
		}
		else{
			echo "<textarea style='display:none' name='query_string'>$query_string</textarea>";
		}
		echo "<input type='hidden' value='".$count."' name='count'/>";
		echo "<input type='hidden' value='".$counter."' name='counter'/>";
?>

Showing Page:&nbsp;<?php echo $limit;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Pages:<?php echo $count ;?> <br/>
Jump to Page: <input type="number" size=10 min=1 max=<?php echo $count; ?> name='jumpto'/>
<input type="submit" name="search" value="Go"/>
<?php
	echo "</form>";
?>
</div>
<?php
	include("includes/footer.php");
?>
</center>

