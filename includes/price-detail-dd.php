<?php
	function publisher_dd(){
		$connection=$GLOBALS['connection'];
		$query="select pname from publisher_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " autocomplete='off' placeholder='All' list='publisher' name='publisher'><datalist id='publisher' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function school_dd(){
		$connection=$GLOBALS['connection'];
		$query="select school from school_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " placeholder='All' autocomplete='off' list='school' name='school'><datalist id='school' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function subject_dd(){
		$connection=$GLOBALS['connection'];
		$query="select subject from subject_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " autocomplete='off' placeholder='All' list='subject' name='subject'><datalist id='subject' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function procured_dd(){
		$connection=$GLOBALS['connection'];
		$query="select distinct procured_in from ebook_table order by procured_in desc";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " autocomplete='off' placeholder='All' list='procured' name='procured'><datalist id='procured' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function published_dd(){
		$connection=$GLOBALS['connection'];
		$query="select distinct year from ebook_table order by year desc";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " autocomplete='off' placeholder='All' list='published' name='published'><datalist id='published' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function recby_dd(){
		$connection=$GLOBALS['connection'];
		$query="select distinct recby from ebook_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " autocomplete='off' placeholder='All' list='recby' name='recby'><datalist id='recby' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
	function category_dd(){
		$connection=$GLOBALS['connection'];
		$query="select distinct category from category_table";
		$result=mysqli_query($connection,$query);
		echo "<input class='col22'";
		echo " autocomplete='off' placeholder='All' list='category' name='category'><datalist id='category' >";
		while($row=mysqli_fetch_row($result)){
			echo "<option value='{$row[0]}'/>";
		}
		echo "</datalist>";
	}
?>
<style>
form{
	background-color:#F90;
	width:80%;
	margin-top:3%;
	padding-top:1%;
	padding-bottom:1%;	
}
th{
	text-align:center;
	background-color:#F90;
	COLOR:WHITE;	
}
td{
	text-align:center;
}
.table{
	
}
#submit{
	margin-top:4%;
	width:200px;
	height:32px;	
}
tr:hover{
	background-color:#FC0;	
}
td{
	text-align:left;	
}
</style>
<center>
<form action="price-detail.php" method="post">
	<table>
    <tr><td class="label-search">School</td><td><?php school_dd(); ?></td></tr>
    <tr><td class="label-search">Subject</td><td><?php subject_dd(); ?></td></tr>
    <tr><td class="label-search">Procured Year</td><td><?php procured_dd(); ?></td></tr>
    <tr><td class="label-search">Publisher</td><td><?php publisher_dd(); ?></td></tr>
    <tr><td class="label-search">Recommended By</td><td><?php recby_dd(); ?></td></tr>
    <tr><td class="label-search">Publication Year</td><td><?php published_dd(); ?></td></tr>
    <tr><td class="label-search">Mode of Access</td><td><?php category_dd(); ?></td></tr>
    <tr><td><input name="download" class="col1" type="submit" id='submit' value='Download'/></td><td><input name="filter" class="col22" type="submit" id='submit' value='Filter'/></td></tr>
	</table>
</form>

</center>
