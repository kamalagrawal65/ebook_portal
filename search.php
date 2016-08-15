<head>
<title>Search</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<script>
	$(document).ready(function(){
		$("#search-text").keyup(function(){
			//alert(str);
			if($("#dropdown").val()=='publisher'){
				$.ajax({
				type: "POST",
				url: "includes/getdata.php",
				data:{'keyword':$(this).val(),'col':$('#dropdown').val()},
				beforeSend: function(){
					$("#search-text").css("background","#FFF");
				},
				success: function(data){
					$(".suggboxdet").show();
					$(".suggboxdet").html(data);
					$("#search-text").css("background","#FFF");
				}
				});
			}
	});
		});
		
	$(document).keyup(function(e) {
    	if (e.keyCode == 27) {
        	$(".suggboxdet").fadeOut(10); 
		}
	});
	$(document).bind('click', function(e) {
	  var $clicked = $(e.target);
	  if (!$clicked.parents().hasClass("search-text")) $(".suggboxdet").hide();
	});
	
</script>

<style>

#dropdown{
	height:40px;
	width:200px;	
	border-radius:10px;
	outline:none;
}
#search-text{
	width:60%;
	padding-left:2%;
	height:40px;
	margin-left:0px;
	border-radius:10px;
	outline:none;
}
form{
	background-color:#F60;
	border-radius:20px;
	padding:10px;
	margin-top:6%;	
}
#search{
	height:40px;
	width:15%;
	outline:none;
	background-color:#06C;
	border-radius:5px;
	border:1px solid #F60;
	COLOR:WHITE;
}
.head{
	display:inline;
	color:#060;	
}
#about-search{
	margin-top:50px;
	font-size:16px;	
	text-align:justify;
}
#search{
	border-radius:10px;	
}
.suggbox{
	display:inline;
}
#search{
	margin-left:0px;
	displaY:inline;	
}
.suggboxdet{
	background-color:#F60;
	z-index:999;
	overflow:auto;
	position:absolute;
	margin-left:19%;
	width:400px;	
}
</style>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
		$query="select name,password,user_type,email from admin_table where email='".$email."'";
		$result=mysqli_query($connection,$query);	
		$row=mysqli_fetch_row($result);
		if($pass!=$row[1]){
			header("location:login.php?error=Invalid Password Or Email do not Exist");
			exit();
		}
		else{
			$_SESSION['username']=$row[0];
			$_SESSION['usertype']=$row[2];
			$_SESSION['email']=$row[3];
		}
	}
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	else
		allnav();
	
?>
<body>
<div class="container">
<center>
<br/>
<h2 class="head">Search <span >e</span>-B</h2><h3 class="head"><span>ooks</span></h3><h2 class="head"> P</h2><h3 class="head"><span>ortal</span></h3>
<form action="book.php" method="post">
	    <select name='searchby' id='dropdown'>
            <option value="author">Author</option>
            <option value="title">Title</option>
            <option value="publisher">Publisher</option>
            <option value="school">School</option>
            <option value="subject">Subject</option>
        </select>
        <div class="suggbox">
        	<input type="text" autocomplete="off" id='search-text' placeholder="Search" name='search-text'/>
    		<div class="suggboxdet"></div>    	
        </div>
        <input type="submit" id='search' name='search' value="Search"/>
</form>
<a style="float:right" href="advance-search.php">Advanced Search</a>


<div id='about-search'>
	This is a single window search to the e-books collection of IIT Mandi. Either you just enter your search term in the window provided above to search or go to advanced search option. In <a href="advance-search.php"><i>Advanced search</i></a> you can make your search more specific to avoid irrelevant result hits. In order to make your search more specific you make combination of two or three search terms by using Boolean search. You also can <a href="browse.php"><i>Browse</i></a> full collection publisher wise, Subject wise and School wise. 
</div>

</center>
</div>
</body>

<?php
	include("includes/footer.php");
?>