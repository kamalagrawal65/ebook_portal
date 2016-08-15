<?php
	include("includes/connection.php");		
	$slno=$_POST['slno'];
	
	if(isset($_POST['img-upload'])){
		$file_name = $_FILES['image']['name'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_namm=$slno.".png";
		move_uploaded_file($file_tmp,"images/books/".$file_namm);
		$query="update ebook_table set img='{$file_namm}' where slno=".$slno;
		$result=mysqli_query($connection,$query);
		echo "<center><h1>Image Uploaded</h1></center>";
	}		
	else if(isset($_POST['upload'])){
		//echo count(array_filter($_FILES['file']['name']));
		$fileCount=count($_FILES['file']['name']);
		$fileSize=$_FILES['file']['size'];
		
		for($i=0;$i<$fileCount;$i++) {
			if ($fileSize[$i] > 0) {
				$file_name = $_FILES['file']['name'][$i];
				if(!is_dir("pdfs/$slno"))
					mkdir("pdfs/$slno");
				$file_tmp =$_FILES['file']['tmp_name'][$i];
				move_uploaded_file($file_tmp,"pdfs/$slno/".$file_name);
				$query="insert into chapter_table (`slno`, `chapter_name`) VALUES ('".$slno."','".$file_name."')";
				$result=mysqli_query($connection,$query);
			}
		}
		echo "<center><h1>Chapters Uploaded</h1></center>";
	}
	else if(isset($_POST['upload']) && $_POST['upload']==''){
		header("location:book-detail.php");
		exit();
	}
	else if(isset($_POST['img-upload']) && $_POST['img-upload']==''){
		header("location:book-detail.php");
		exit();
	}
?>

<?php
	include("includes/footer.php");
?>