<?php

class VehiclesManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_vehicles($autoParkData) {

        $resul = $this->_db->query(" SELECT * FROM vehicles WHERE matriculation = '" . $autoParkData->getMatriculation(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) {
            $q = $this->_db->prepare("INSERT INTO vehicles SET idModel = :idModel, matriculation = :matriculation, seats = :seats, colour = :colour, picture = :picture, technology = :technology, availability = :availability, simNumber = :simNumber, feeWithDriver = :feeWithDriver, feeWithoutDriver = :feeWithoutDriver ") or die(mysql_error());

            $q->bindValue(':idModel', $autoParkData->getIdModel());
            $q->bindValue(':matriculation', $autoParkData->getMatriculation());
            $q->bindValue(':seats', $autoParkData->getSeats());
            $q->bindValue(':colour', $autoParkData->getColour());
            $q->bindValue(':picture', $autoParkData->getPicture());
            $q->bindValue(':availability', $autoParkData->getAvailability());
            $q->bindValue(':simNumber', $autoParkData->getSimNumber());
            $q->bindValue(':feeWithDriver', $autoParkData->getFeeWithDriver());
            $q->bindValue(':feeWithoutDriver', $autoParkData->getFeeWithoutDriver());
            $q->execute();
            ?>
            <script>
             swal("New Vehicle!", "Added Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 20);   
            </script>;              
            <?php
        } else {
            ?>
            <script> 
             var reload = window.location.href; 
             console.log(reload);
             swal("Redundacy!", "Vehicle Exists Already!", "error");
             setTimeout(function() {
//                window.location.href = String(reload);
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;
            <?php
        }
    }


    public function update_vehicle($autoParkData) {
            $q = $this->_db->prepare("UPDATE vehicles SET idModel = :idModel, matriculation = :matriculation, seats = :seats, colour = :colour, picture = :picture, technology = :technology, availability = :availability, simNumber = :simNumber, feeWithDriver = :feeWithDriver, feeWithoutDriver = :feeWithoutDriver WHERE idVehicle = :idVehicle") or die(mysql_error());

            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());
            $q->bindValue(':idModel', $autoParkData->getIdModel());
            $q->bindValue(':matriculation', $autoParkData->getMatriculation());
            $q->bindValue(':seats', $autoParkData->getSeats());
            $q->bindValue(':colour', $autoParkData->getColour());
            $q->bindValue(':picture', $autoParkData->getPicture());
            $q->bindValue(':availability', $autoParkData->getAvailability());
            $q->bindValue(':simNumber', $autoParkData->getSimNumber());
            $q->bindValue(':feeWithDriver', $autoParkData->getFeeWithDriver());
            $q->bindValue(':feeWithoutDriver', $autoParkData->getFeeWithoutDriver());
            $q->execute();  
            ?>
            <script>
             swal("Vehicle!", "Updated Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;              
            <?php
    }

}
