<?php
@include("../Model/db.php");

$db = new AUTOPARK();

        if(isset($_POST["ActUrs"]))
	{
		$idUsers = trim($_POST["ActUrs"]);
		
		$db->bdd->query("update users set status = 'Active' where idUsers = '".$idUsers."'") or die(mysql_error());
		
		echo" User Activated ";
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