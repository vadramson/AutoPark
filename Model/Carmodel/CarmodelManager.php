<?php

class CarmodelManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_carmodel($autoParkData) {

        $resul = $this->_db->query(" SELECT * FROM carmodel WHERE model = '" . $autoParkData->getModel(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) {
            $q = $this->_db->prepare("INSERT INTO carmodel SET model = :model, year = :year, mark = :mark ") or die(mysql_error());

            $q->bindValue(':model', $autoParkData->getModel());
            $q->bindValue(':year', $autoParkData->getYear());
            $q->bindValue(':mark', $autoParkData->getMark());
            $q->execute();
            ?>
            <script>
             swal("New Car Model!", "Added Successefully!", "success");   
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
             swal("Redundacy!", "Car Model Exists Already!", "error");
             setTimeout(function() {
//                window.location.href = String(reload);
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 20);   
            </script>;
            <?php
        }
    }


    public function update_carmodel($autoParkData) {
            $q = $this->_db->prepare(" UPDATE carmodel SET model = :model, year = :year, mark = :mark WHERE idModel = :idModel ") or die(mysql_error());

            $q->bindValue(':idModel', $autoParkData->getIdModel());
            $q->bindValue(':model', $autoParkData->getModel());
            $q->bindValue(':year', $autoParkData->getYear());
            $q->bindValue(':mark', $autoParkData->getMark());
            $q->execute();  
            ?>
            <script>
             swal("Car Model!", "Updated Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
             }, 100);   
            </script>;              
            <?php
    }

}
