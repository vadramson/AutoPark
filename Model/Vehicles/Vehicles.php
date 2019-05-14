<?php

class Vehicles {

    private $idVehicle;
    private $idModel;
    private $matriculation;
    private $seats;    
    private $colour;
    private $picture;
    private $technology;
    private $availability;
    private $simNumber;
    private $feeWithDriver;
    private $feeWithoutDriver;
    
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdVehicle() {
        return $this->idVehicle;
    }

    function getIdModel() {
        return $this->idModel;
    }

    function getMatriculation() {
        return $this->matriculation;
    }

    function getSeats() {
        return $this->seats;
    }

    function getColour() {
        return $this->colour;
    }

    function getPicture() {
        return $this->picture;
    }

    function getTechnology() {
        return $this->technology;
    }

    function getAvailability() {
        return $this->availability;
    }

    function getSimNumber() {
        return $this->simNumber;
    }

    function getFeeWithDriver() {
        return $this->feeWithDriver;
    }

    function getFeeWithoutDriver() {
        return $this->feeWithoutDriver;
    }

    function setIdVehicle($idVehicle) {
        $this->idVehicle = $idVehicle;
    }

    function setIdModel($idModel) {
        $this->idModel = $idModel;
    }

    function setMatriculation($matriculation) {
        $this->matriculation = $matriculation;
    }

    function setSeats($seats) {
        $this->seats = $seats;
    }

    function setColour($colour) {
        $this->colour = $colour;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

    function setTechnology($technology) {
        $this->technology = $technology;
    }

    function setAvailability($availability) {
        $this->availability = $availability;
    }

    function setSimNumber($simNumber) {
        $this->simNumber = $simNumber;
    }

    function setFeeWithDriver($feeWithDriver) {
        $this->feeWithDriver = $feeWithDriver;
    }

    function setFeeWithoutDriver($feeWithoutDriver) {
        $this->feeWithoutDriver = $feeWithoutDriver;
    }

        
    public function hydrate(array $donnees) {
        if (isset($donnees['idVehicle'])) {
            $this->idVehicle = ($donnees['idVehicle']);
                          }

        if (isset($donnees['idModel'])) {
            $this->setIdModel($donnees['idModel']);
        }

        if (isset($donnees['matriculation'])) {
            $this->setMatriculation($donnees['matriculation']);
        }
        
        if (isset($donnees['seats'])) {
            $this->setSeats($donnees['seats']);
        }
        if (isset($donnees['colour'])) {
            $this->setColour($donnees['colour']);
        }
        if (isset($donnees['picture'])) {
            $this->setPicture($donnees['picture']);
        }
        if (isset($donnees['technology'])) {
            $this->setTechnology($donnees['technology']);
        }
        if (isset($donnees['availability'])) {
            $this->setAvailability($donnees['availability']);
        }
        if (isset($donnees['simNumber'])) {
            $this->setSimNumber($donnees['simNumber']);
        }
        if (isset($donnees['feeWithDriver'])) {
            $this->setFeeWithDriver($donnees['feeWithDriver']);
        }
        if (isset($donnees['feeWithoutDriver'])) {
            $this->setFeeWithoutDriver($donnees['feeWithoutDriver']);
        }

    }

}
