<style>
.searchbar_res{
	height:100%;
	margin-top:6px;
	margin:10px;
	margin-left:-25px;
	text-align:left;
	padding-left:10px;
	border-radius:5px;	
	border-bottom:1px dashed black;
}
.searchbar_res:hover{
	background-color:#99C;	
}
a#sch{
	font-size:20px;	
}
a#sch:visited{
	color:black;	
}
a#sch:hover{
	color:black;	
}
a#sch:active{
	color:black;	
}
a#sch:link{
	color:black;	
}
a#sch{
	text-decoration:none;	
}
</style>
<?php
	include('connection.php');
	if($_POST['keyword']==''){
			
	}
	else{
		if($_POST['col']=='publisher'){
			$query="select distinct pname from publisher_table where pname like ('%{$_POST['keyword']}%')";	
		}
	
	$result=mysqli_query($connection,$query);
	$counter=mysqli_num_rows($result);
	if($counter>0){
		echo "<ul>";
		$i=5;
		while($row=mysqli_fetch_row($result)){
			if($i>0)
				echo "<div class='searchbar_res'><a id='sch' href='book.php?searchby=publisher&search-text={$row[0]}'>$row[0]</a></div>";
			else 
				break;
			$i=$i-1;
		}
		echo "</ul>";
		if($counter>5){
			echo "<center><div searchbar_res><a id='sch' href='browse.php'>See All Results</a></div></center>";	
		}
	}
	}
?>