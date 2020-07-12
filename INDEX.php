<?php
	include("Main_funnction.php");
	if(isset($_REQUEST["New_ADD"]))
	{
		extract($_POST);
		if($object->ADD("students","id='$ID',name='$NAME',mobile='$MOBILE',address='$ADDRESS'"))
		{
			$message="Data Insert";	
		}
		else
		{
			$message="Data Inserted Failed";
		}	
	}
	
		if(isset($_REQUEST["DELETE_ID"]))
		{
			$GET_DELETE_ID=$_REQUEST["DELETE_ID"];
			$object->DELETE("students","id='$GET_DELETE_ID'");
			
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
                        <hr />
                        
                        <?=@$message?> 
                    </div>
                    <div class="col-md-8">
                    	<?php
							print_r($object->GET_ALL("*","students"));
						?>
                    </div>
                </div>
            </div>
        </div>
        
        </form>
    </body>

	<script src="js/bootstrap.min.js"></script>
</html>