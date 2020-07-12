<?php
	include("Main_funnction.php");
	if(isset($_REQUEST["EDIT_ID"]))
	{
		$GET_EDIT_ID=$_REQUEST["EDIT_ID"];
		if($GET_INFORMATION=$object->GET_INROMATION_BY_ID("*","students","id='$GET_EDIT_ID'"))
		{
				$message="<font color=\"green\">Data Found";
		}
		else
		{
				$message="<font color=\"red\">Data NOT Found</font>";	
		}
	}
	
	
	if(isset($_REQUEST["New_ADD"]))
	{
		extract($_POST);
		if($object->ADD("students","id='$ID',name='$NAME',mobile='$MOBILE',address='$ADDRESS'"))
		{
			$ISERT_message="Data Insert";	
		}
		else
		{
			$ISERT_message="Data Inserted Failed";
		}	
	}
	
	
	if(isset($_REQUEST["UPDATE"]))
	{
		extract($_POST);
		if($object->UPDATE("students","id='$ID2',name='$NAME2',mobile='$MOBILE2',address='$ADDRESS2' WHERE id='$HIDEN_ID'"))
		{
			$ISERT_message="Data UPDATE";	
		}
		else
		{
			$ISERT_message="Data UPDATE Failed";
		}	
	}
	
?>
<html>
	<title>TRY FOR OBJECT ORIENTED PHP </title>
    <head>
    	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/Header.css" type="text/css" />
    </head>
    <body>
    <form name="" action="" method="post">
    	<div class="container">
        	<div class="Heder">
        		<div class="row">
            		<div class="col-md-12">
                		Try Object Oriented PHP
                	</div>
            	</div>
            </div>
        </div>
        
       
        	<div class="Mid_part">
            	<div class="row">
                 <div class="container">
                	<div class="col-md-4" style=" text-align:center;background:#CCC;height:500px; font-size:18px; font-family:'Times New Roman', Times, serif">
                    
                    	New Student Data Entry
                      <br />
                    	<hr />
                        Student ID 
                        <input type="text" name="ID" class=" form-control" />
                        Student Name 
                        <input type="text" name="NAME" class=" form-control" />
                        Mobile Number
                        <input type="text" name="MOBILE" class=" form-control" />
                        Student Address 
                        <input type="text" name="ADDRESS" class=" form-control" /><br />
                        <input type="submit" name="New_ADD" align="center" value="ADD" class="btn btn-primary" />
                        <hr>
                        <?=@$ISERT_message?>
                	</div>
                	
                    <div class="col-md-8">
                    <?php
						extract($GET_INFORMATION);
					?>
                    <a href="INDEX.php">GO</a>
                      <table align="center" style="margin-top:50px; font-family:'Times New Roman', Times, serif; border:black 1px solid" width="508" height="226" border="0" cellpadding="0" cellspacing="0" class="table-responsive">
                	  <tr>
                	    <td height="32" colspan="3" class="bg-primary">Student Information</td>
                	    </tr>
                	  <tr>
                	    <td>&nbsp;</td>
                	    <td>&nbsp;</td>
                	    <td>&nbsp;</td>
              	    </tr>
                    
                	  <tr>
                	    <td width="197" height="27" align="right">ID</td>
                	    <td width="2">&nbsp;</td>
                	    <td width="301"><input type="text" name="ID2" value="<?=$id?>" id="textfield">
               	        <input type="hidden" name="HIDEN_ID" value="<?=$id?>" id="textfield5"></td>
              	    </tr>
                	  <tr>
                	    <td height="29" align="right">Name</td>
                	    <td>&nbsp;</td>
                	    <td><input type="text" name="NAME2" value="<?=$name?>" id="textfield2"></td>
              	    </tr>
                	  <tr>
                	    <td height="28" align="right">Mobile</td>
                	    <td>&nbsp;</td>
                	    <td><input type="text" name="MOBILE2" value="<?=$mobile?>" id="textfield3"></td>
              	    </tr>
                	  <tr>
                	    <td height="28" align="right">Address</td>
                	    <td>&nbsp;</td>
                	    <td><input type="text" name="ADDRESS2"  value="<?=$address?>" id="textfield4"></td>
              	    </tr>
                	  <tr>
                	    <td colspan="3"><?=@$message?></td>
                	    </tr>
                	  <tr>
                	    <td colspan="3"><input name="UPDATE" type="submit" class="btn btn-default" id="button" value="UPDATE"></td>
                	    </tr>
                	  <tr>
                	    <td colspan="3">&nbsp;</td>
              	    </tr>
              	      </table>
                   </div>
                </div>
            </div>
        </div>
        
        </form>
    </body>

	<script src="js/bootstrap.min.js"></script>
</html>