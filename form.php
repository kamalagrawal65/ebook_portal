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
	include("includes/header.php");
	include("includes/connection.php");
	session_start();
	if(!isset($_SESSION['usertype'])){
		header("location:search.php");	
	}
	if(isset($_SESSION['usertype']) && $_SESSION['usertype']==0)
		adminnav();
	else if(isset($_SESSION['usertype']) && $_SESSION['usertype']==1)
		usernav();
	
	if(isset($_GET['message']) && $_GET['message']=='Data Inserted')
		echo "<center><h3>Data Inserted</h3></center>";
	
?>
<script>
	$(document).ready(function(){
		//conversion_rate change
		$("#conversion_rate").keyup(function(){
			var cr=$("#conversion_rate").val();
			var pp=$("#paid_price").val();
			if(pp!='' && cr!=''){
				$("#price_inr").attr('value',Number(pp)*Number(cr));	
			}else{
				$("#price_inr").attr('value','');
			}
		});
		//paid price change
		$("#paid_price").keyup(function(){
			var pp=$("#paid_price").val();
			var cr=$("#conversion_rate").val();
			if(pp=='' || cr=='')
				$("#price_inr").attr('value','');
			else if(cr!='')
				$("#price_inr").attr('value',Number(pp)*Number(cr));
		});
		//discount_val change
		$("#discount_val").keyup(function(){
			var lp=$("#list_price").val();
			var dv=$("#discount_val").val();
			var cr=$("#conversion_rate").val();
			if(lp!='' && dv!=''){
				$("#paid_price").attr('value',Number(lp)-Number(dv));
				if(cr!='')
					$("#price_inr").attr('value',(Number(lp)-Number(dv))*Number(cr));
			}else{
				$("#paid_price").attr('value','');
				$("#price_inr").attr('value','');
			}
		});
		//discount_percentage change
		$("#discount_per").keyup(function(){
			var lp=$("#list_price").val();
			var dp=$("#discount_per").val();
			var cr=$("#conversion_rate").val();
			if(lp!='' && dp!=''){
				$("#discount_val").attr('value',(Number(dp)/100)*lp);
				$("#paid_price").attr('value',Number(lp)-((Number(dp)/100)*lp));
				if(cr!=''){
					var pp=$("#paid_price").val();
					$("#price_inr").attr('value',Number(pp)*Number(cr));
				}
			}else{
				$("#discount_val").attr('value','');
				$("#paid_price").attr('value','');
				$("#price_inr").attr('value','');
			}
		});
		
		//list-price change
		$("#list_price").keyup(function(){
			var lp=$("#list_price").val();
			var dp=$("#discount_per").val();
			var cr=$("#conversion_rate").val();
			if(lp!='' && dp!=''){
				$("#discount_val").attr('value',(Number(dp)/100)*lp);
				$("#paid_price").attr('value',Number(lp)-((Number(dp)/100)*lp));
				if(cr!=''){
					var pp=$("#paid_price").val();
					$("#price_inr").attr('value',Number(pp)*Number(cr));
				}
			}else{
				$("#discount_val").attr('value','');
				$("#paid_price").attr('value','');
				$("#price_inr").attr('value','');
			}
		});
		
		
		
	});
</script>

	<form method="post" action="newinsert.php">
    	<center>
    	<fieldset class='fieldset1'>
        	<legend class="lege">ENTER NEW BOOK</legend>
            <table>
            	<tr>
                	<td><span  class="col1" class="labelling">Title:</span></td>
                	<td><textarea required class="col2" rows=5 cols=60 name="title" id='title'></textarea></td>
                </tr>
                
                <tr id='auth'>
                	<td><span  class="col1" class="labelling">Authors:</span><br/></td>
                	<td><textarea required class="col2" id='author_ta' rows=5 cols=60 name='author'></textarea></td>
              	</tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input required class="col2" type="text" name='publisher'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">School:</span><br/></td>
                	<td><input required class="col2" type="text" name='school'></td>
                </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" name='subject'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Published In:</span><br/></td>
                	<td><input class="col2" type="text" name='published'></td>
                </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Category:</span><br/></td>
                	<td><input class="col2" type="text" name='category'></td>
                </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Access No:</span><br/></td>
                	<td><input class="col2" type="text" name='accessno'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Biblo No:</span><br/></td>
                	<td><input class="col2" type="text" name='biblono'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">DOI:</span><br/></td>
                	<td><input class="col2" type="text" name='doi'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">ISBN:</span><br/></td>
                	<td><input class="col2" type="text" name='isbn'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Recommended By:</span><br/></td>
                	<td><input class="col2" type="text" name='recby'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">URL:</span><br/></td>
                	<td><input required class="col2" type="text" name='url'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Procured In:</span><br/></td>
                	<td><input class="col2" type="text" name='procured'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Source:</span><br/></td>
                	<td><input class="col2" type="text" name='source'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Invoice No:</span><br/></td>
                	<td><input class="col2" type="text" name='invoiceno'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Invoice Date:</span><br/></td>
                	<td><input class="col2" type="text" name='invoice_date'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Currency:</span><br/></td>
                	<td><input class="col2" type="text" name='currency'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">List Price:</span><br/></td>
                	<td><input class="col2" id='list_price' type="text" name='list_price'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Discount %:</span><br/></td>
                	<td><input class="col2" type="text" id='discount_per' name='discount_per'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Discount Value:</span><br/></td>
                	<td><input class="col2" type="text" id='discount_val' name='discount_val'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Paid Price:</span><br/></td>
                	<td><input class="col2" type="text" id='paid_price' name='paid_price'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Conversion Rate:</span><br/></td>
                	<td><input class="col2" type="text" id='conversion_rate' name='conversion'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling">Price INR:</span><br/></td>
                	<td><input class="col2" type="text" id='price_inr' name='price_inr'></td>
                </tr>
            </table>
        </fieldset>
        </center>
        
        <center>
        <fieldset class="fieldset1">
        	<legend class="lege">More Information...</legend>
        	<table>
                <tr id='auth'>
                	<td><span  class="col1 " class="labelling">Summary:</span><br/></td>
                	<td><textarea class="col2" id='big_ta' rows=10 cols=100 name='summary'></textarea></td>
              	</tr>
            </table>    
        </fieldset>
        </center>
        
        <center>
 		<input type="submit" value="SUBMIT" id='submit'/>
		</center>
		
	</form>
	
<?php
	include("includes/footer.php");
?>