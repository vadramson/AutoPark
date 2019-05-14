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
        
        if(isset($_POST["RmvEqpt"]))
	{
		$idSalesTrans = trim($_POST["RmvEqpt"]);
                
                $resulQty = $db->bdd->query(" SELECT salestrans.*, equipment.qty AS qtyEqp, equipment.idEquipment  FROM  salestrans, equipment WHERE idSalesTrans = '".$idSalesTrans."' AND salestrans.idEquipment = equipment.idEquipment ") or die(mysql_error());
                $recQty = $resulQty->fetch();
                
		$Qty = $recQty["qty"];
                $ActQty = $recQty["qtyEqp"];
                $idEquipment = $recQty["idEquipment"];
                
                $newQTY = $Qty + $ActQty;
                
                $db->bdd->query(" delete from salestrans where  idSalesTrans = '".$idSalesTrans."' ") or die(mysql_error());
		$db->bdd->query(" update equipment set qty = '".$newQTY."' where idEquipment = '".$idEquipment."' ") or die(mysql_error());
		
//		echo "Post Quantity is " . $Qty . " Actual Quantity is " . $ActQty . " Equipment Id is ". $idEquipment . "new Quantity is " . $newQTY;
                echo " Product Remove From Cart ";
	}
        
        
?>