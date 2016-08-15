<?php
	include("includes/connection.php");
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");
		exit();
	}
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1){
		header("location:search.php");
		exit();
	}

?><head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>



<style>
	th{
		background-color:orange;	
	}
</style>
<body>
<br/><br/><br/>
<div class="container">
  <div class="table-responsive">          
  	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Acess Type</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  	$query="select name,user_type,email from admin_table where user_type=0 or user_type=1";
		$result=mysqli_query($connection,$query);
	  	if(!$result)
			die("Error!");
		while($row=mysqli_fetch_row($result)){
			$type="User";
			echo "<tr>";
			if($row[1]==0){
				$type="Master";
				echo "<td>".$row[0]."</td><td>".$row[2]."</td><td>".$type."</td><td>Cant Remove</td>";	
			}
			else if($row[1]==1){
				echo "<td>".$row[0]."</td><td>".$row[2]."</td><td>User</td><td>
				<a href='newadmin.php?remove=1&email=".$row[2]."'>Remove</a></td>";
			}
			echo "</tr>";
		}
	  ?>
    </tbody>
  </table>
  </div>
</div>

</body>