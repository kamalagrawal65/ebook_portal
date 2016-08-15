<?php
	if($col=='author'){
			$query="select slno from author_table where aname like ('%".$key."%')";	
		}
		else if($col=='title'){
			$query="select slno from ebook_table where title like ('%".$key."%')";
		}
		else if($col=='publisher'){
			$query="select slno from ebook_table where pid in (select pid from publisher_table where pname like ('%".$key."%'))";	
		}
		else if($col=='school'){
			$query="select slno from ebook_table where sid in (select sid from school_table where school like ('%".$key."%'))";
		}
		else if($col=='subject'){
			$query="select slno from ebook_table where sub_id in (select sub_id from subject_table where subject like ('%".$key."%'))";
		}
		//process the resulting query		
		$result=mysqli_query($connection,$query);
		if(!$result){
			die("No Results Found");	
		}
		else if($result){
			$row=mysqli_fetch_row($result);
			$query_string.="(slno=".$row[0];
			while($row=mysqli_fetch_row($result)){
				$query_string.=" or slno=".$row[0];
			}
			$query_string.=")";
		}
?>