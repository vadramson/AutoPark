<?php

class MentainenceManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_mentainence($autoParkData) {
        
            $q = $this->_db->prepare("INSERT INTO mentainence SET idVehicle = :idVehicle, idUser = :idUser, fault = :fault, garage = :garage, cost = :cost, state = :state, dateIn = :dateIn, dateOut = :dateOut ") or die(mysql_error());

            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());
            $q->bindValue(':idUser', $autoParkData->getIdUser());
            $q->bindValue(':fault', $autoParkData->getFault());
            $q->bindValue(':garage', $autoParkData->getGarage());
            $q->bindValue(':cost', $autoParkData->getCost());
            $q->bindValue(':state', $autoParkData->getState());
            $q->bindValue(':dateIn', $autoParkData->getDateIn());
            $q->bindValue(':dateOut', $autoParkData->getDateOut());
            $q->execute();
            ?>
            <script>
             swal("New Maintenance Record!", "Registered Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;              
            <?php        
    }


    public function update_expenditure($autoParkData) {
            $q = $this->_db->prepare("UPDATE mentainence SET idVehicle = :idVehicle, idUser = :idUser, fault = :fault, garage = :garage, cost = :cost, state = :state, dateIn = :dateIn, dateOut = :dateOut WHERE idMaintennce = :idMaintennce ") or die(mysql_error());

            $q->bindValue(':idMaintennce', $autoParkData->getIdMaintennce());
            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());
            $q->bindValue(':idUser', $autoParkData->getIdUser());
            $q->bindValue(':fault', $autoParkData->getFault());
            $q->bindValue(':garage', $autoParkData->getGarage());
            $q->bindValue(':cost', $autoParkData->getCost());
            $q->bindValue(':state', $autoParkData->getState());
            $q->bindValue(':dateIn', $autoParkData->getDateIn());
            $q->bindValue(':dateOut', $autoParkData->getDateOut());
            $q->execute(); 
            ?>
            <script>
             swal("Maintenance Record!", "Updated Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;              
            <?php
    }

}
