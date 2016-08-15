<style>
	#admin-upload{
		border:2px solid black;
		width:80%;
		padding-bottom:2%;
		margin-bottom:2%;
		margin-top:4%;
	}
</style>
<?php
	if(isset($_SESSION['usertype']) && ($_SESSION['usertype']==0 || $_SESSION['usertype']==1)){
?>
<center>
<div id='admin-upload'>
<h3>Upload Image</h3>
<form action="chapter-upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="image" id='file' />
    <input type="hidden" name='slno' value="<?php echo $book; ?>"/>
    <input type="submit" name="img-upload" id='upload' Value='Upload'>
</form>

<h3>Upload Chapters</h3>
<form action="chapter-upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file[]" id='file' multiple/>
    <input type="hidden" name='slno' value="<?php echo $book; ?>"/>
    <input type="submit" name="upload" id='upload' Value='Upload'>
</form>
</div>
</center>
<?php
	}
?>
