<?php

class DriversManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_driver($autoParkData) {

        $resul = $this->_db->query(" SELECT * FROM drivers WHERE idNumber = '" . $autoParkData->getIdNumber(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) {
            $q = $this->_db->prepare("INSERT INTO drivers SET idUser = :idUser, name = :name, availability = :availability, licenseType = :licenseType, licenseID = :licenseID, picture = :picture, idNumber = :idNumber, email = :email, phone = :phone ") or die(mysql_error());

            $q->bindValue(':idUser', $autoParkData->getIdUser());
            $q->bindValue(':name', $autoParkData->getName());
            $q->bindValue(':availability', $autoParkData->getAvailability());
            $q->bindValue(':licenseType', $autoParkData->getLicenseType());
            $q->bindValue(':licenseID', $autoParkData->getLicenseID());
            $q->bindValue(':picture', $autoParkData->getPicture());
            $q->bindValue(':idNumber', $autoParkData->getIdNumber());
            $q->bindValue(':email', $autoParkData->getEmail());
            $q->bindValue(':phone', $autoParkData->getPhone());
            $q->execute();
            ?>
            <script>
             swal("New Driver!", "Added Successefully!", "success");   
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
             swal("Redundacy!", "Driver Exists Already!", "error");
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 20);   
            </script>;
            <?php
        }
    }


    public function update_driver($autoParkData) {
            $q = $this->_db->prepare("UPDATE drivers SET idUser = :idUser, name = :name, availability = :availability, licenseType = :licenseType, licenseID = :licenseID, picture = :picture, idNumber = :idNumber, email = :email, phone = :phone WHERE idDriver = :idDriver ") or die(mysql_error());

            $q->bindValue(':idDriver', $autoParkData->getIdDriver());
            $q->bindValue(':idUser', $autoParkData->getIdUser());
            $q->bindValue(':name', $autoParkData->getName());
            $q->bindValue(':availability', $autoParkData->getAvailability());
            $q->bindValue(':licenseType', $autoParkData->getLicenseType());
            $q->bindValue(':licenseID', $autoParkData->getLicenseID());
            $q->bindValue(':picture', $autoParkData->getPicture());
            $q->bindValue(':idNumber', $autoParkData->getIdNumber());
            $q->bindValue(':email', $autoParkData->getEmail());
            $q->bindValue(':phone', $autoParkData->getPhone());
            $q->execute();  
            ?>
            <script>
             swal("Driver!", "Updated Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;              
            <?php
    }

}
