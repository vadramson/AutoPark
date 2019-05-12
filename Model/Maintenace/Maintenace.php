<?php

class Maintenace {

    private $idMaintenace;
    private $idUsers;
    private $company;
    private $amount;
    private $teamLeader;
    private $dateOp;
    private $visible;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdMaintenace() {
        return $this->idMaintenace;
    }

    function getIdUsers() {
        return $this->idUsers;
    }

    function getCompany() {
        return $this->company;
    }

    function getAmount() {
        return $this->amount;
    }

    function getTeamLeader() {
        return $this->teamLeader;
    }

    function getDateOp() {
        return $this->dateOp;
    }

    function getVisible() {
        return $this->visible;
    }

    function setIdMaintenace($idMaintenace) {
        $this->idMaintenace = $idMaintenace;
    }

    function setIdUsers($idUsers) {
        $this->idUsers = $idUsers;
    }

    function setCompany($company) {
        $this->company = $company;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setTeamLeader($teamLeader) {
        $this->teamLeader = $teamLeader;
    }

    function setDateOp($dateOp) {
        $this->dateOp = $dateOp;
    }

    function setVisible($visible) {
        $this->visible = $visible;
    }

    
            
    public function hydrate(array $donnees) {
        if (isset($donnees['idMaintenace'])) {
            $this->idMaintenace = ($donnees['idMaintenace']);
                          }

        if (isset($donnees['idUsers'])) {
            $this->setIdUsers($donnees['idUsers']);
        }

        if (isset($donnees['company'])) {
            $this->setCompany($donnees['company']);
        }
        
        if (isset($donnees['amount'])) {
            $this->setAmount($donnees['amount']);
        }
        
        if (isset($donnees['teamLeader'])) {
            $this->setTeamLeader($donnees['teamLeader']);
        }
        
        if (isset($donnees['dateOp'])) {
            $this->setDateOp($donnees['dateOp']);
        }
        
        if (isset($donnees['visible'])) {
            $this->setVisible($donnees['visible']);
        }

    }

}
