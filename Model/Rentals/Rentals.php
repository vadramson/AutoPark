<?php

class Rentals {

    private $idRental;
    private $idUser;
    private $idVehicle;    
    private $idDriver;
    private $hours;
    private $unitHour;
    private $totalCost;
    private $rentalType;
    private $matriculation;
    private $status;
    private $registeredBy;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    function getIdRental() {
        return $this->idRental;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getIdVehicle() {
        return $this->idVehicle;
    }

    function getIdDriver() {
        return $this->idDriver;
    }

    function getHours() {
        return $this->hours;
    }

    function getUnitHour() {
        return $this->unitHour;
    }

    function getTotalCost() {
        return $this->totalCost;
    }

    function getRentalType() {
        return $this->rentalType;
    }

    function getMatriculation() {
        return $this->matriculation;
    }

    function getStatus() {
        return $this->status;
    }

    function getRegisteredBy() {
        return $this->registeredBy;
    }

    function setIdRental($idRental) {
        $this->idRental = $idRental;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setIdVehicle($idVehicle) {
        $this->idVehicle = $idVehicle;
    }

    function setIdDriver($idDriver) {
        $this->idDriver = $idDriver;
    }

    function setHours($hours) {
        $this->hours = $hours;
    }

    function setUnitHour($unitHour) {
        $this->unitHour = $unitHour;
    }

    function setTotalCost($totalCost) {
        $this->totalCost = $totalCost;
    }

    function setRentalType($rentalType) {
        $this->rentalType = $rentalType;
    }

    function setMatriculation($matriculation) {
        $this->matriculation = $matriculation;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setRegisteredBy($registeredBy) {
        $this->registeredBy = $registeredBy;
    }

        
    public function hydrate(array $donnees) {
        if (isset($donnees['idRental'])) {
            $this->idRental = ($donnees['idRental']);
        }
        if (isset($donnees['idUser'])) {
            $this->setIdUser($donnees['idUser']);
        }        
        if (isset($donnees['idVehicle'])) {
            $this->setIdVehicle($donnees['idVehicle']);
        }        
        if (isset($donnees['idDriver'])) {
            $this->setIdDriver($donnees['idDriver']);
        }        
        if (isset($donnees['hours'])) {
            $this->setHours($donnees['hours']);
        }        
        if (isset($donnees['unitHour'])) {
            $this->setUnitHour($donnees['unitHour']);
        }        
        if (isset($donnees['totalCost'])) {
            $this->setTotalCost($donnees['totalCost']);
        }        
        if (isset($donnees['rentalType'])) {
            $this->setRentalType($donnees['rentalType']);
        }        
        if (isset($donnees['matriculation'])) {
            $this->setMatriculation($donnees['matriculation']);
        }        
        if (isset($donnees['status'])) {
            $this->setStatus($donnees['status']);
        }        
        if (isset($donnees['registeredBy'])) {
            $this->setRegisteredBy($donnees['registeredBy']);
        }                      
    }

}
