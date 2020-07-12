<?php
class Main_function
{
	public $conn;
	
	function __construct($dsn,$user_name,$password)
	{
		try
		{
			$this->conn=new PDO($dsn,$user_name,$password);
		}
		catch(PDOException $ex)
		{
			echo die("Database Connection Failed").$ex->getMessage();	
		}
	}

	function GET_ALL($Colum,$tabel_name)
	{
		
		$sql="SELECT $Colum FROM $tabel_name";
		$Query_prepaer=$this->conn->prepare($sql);
		$Query_prepaer->execute();
		
		$Result=$Query_prepaer->fetchAll(PDO::FETCH_ASSOC);
		echo "<pre>";
		$GET_KEY=array_keys($Result[0]);
		
		echo "<pre>";
		$Tabel="<table class=\"table-responsive\"  align=\"center\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"680\">";
			$Tabel.="<tr>";
			$EDIT_Action="EDIT";
			$DELETE_Action="DELETE";
			array_push($GET_KEY,$EDIT_Action,$DELETE_Action);
			foreach($GET_KEY as $Student_information_Key)
			{	
					$Tabel.="<td class=\"bg-primary\"  align=\"center\">$Student_information_Key</td>";
					
					
				
			}
			$Tabel.="<tr>";
			
			$Tabel.="<tr>";
			foreach($Result as $Student_information)
			{
				$Tabel.="<tr>";
				extract($Student_information);
				
					$new_element="<a href=\"EDIT.php?EDIT_ID=$id\">Edit</a>";
					$ELEMENT="<a href=\"INDEX.php?DELETE_ID=$id\">Delete</a>";
					array_push($Student_information,$new_element,$ELEMENT);
					foreach($Student_information as $View_colum)
					{
						$Tabel.="<td align=\"center\">$View_colum</td>";
					}
				$Tabel.="<tr>";	
			}
			$Tabel.="<tr>";
		$Tabel.="<table border=\"1\" cellspacing=\"0\" cellpadding=\"1\">";
		return $Tabel;
	}
	
	function ADD($Tabel_name,$Condication)
	{
		$sql="INSERT INTO $Tabel_name SET $Condication";
		$Result_Prepepare=$this->conn->prepare($sql);
		$Result_Prepepare->execute();
		
		if($Result_Prepepare->rowCount())
		{
			return true;	
		}
		else
		{
			return false;
		}	
	}
	
	public function GET_INROMATION_BY_ID($COLUM,$TABEL,$CONDICATION)
	{
		$sql="SELECT $COLUM FROM $TABEL WHERE $CONDICATION";
		
		$INFORMATION_QUERY_PREPARE=$this->conn->prepare($sql);
		$INFORMATION_QUERY_PREPARE->execute();
		if($INFORMATION_QUERY_PREPARE->rowCount())
		{
			return $INFORMATION_QUERY_PREPARE->fetch(PDO::FETCH_ASSOC);
		}
		else
		{
			return false;
		}	
	}	
	
	public function DELETE($TABEL,$CONDICATION)
	{
		$sql="DELETE FROM $TABEL WHERE $CONDICATION ";
		
		$INFORMATION_QUERY_PREPARE=$this->conn->prepare($sql);
		$INFORMATION_QUERY_PREPARE->execute();
		if($INFORMATION_QUERY_PREPARE->rowCount())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	public function UPDATE($TABEL,$CONDICATION)
	{
		$sql="UPDATE $TABEL SET $CONDICATION";
		
		$INFORMATION_QUERY_PREPARE=$this->conn->prepare($sql);
		$INFORMATION_QUERY_PREPARE->execute();
		if($INFORMATION_QUERY_PREPARE->rowCount())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
}

$object=new Main_function("mysql:dbname=laravel;hostname=localhost","root","");

?>