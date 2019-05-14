<?php

class Mentainence {

    private $idMaintennce;
    private $idVehicle;
    private $idUser;
    private $fault;
    private $garage;
    private $cost;
    private $state;
    private $dateIn;
    private $dateOut;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdMaintennce() {
        return $this->idMaintennce;
    }

    function getIdVehicle() {
        return $this->idVehicle;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getFault() {
        return $this->fault;
    }

    function getGarage() {
        return $this->garage;
    }

    function getCost() {
        return $this->cost;
    }

    function getState() {
        return $this->state;
    }

    function getDateIn() {
        return $this->dateIn;
    }

    function getDateOut() {
        return $this->dateOut;
    }

    function setIdMaintennce($idMaintennce) {
        $this->idMaintennce = $idMaintennce;
    }

    function setIdVehicle($idVehicle) {
        $this->idVehicle = $idVehicle;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setFault($fault) {
        $this->fault = $fault;
    }

    function setGarage($garage) {
        $this->garage = $garage;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setDateIn($dateIn) {
        $this->dateIn = $dateIn;
    }

    function setDateOut($dateOut) {
        $this->dateOut = $dateOut;
    }

    
    public function hydrate(array $donnees) {
        if (isset($donnees['idMaintennce'])) {
            $this->idMaintennce = ($donnees['idMaintennce']);
        }
        if (isset($donnees['idVehicle'])) {
            $this->setIdVehicle($donnees['idVehicle']);
        }
        if (isset($donnees['idUser'])) {
            $this->setIdUser($donnees['idUser']);
        }
        if (isset($donnees['fault'])) {
            $this->setFault($donnees['fault']);
        }
        if (isset($donnees['garage'])) {
            $this->setGarage($donnees['garage']);
        }
        if (isset($donnees['cost'])) {
            $this->setCost($donnees['cost']);
        }
        if (isset($donnees['state'])) {
            $this->setState($donnees['state']);
        }
        if (isset($donnees['dateIn'])) {
            $this->setDateIn($donnees['dateIn']);
        }
        if (isset($donnees['dateOut'])) {
            $this->setDateOut($donnees['dateOut']);
        }
    }

}
