<?php

class ExpenditureManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_expenditure($autoParkData) {
        
            $q = $this->_db->prepare("INSERT INTO expenditure SET idVehicle = :idVehicle, nature = :nature, description = :description, cost = :cost ") or die(mysql_error());

            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());
            $q->bindValue(':nature', $autoParkData->getNature());
            $q->bindValue(':description', $autoParkData->getDescription());
            $q->bindValue(':cost', $autoParkData->getCost());
            $q->execute();
            ?>
            <script>
             swal("New Expenditure!", "Added Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 20);   
            </script>;              
            <?php        
    }


    public function update_expenditure($autoParkData) {
            $q = $this->_db->prepare("UPDATE expenditure SET idVehicle = :idVehicle, nature = :nature, description = :description, cost = :cost WHERE idExpenditure = :idExpenditure ") or die(mysql_error());

            $q->bindValue(':idExpenditure', $autoParkData->getIdExpenditure());
            $q->bindValue(':idVehicle', $autoParkData->getIdVehicle());
            $q->bindValue(':nature', $autoParkData->getNature());
            $q->bindValue(':description', $autoParkData->getDescription());
            $q->bindValue(':cost', $autoParkData->getCost());
            $q->execute(); 
            ?>
            <script>
             swal("Expenditure!", "Updated Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;              
            <?php
    }

}
