<?php
	function getquery($funcol,$funkey){
		$funquery=NULL;
		if($funcol=='author'){
			$funquery="select slno from author_table where aname like ('%".$funkey."%')";	
		}
		else if($funcol=='title'){
			$funquery="select slno from ebook_table where title like ('%".$funkey."%')";
		}
		else if($funcol=='publisher'){
			$funquery="select slno from ebook_table where pid in (select pid from publisher_table where pname like ('%".$funkey."%'))";	
		}
		else if($funcol=='school'){
			$funquery="select slno from ebook_table where sid in (select sid from school_table where school like ('%".$funkey."%'))";
		}
		else if($funcol=='subject'){
			$funquery="select slno from ebook_table where sub_id in (select sub_id from subject_table where subject like ('%".$funkey."%'))";
		}
		return $funquery;	
	}
	
	$dropdown1=$_POST['dropdown1'];
	$dropdown2=$_POST['dropdown2'];
	$dropdown3=$_POST['dropdown3'];
	
	$input1=$_POST['input1'];
	$input2=$_POST['input2'];
	$input3=$_POST['input3'];
	
	if($input1!=''){
		$myquery=getquery($dropdown1,$input1);
		$myresult=mysqli_query($connection,$myquery);
		$myrow=mysqli_fetch_row($myresult);
		$query_string.=" (slno=".$myrow[0];
		while($myrow=mysqli_fetch_row($myresult)){
			$query_string.=" or slno=".$myrow[0];
		}
		$query_string.=")";
	}
	
	if($input2!=''){
		$myquery=getquery($dropdown2,$input2);
		$myresult=mysqli_query($connection,$myquery);
		$myrow=mysqli_fetch_row($myresult);
		if(($_POST['boolean1']=='and') || ($_POST['boolean1']=='or')){
			$query_string.=" ".$_POST['boolean1']." ";
			$query_string.=" (slno=".$myrow[0];
			while($myrow=mysqli_fetch_row($myresult)){
				$query_string.=" or slno=".$myrow[0];
			}
			$query_string.=")";
		}
		else if($_POST['boolean1']=='not'){
			$query_string.=" and ";
			$query_string.=" (slno!=".$myrow[0];
			while($myrow=mysqli_fetch_row($myresult)){
				$query_string.=" and slno!=".$myrow[0];
			}
			$query_string.=")";
		}
	}
	
	if($input3!=''){
		$myquery=getquery($dropdown3,$input3);
		$myresult=mysqli_query($connection,$myquery);
		$myrow=mysqli_fetch_row($myresult);
		if(($_POST['boolean2']=='and') || ($_POST['boolean2']=='or')){
			$query_string.=" ".$_POST['boolean2']." ";
			$query_string.=" (slno=".$myrow[0];
			while($myrow=mysqli_fetch_row($myresult)){
				$query_string.=" or slno=".$myrow[0];
			}
			$query_string.=")";
		}
		else if($_POST['boolean2']=='not'){
			$query_string.=" and ";
			$query_string.=" (slno!=".$myrow[0];
			while($myrow=mysqli_fetch_row($myresult)){
				$query_string.=" and slno!=".$myrow[0];
			}
			$query_string.=")";
		}
	}
	
?>