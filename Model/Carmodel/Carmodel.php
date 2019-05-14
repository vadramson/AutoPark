<?php

class Carmodel {

    private $idModel;
    private $model;
    private $year;    
    private $created;
    private $updated;
    private $mark;
    private $status;
    
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdModel() {
        return $this->idModel;
    }

    function getModel() {
        return $this->model;
    }

    function getYear() {
        return $this->year;
    }

    function getStatus() {
        return $this->status;
    }

    function getCreated() {
        return $this->created;
    }

    function getUpdated() {
        return $this->updated;
    }

    function getMark() {
        return $this->mark;
    }

    function setIdModel($idModel) {
        $this->idModel = $idModel;
    }

    function setModel($model) {
        $this->model = $model;
    }

    function setYear($year) {
        $this->year = $year;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setUpdated($updated) {
        $this->updated = $updated;
    }

    function setMark($mark) {
        $this->mark = $mark;
    }    
    
    public function hydrate(array $donnees) {
        if (isset($donnees['idModel'])) {
            $this->idModel = ($donnees['idModel']);
                          }

        if (isset($donnees['model'])) {
            $this->setModel($donnees['model']);
        }

        if (isset($donnees['year'])) {
            $this->setYear($donnees['year']);
        }
        
        if (isset($donnees['created'])) {
            $this->setCreated($donnees['created']);
        }
        if (isset($donnees['updated'])) {
            $this->setUpdated($donnees['updated']);
        }
        if (isset($donnees['mark'])) {
            $this->setMark($donnees['mark']);
        }
        if (isset($donnees['status'])) {
            $this->setStatus($donnees['status']);
        }

    }

}
