<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-Type: application/json');

require_once("../db.php");
$bdd = new SACONET();

$bonus = $bdd->bdd->query("SELECT purchases.*, equipment.idEquipment,namePdt FROM purchases, equipment WHERE purchases.idEquipment = equipment.idEquipment ORDER BY idPurchase") or die(mysql_error());
$resultBonus = $bonus->fetch();

$data = array();
foreach ($bonus as $obj){
    $data[] = $obj;
}

$data[] = $resultBonus;

print json_encode($data);