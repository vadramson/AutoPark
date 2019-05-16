<?php
@include("../Model/db.php");

$db = new AUTOPARK();

        if(isset($_POST["deactivate_carModel"]))
	{
		$idModel = trim($_POST["idModel"]);		
		$db->bdd->query(" UPDATE carmodel SET status = 0 where idModel = '".$idModel."'") or die(mysql_error());
	}
        
        if(isset($_POST["activate_Carmodel"]))
	{
		$idModel = trim($_POST["idModel"]);		
		$db->bdd->query(" UPDATE carmodel SET status = 1 where idModel = '".$idModel."'") or die(mysql_error());
	}
        if(isset($_POST["deactivate_Driver"]))
	{
		$idDriver = trim($_POST["idDriver"]);		
		$db->bdd->query(" UPDATE drivers SET status = 0 where idDriver = '".$idDriver."'") or die(mysql_error());
	}
        
        if(isset($_POST["activate_Driver"]))
	{
		$idDriver = trim($_POST["idDriver"]);		
		$db->bdd->query(" UPDATE drivers SET status = 1 where idDriver = '".$idDriver."'") or die(mysql_error());
	}
        
      
        
        
?>