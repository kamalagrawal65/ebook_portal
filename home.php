<head>
<title>Home</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
.head{
	color:green;
}
.top-head{
	margin:5%;
	margin-top:30px;
	font-size:19px;
	text-align:justify;	
}
#ebook{
	font-size:25px;
}
.pub-logo{
	width:15%;
	margin-left:3%;
	height:17%;	
}
</style>
<?php
	session_start();
	include("includes/header.php");
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	else
		allnav();
?>

<center>
<h2><span class="head">Welcome to e-Books Portal</span></h2>
</center><br/>
<div class="top-head">
	<div class="info-1">	
    <span id='ebook'><i><b>e-B</b></i></span>ooks portal is a single point access to the e-books collection of more than 10,000 e-books which <i>Central Library, IIT Mandi</i> procured from 2012 till date. The e-books collection is a result of rigorous selection by the faculty community of IIT Mandi. Publication houses from which the books have been selected are listed below:
    </div><br/>
    
    <div id='img-div1'>
    	<img alt="Cambridge" src="images/logos/CambridgeUnivlogo.jpg" class='pub-logo'/>
        <img alt="Elsevier" src="images/logos/ELS_NonSolus.gif" class='pub-logo'/>
        <img alt="IEEE" src="images/logos/ieee-logo.png" class='pub-logo'/>
        <img alt="McGraw-Hill" src="images/logos/McGraw-Hill_90s.jpg" class='pub-logo'/>
        <img alt="Wiley" src="images/logos/John-Wiley-and-Sons-logo.png" class='pub-logo'/>
    </div><br/>
    <div id='img-div1'>
    	<img alt="MCP" src="images/logos/MCP_logo_square.jpg" class='pub-logo'/>
        <img alt="OUP" src="images/logos/oup-logo.jpg" class='pub-logo'/>
        <img alt="RSC" src="images/logos/rsc-logo.jpg" class='pub-logo'/>
        <img alt="Springer" src="images/logos/Springer-logo-logotype.png" class='pub-logo'/>
        <img alt="T&F" src="images/logos/tf_book_logo.gif" class='pub-logo'/>
    </div>
<br/>

    <div class="info-1">
    	The collection includes more than 5000 Lecture notes series in <i>Computer Science</i>, <i>Mathematics</i> & <i>
        Physics</i> from Springer Verlag. RSC eBooks collection covers a span of 42 years of publications of more than 1300 titles. In search of quality contents this portal will give you one stop solution. 
    
    </div>
</div>

<?php
	include("includes/footer.php");
?>