<?php
	$query_string=NULL;
	if(isset($_POST['download']) || isset($_POST['filter'])){
		//recby
		if(isset($_POST['recby']) && $_POST['recby']!=''){
			$query="select slno from ebook_table where recby='".$_POST['recby']."'";
			$result=mysqli_query($connection,$query);
			if($result){
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		//publisher
		if(isset($_POST['publisher']) && $_POST['publisher']!=''){
			$query="select slno from ebook_table where pid in (select pid from publisher_table where pname='".$_POST['publisher']."')";
			$result=mysqli_query($connection,$query);
			if($result){
				if($query_string!=NULL)
					$query_string.=" AND ";
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		//school
		if(isset($_POST['school']) && $_POST['school']!=''){
			$query="select slno from ebook_table where sid in (select sid from school_table where school='".$_POST['school']."')";
			$result=mysqli_query($connection,$query);
			if($result){
				if($query_string!=NULL)
					$query_string.=" AND ";
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		//subject
		if(isset($_POST['subject']) && $_POST['subject']!=''){
			$query="select slno from ebook_table where sub_id in (select sub_id from subject_table where subject='".$_POST['subject']."')";
			$result=mysqli_query($connection,$query);
			if($result){
				if($query_string!=NULL)
					$query_string.=" AND ";
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		//procured year
		if(isset($_POST['procured']) && $_POST['procured']!=''){
			$query="select slno from ebook_table where procured_in=".$_POST['procured'];
			$result=mysqli_query($connection,$query);
			if($result){
				if($query_string!=NULL)
					$query_string.=" AND ";
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		//published year
		if(isset($_POST['published']) && $_POST['published']!=''){
			$query="select slno from ebook_table where year=".$_POST['published'];
			$result=mysqli_query($connection,$query);
			if($result){
				if($query_string!=NULL)
					$query_string.=" AND ";
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		
		//mode of access
		if(isset($_POST['category']) && $_POST['category']!=''){
			$query="select slno from ebook_table where category_id in (select cid from category_table where category='".$_POST['category']."')";
			echo $query;
			$result=mysqli_query($connection,$query);
			if($result){
				if($query_string!=NULL)
					$query_string.=" AND ";
				$row=mysqli_fetch_row($result);
				$query_string.="(slno=".$row[0];
				while($row=mysqli_fetch_row($result)){
					$query_string.=" or slno=".$row[0];
				}
				$query_string.=")";
			}
		}
		
	}
	if($query_string==NULL)
		$query_string=1;
?>