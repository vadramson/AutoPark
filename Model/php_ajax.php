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
        
        if(isset($_POST["deactivate_Vehicle"]))
	{
		$idVehicle = trim($_POST["idVehicle"]);		
		$db->bdd->query(" UPDATE vehicles SET status = 0 where idVehicle = '".$idVehicle."'") or die(mysql_error());
	}
        
        if(isset($_POST["activate_Vehicle"]))
	{
		$idVehicle = trim($_POST["idVehicle"]);		
		$db->bdd->query(" UPDATE vehicles SET status = 1 where idVehicle = '".$idVehicle."'") or die(mysql_error());
	}
        
        if(isset($_POST["deactivate_Driver"]))
	{
		$idDriver = trim($_POST["idDriver"]);		
		$db->bdd->query(" UPDATE drivers SET status = 0 where idDriver = '".$idDriver."' ") or die(mysql_error());
	}
        
        if(isset($_POST["activate_Driver"]))
	{
		$idDriver = trim($_POST["idDriver"]);		
		$db->bdd->query(" UPDATE drivers SET status = 1 where idDriver = '".$idDriver."' ") or die(mysql_error());
	}
        
        if(isset($_POST["cancel_rental"]))
	{
		$idRental = trim($_POST["idRental"]);		
		$db->bdd->query(" UPDATE rentals SET status = 4 where idRental = '".$idRental."' ") or die(mysql_error());
                
		$resulQty = $db->bdd->query(" SELECT * FROM rentals where idRental = '".$idRental."' ") or die(mysql_error());
                $rec = $resulQty->fetch();
                
                $db->bdd->query(" UPDATE vehicles SET availability = 1 where idVehicle = '".$rec['idVehicle']."' ") or die(mysql_error());
                
                if(!empty($idDriver)){
                    $db->bdd->query(" UPDATE drivers SET availability = 1 where idDriver = '".$rec['idDriver']."'") or die(mysql_error());
                }
                
	}
        
        if(isset($_POST["finalise_rental"]))
	{
		$idRental = trim($_POST["idRental"]);		
		$db->bdd->query(" UPDATE rentals SET status = 2 where idRental = '".$idRental."' ") or die(mysql_error());
                
		$resulQty = $db->bdd->query(" SELECT * FROM rentals where idRental = '".$idRental."' ") or die(mysql_error());
                $rec = $resulQty->fetch();
                
                $db->bdd->query(" UPDATE vehicles SET availability = 1 where idVehicle = '".$rec['idVehicle']."' ") or die(mysql_error());
                
                if(!empty($idDriver)){
                    $db->bdd->query(" UPDATE drivers SET availability = 1 where idDriver = '".$rec['idDriver']."'") or die(mysql_error());
                }
                
	}
        
        
        
      
        
        
?>