<?php function customError($errno, $errstr) {
  		//echo "<b>Error:</b> [$errno] $errstr<br>";
  		echo "Sorry! Something Went Wrong.";
  		die();
	}
	set_error_handler("customError");
   ?><head>
<link rel="icon" 
      type="image/jpg" 
      href="images/favicon.jpg">
</head>


<style>
a{
	text-decoration:none;	
}
body{
	padding:0px;
	margin:0px;	
}
#img2{
	width:100%;
}

/* Navigation Bar*/
#main-nav-bar{
	width:1350px;
	height:50px;
	background-color:#222222;
	color:grey;	
	border-radius:5px;
}
.main-nav-bar-heading{
	padding:10px 15px 10px 15px;
	display:inline-block;
	font-size:20px;
	text-align:center;
}
a.nav-link:link {
    color: grey;
}

/* visited link */
a.nav-link:visited {
    color: grey;
}

/* mouse over link */
a.nav-link:hover {
    color: white;
}

/* selected link */
a.nav-link:active {
    color: grey;
}
#logged{
	float:right;	
}

</style>

<body>
	<img src="images/header.jpg" id="img2"/>
	<?php
	function adminnav()
	{
	echo "
	<nav class='navbar navbar-inverse'>
  	<div class='container-fluid'>
    <ul class='nav navbar-nav'>
      <li><a href='search.php' style='font-size:23px; margin-left:10px;'>Home</a></li>
      <li><a href='details.php' style='font-size:23px; margin-left:10px;'>Details </a></li>
	  <li><a href='graph.php' style='font-size:23px; margin-left:10px;'>Graph </a></li>
      <li><a href='newadmin.php' style='font-size:23px; margin-left:10px;'>SuperUser</a></li>
	  <li><a href='upload.php' style='font-size:23px; margin-left:10px;'>Upload</a></li>
	  <li><a href='downloads.php' style='font-size:23px; margin-left:10px;'>Uses Data</a></li>
      <li><a href='price-detail.php' style='font-size:23px; margin-left:10px;'>Downloads</a></li>
	  <li><a href='changepass.php' style='font-size:23px; margin-left:10px;'> Change Password </a></li>
	</ul>
    <ul class='nav navbar-nav navbar-right'>
       <li><a href='logout.php' style='font-size:23px;'>Logout</a></li>
    </ul>
  	</div>
	</nav>
	<div id='logged'> <span style='margin-right:10px;'>". $_SESSION['email']."</span>
	</div>";
	}
	function usernav()
	{
		echo "
	<nav class='navbar navbar-inverse'>
  	<div class='container-fluid'>
    <ul class='nav navbar-nav'>
      <li><a href='search.php' style='font-size:23px; margin-left:10px;'>Home</a></li>
      <li><a href='details.php' style='font-size:23px; margin-left:10px;'>Details </a></li>
	  <li><a href='graph.php' style='font-size:23px; margin-left:10px;'>Graph </a></li>
      <li><a href='upload.php' style='font-size:23px; margin-left:10px;'>Upload</a></li>
	  <li><a href='downloads.php' style='font-size:23px; margin-left:10px;'>Uses Data</a></li>
      <li><a href='price-detail.php' style='font-size:23px; margin-left:10px;'>Downloads</a></li>
	  <li><a href='changepass.php' style='font-size:23px; margin-left:10px;'> Change Password </a></li>
	</ul>
    <ul class='nav navbar-nav navbar-right'>
       <li><a href='logout.php' style='font-size:23px;'>Logout</a></li>
    </ul>
  	</div>
	</nav>
	<div id='logged'> <span style='margin-right:10px;'>". $_SESSION['email']."</span>
	</div>";
	}
	
	function allnav()
	{
		echo "
	<nav class='navbar navbar-inverse'>
  	<div class='container-fluid'>
    <ul class='nav navbar-nav'>
	  <li><a href='search.php' style='font-size:23px; margin-left:10px;'>Search</a></li>
	  <li><a href='browse.php' style='font-size:23px; margin-left:10px;'>Complete Record</a></li>
    	<li><a href='home.php' style='font-size:23px; margin-left:10px;'>About us</a></li>
	</ul>
    </div>
	</nav>";
	}
	
	
?>
    
</body>
</html>