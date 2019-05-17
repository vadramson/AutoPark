<?php

class RentalsManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_rental($autoParkData) {
            $idVehicle = $autoParkData->getIdVehicle();
            $idDriver = $autoParkData->getIdDriver();
            $q = $this->_db->prepare("INSERT INTO rentals SET idUser = :idUser, idVehicle = :idVehicle, idDriver = :idDriver, hours = :hours, unitHour = :unitHour, totalCost = :totalCost, rentalType = :rentalType, matriculation = :matriculation, status = :status, registeredBy = :registeredBy ") or die(mysql_error());

            $q->bindValue(':idUser', $autoParkData->getIdUser());
            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());            
            $q->bindValue(':idDriver', $autoParkData->getIdDriver());
            $q->bindValue(':hours', $autoParkData->gethours());
            $q->bindValue(':unitHour', $autoParkData->getUnitHour());
            $q->bindValue(':totalCost', $autoParkData->getTotalCost());
            $q->bindValue(':rentalType', $autoParkData->getRentalType());
            $q->bindValue(':matriculation', $autoParkData->getMatriculation());
            $q->bindValue(':status', $autoParkData->getStatus());
            $q->bindValue(':registeredBy', $autoParkData->getRegisteredBy());
            $q->execute();
            
            $qVehicle = $this->_db->prepare("UPDATE vehicles SET availability = 0 WHERE idVehicle = '".$idVehicle."' ") or die(mysql_error());
            $qVehicle->execute();
            
            if(!empty($idDriver)){
                $qDriver = $this->_db->prepare("UPDATE drivers SET availability = 0 WHERE idDriver = '".$idDriver."' ") or die(mysql_error());
                $qDriver->execute();
            }
            
            ?>
            <script>
             swal("New Rental Record!", "Registered Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=UmVudGFscy9SZW50YWxz";
             }, 100);   
            </script>;              
            <?php        
    }


    public function update_rental($autoParkData) {
            $q = $this->_db->prepare("UPDATE rentals SET idUser = :idUser, idVehicle = :idVehicle, idDriver = :idDriver, hours = :hours, unitHour = :unitHour, totalCost = :totalCost, rentalType = :rentalType, matriculation = :matriculation, status = :status, registeredBy = :registeredBy WHERE idRental = :idRental") or die(mysql_error());

            $q->bindValue(':idRental', $autoParkData->getIdRental());
            $q->bindValue(':idUser', $autoParkData->getIdUser());
            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());            
            $q->bindValue(':idDriver', $autoParkData->getIdDriver());
            $q->bindValue(':hours', $autoParkData->gethours());
            $q->bindValue(':unitHour', $autoParkData->getUnitHour());
            $q->bindValue(':totalCost', $autoParkData->getTotalCost());
            $q->bindValue(':rentalType', $autoParkData->getRentalType());
            $q->bindValue(':matriculation', $autoParkData->getMatriculation());
            $q->bindValue(':status', $autoParkData->getStatus());
            $q->bindValue(':registeredBy', $autoParkData->getRegisteredBy());
            $q->execute(); 
            ?>
            <script>
             swal("Rental Record!", "Updated Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=UmVudGFscy9SZW50YWxz";
             }, 100);   
            </script>;              
            <?php
    }

}
