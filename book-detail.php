<head>
<title>Book Detail</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<script>
	$(document).ready(function(){
		$(".hitbook").click(function(){
			$.ajax({url:"includes/updatehit.php?slno=<?php echo $_GET['book']; ?>", success: 
				function(result){
					//alert(result);
    			}
			});
		});	
	});
</script>

<body>

<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	include("includes/resubmission.php");
	
	if(!isset($_GET['book'])){
		header("location:search.php");
		exit();	
	}
	
	
	if(!isset($_SESSION['usertype']))
		allnav();
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
		
			
	$book=$_GET['book'];
	$query="SELECT `title`, `pri_author`, `sec_author`, `pname`, `subject`, `year`, `access_no`, `biblo_no`, `contents`, `doi`, `isbn`, `summary`, `url`, `school`,`slno`,`img` FROM ebook_table e,subject_table sub,school_table s,publisher_table p where e.sid=s.sid and e.pid=p.pid and e.sub_id=sub.sub_id and slno=$book";
	//echo $query;
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_row($result);
	$img="notavailable.png";
	if($row[15]!='NA')
		$img=$row[15];
	
	$authors=NULL;
	$author_query="select aname from author_table where slno=$book";
	$author_result=mysqli_query($connection,$author_query);
	$counter=mysqli_num_rows($author_result);
	if(!$author_result)
		die("No Results Found");
	$author_row=mysqli_fetch_row($author_result);
	$authors.=$author_row[0];
	while($author_row=mysqli_fetch_row($author_result)){
		$authors.=",".$author_row[0];	
	}
	$varauth="Authors";
	if($counter<2)
		$varauth="Author";
?>

<style>
.col1{
	font-size:18px;
	color:#603;
	
}
td{
	vertical-align:top;
}
.col2{
	padding-left:10px;
	float:left;
}
.col3{
	padding-left:10px;
	padding-top:6px;
}
.book_detail_top{
	margin-top:2%;
	text-align:left;
	width:70%;
	background-color:#FFC;
	//border:2px solid #F60;	
	//border-radius:20px;
}
#upload{
	margin-top:2%;
}

.book-header{
	width:100%;
	padding:30px;	
}
form{
	background-color:#F30;
	padding:10px;
	width:50%;	
	border-radius:20px;
}
#img{
	padding:10px;
	float:left;
	padding-right:30px;	
}
.header{
	font-size:22px;
	padding-bottom:20px;	
}
.info{
	width:100%;
	text-align:justify;
	text-justify:inter-word;
	word-wrap:break-word;	
}
.col1,.col2{
	line-height:30px;	
}
.dd{
	display:none;
	line-height:40px;
	background-color:white;
	font-size:18px;
	width:300px;
}
.link-dd:hover{
	cursor:pointer;
	text-decoration:none;	
}
.dd-head:hover{
	cursor:pointer;	
}
.dd-head{
	margin-top:40px;
	background-color:#09F;
	width:150px;
	height:40px;
	color:white;
	border-radius:10px;
	padding:10px;
	text-align:center;	
}
</style>
<script>
	$(document).ready(function(){
		$(".dd-head").click(function(){
			$(".dd").toggle();			
		});
		
		$("#localhost").click(function() {
			$('html, body').animate({
				scrollTop: $("#chapter").offset().top
			}, 1000);
		});
	});
</script>
<center>

<div class="book_detail_top">
	<img id='img' width=22%; height=40%; src="images/books/<?php echo $img; ?>"></img>
    <div class="book-header">
		<table>
        	<tr>
            	<td class="col1">Title</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[0]; ?></td>
            </tr>
            <tr>
            	<td class="col1"><?php echo $varauth ?></td><td class="col3">:</td>
                <td class="col2"><?php echo $authors ?></td>
            </tr>
            <tr>
            	<td class="col1">Publisher</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[3]  ."&nbsp;(".$row[5].")"?></td>
            </tr>
            <tr>
            	<td class="col1">School</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[13]; ?></td>
            </tr>
            <tr>
            	<td class="col1">Subject</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[4]; ?></td>
            </tr>
            <?php 
				if($row[10]!='NA'){
			?>
            <tr>
            	<td class="col1">ISBN</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[10]; ?></td>
            </tr>
            <?php
				}
				if($row[9]!='NA'){
			?>
            <tr>
            	<td class="col1">DOI</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[9]; ?></td>
            </tr>
            <?php
				}
				if($row[6]!='NA'){
			?>	
            <tr>
            	<td class="col1">AccessNo</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[6]; ?></td>
            </tr>
            <?php
				}
				if($row[7]!='NA'){
			?>
            <tr>
            	<td class="col1">BibloNo</td><td class="col3">:</td>
                <td class="col2"><?php echo $row[7]; ?></td>
            </tr>
            <?php
				}
			?>
            </table>
            
           <hr/> 
            	<div>
                    <div class="dd-head">Download e-Book</div>
                    <div class="dd">
                        <a id='localhost' class='link-dd'>From localhost</a><br/>
                        <a target='_blank' class='link-dd' href='https://<?php echo $row[12]; ?>'>From Publishers's website</a>
                    </div>
                </div>
        
        <hr/>
        
        <div class="header"><u>Summary</u>:</div>
        <div class="info">
        	<?php echo $row[11]; ?>
        </div>
        <hr/>
        
        <div class="header" id='chapter'><u>Table Of Contents</u>:</div>
        <div class="info">
        	<?php 
				$query="select chapter_name from chapter_table where slno=$book";
				$result=mysqli_query($connection,$query);
				while($row=mysqli_fetch_row($result)){
					echo "<a class='hitbook' href='pdfs/".$book."/".$row[0]."' target='_blank'>$row[0]</a><br/>";
				}
			?>
            
        </div>
        
    </div>
</div>
<?php include("includes/admin_upload.php");?>
</center>
<?php
	include("includes/footer.php");
?>
</body>
</html>
