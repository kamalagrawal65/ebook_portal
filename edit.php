<head>
<title>Edit Book Details</title>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<link rel="stylesheet" href="css/form.css"/>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"/>
</head>
<style>
	textarea{
		text-align:left;
		padding-left:10px;
		resize:none;
	}
</style>
<?php
	session_start();
	include("includes/header.php");
	include("includes/connection.php");
	
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");	
	}
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	
	if(isset($_GET['message']) && $_GET['message']=='Data Updated')
		echo "<center><h3>Data Updated</h3></center>";
	
	$author_query="select aname from author_table where slno=".$_GET['bookno'];
	$author_result=mysqli_query($connection,$author_query);
	$author=NULL;
	$auth_row=mysqli_fetch_row($author_result);
	$author=$auth_row[0];
	while($auth_row=mysqli_fetch_row($author_result)){
		$author.=",".$auth_row[0];
	}
	
	$query="SELECT `title`, `pname`, `subject`, `year`, `category`, `access_no`, `biblo_no`, `contents`, `doi`, `isbn`, `summary`, `recby`, `url`, `school`, `procured_in`, `source_name`, `invoice_no`, `invoice_date`, `currency`, `list_price`, `discount_per`, `discount_val`, `paid_price`, `conversion_rate`, `price_inr`, `slno` FROM `ebook_table` e,publisher_table p,school_table s,subject_table sub,category_table cate,currency_table curr,source_table sour WHERE e.pid=p.pid and e.sub_id=sub.sub_id and e.category_id=cate.cid and e.sid=s.sid and e.source_id=sour.source_id and e.curr_id=curr.cid and slno=".mysqli_real_escape_string($connection,$_GET['bookno']);
	$result=mysqli_query($connection,$query);
	if(!($result))
		header("location:price-detail.php?No Results Found");
	$row=mysqli_fetch_row($result);

	$title=$row[0];
	$publisher=$row[1];
	$subject=$row[2];
	$year=$row[3];
	$category=$row[4];
	$accessno=$row[5];
	$biblono=$row[6];
	$contents=$row[7];
	$doi=$row[8];
	$isbn=$row[9];
	$summary=$row[10];
	$recby=$row[11];
	$url=$row[12];
	$school=$row[13];
	$procured=$row[14];
	$source=$row[15];
	$invoiceno=$row[16];
	$invoice_date=$row[17];
	$currency=$row[18];
	$list_price=$row[19];
	$discount_per=$row[20];
	$discount_val=$row[21];
	$paid_price=$row[22];
	$conversion_rate=$row[23];
	$price_inr=$row[24];
?>
	<form method="post" action="update.php">
    	<center>
    	<fieldset class='fieldset1'>
        	<legend class="lege">EDIT BOOK DETAILS</legend>
            <table>
            	<tr>
                	<td><span  class="col1" class="labelling">Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="title" id='title'><?php echo $title; ?></textarea></td>
                </tr>
                
                <tr id='auth'>
                	<td><span  class="col1" class="labelling">Authors:</span><br/></td>
                	<td><textarea class="col2" id='author_ta' readonly rows=5 cols=60 name='author'><?php echo $author; ?></textarea></td>
              	</tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" value="<?php echo $publisher; ?>" type="text" name='publisher'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">School:</span><br/></td>
                	<td><input class="col2" value="<?php echo $school; ?>" type="text" name='school'></td>
                </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" value="<?php echo $subject; ?>" type="text" name='subject'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Published In:</span><br/></td>
                	<td><input class="col2" value="<?php echo $year; ?>" type="text" name='published'></td>
                </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Category:</span><br/></td>
                	<td><input class="col2" value="<?php echo $category; ?>" type="text" name='category'></td>
                </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Access No:</span><br/></td>
                	<td><input class="col2" value="<?php echo $accessno; ?>" type="text" name='accessno'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Biblo No:</span><br/></td>
                	<td><input class="col2" value="<?php echo $biblono; ?>" type="text" name='biblono'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">DOI:</span><br/></td>
                	<td><input class="col2" value="<?php echo $doi; ?>" type="text" name='doi'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">ISBN:</span><br/></td>
                	<td><input class="col2" value="<?php echo $isbn; ?>" type="text" name='isbn'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Recommended By:</span><br/></td>
                	<td><input class="col2" value="<?php echo $recby; ?>" type="text" name='recby'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">URL:</span><br/></td>
                	<td><input class="col2" value="<?php echo $url; ?>" type="text" name='url'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Procured In:</span><br/></td>
                	<td><input class="col2" value="<?php echo $procured; ?>" type="text" name='procured'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Source:</span><br/></td>
                	<td><input class="col2" value="<?php echo $source; ?>" type="text" name='source'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Invoice No:</span><br/></td>
                	<td><input class="col2" value="<?php echo $invoiceno; ?>" type="text" name='invoiceno'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Invoice Date:</span><br/></td>
                	<td><input class="col2" value="<?php echo $invoice_date; ?>" type="text" name='invoice_date'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Currency:</span><br/></td>
                	<td><input class="col2" value="<?php echo $currency; ?>" type="text" name='currency'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">List Price:</span><br/></td>
                	<td><input class="col2" value="<?php echo $list_price; ?>" type="text" name='list_price'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Discount %:</span><br/></td>
                	<td><input class="col2" value="<?php echo $discount_per; ?>" type="text" name='discount_per'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Discount Value:</span><br/></td>
                	<td><input class="col2" value="<?php echo $discount_val; ?>" type="text" name='discount_val'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Paid Price:</span><br/></td>
                	<td><input class="col2" value="<?php echo $paid_price; ?>" type="text" name='paid_price'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Conversion Rate:</span><br/></td>
                	<td><input class="col2" value="<?php echo $conversion_rate; ?>" type="text" name='conversion'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Price INR:</span><br/></td>
                	<td><input class="col2" value="<?php echo $price_inr; ?>" type="text" name='price_inr'></td>
                </tr>
            </table>
        </fieldset>
        </center>
        
        <center>
        <fieldset class="fieldset1">
        	<legend class="lege">More Information...</legend>
        	<table>
            	<tr id='auth'>
                	<td><span  class="col1" class="labelling">Content:</span><br/></td>
                	<td><textarea readonly class="col2" id='big_ta' rows=10 cols=100 name='content'><?php
						$chap_query="select chapter_name from chapter_table where slno=".$_GET['bookno'];
						$chap_result=mysqli_query($connection,$chap_query);
						while($chap_row=mysqli_fetch_row($chap_result)){
							echo $chap_row[0]."\n";	
						}
					 
					 ?></textarea></td>
              	</tr>
                <tr id='auth'>
                	<td><span  class="col1 " class="labelling">Summary:</span><br/></td>
                	<td><textarea class="col2" id='big_ta' rows=10 cols=100 name='summary'><?php echo $summary; ?></textarea></td>
              	</tr>
            </table>    
        </fieldset>
        </center>
        
        <input type="hidden" value="<?php echo $_GET['bookno']; ?>" name='slno' />
        <center>
 		<input type="submit" value="SUBMIT" id='submit'/>
		</center>
		
	</form>

<?php
	include("includes/footer.php");
?>