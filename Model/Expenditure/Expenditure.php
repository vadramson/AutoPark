<?php

class Expenditure {

    private $idVehicle;
    private $nature;
    private $description;
    private $cost;
    private $dateExpenditure;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdVehicle() {
        return $this->idVehicle;
    }

    function getNature() {
        return $this->nature;
    }

    function getDescription() {
        return $this->description;
    }

    function getCost() {
        return $this->cost;
    }

    function getDateExpenditure() {
        return $this->dateExpenditure;
    }

    function setIdVehicle($idVehicle) {
        $this->idVehicle = $idVehicle;
    }

    function setNature($nature) {
        $this->nature = $nature;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setDateExpenditure($dateExpenditure) {
        $this->dateExpenditure = $dateExpenditure;
    }

    public function hydrate(array $donnees) {
        if (isset($donnees['idExpenditure'])) {
            $this->idExpenditure = ($donnees['idExpenditure']);
        }
        if (isset($donnees['idVehicle'])) {
            $this->setIdVehicle($donnees['idVehicle']);
        }
        if (isset($donnees['nature'])) {
            $this->setNature($donnees['nature']);
        }
        if (isset($donnees['description'])) {
            $this->setDescription($donnees['description']);
        }
        if (isset($donnees['cost'])) {
            $this->setCost($donnees['cost']);
        }
        if (isset($donnees['dateExpenditure'])) {
            $this->setDateExpenditure($donnees['dateExpenditure']);
        }
    }

}
