<?php

class Expenses {

    private $idExpense;
    private $idUsers;
    private $reason;
    private $amount;
    private $dateOp;
    private $visible;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

 
    function getIdExpense() {
        return $this->idExpense;
    }

    function getIdUsers() {
        return $this->idUsers;
    }

    function getReason() {
        return $this->reason;
    }

    function getAmount() {
        return $this->amount;
    }

    function getDateOp() {
        return $this->dateOp;
    }
    
    function getVisible() {
        return $this->visible;
    }

    function setIdExpense($idExpense) {
        $this->idExpense = $idExpense;
    }

    function setIdUsers($idUsers) {
        $this->idUsers = $idUsers;
    }

    function setReason($reason) {
        $this->reason = $reason;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setDateOp($dateOp) {
        $this->dateOp = $dateOp;
    }
    
    function setVisible($visible) {
        $this->visible = $visible;
    }

        
    public function hydrate(array $donnees) {
        if (isset($donnees['idExpense'])) {
            $this->idExpense = ($donnees['idExpense']);
                          }

        if (isset($donnees['idUsers'])) {
            $this->setIdUsers($donnees['idUsers']);
        }

        if (isset($donnees['reason'])) {
            $this->setReason($donnees['reason']);
        }
        
        if (isset($donnees['amount'])) {
            $this->setAmount($donnees['amount']);
        }
        
        if (isset($donnees['dateOp'])) {
            $this->setDateOp($donnees['dateOp']);
        }
        
        if (isset($donnees['visible'])) {
            $this->setVisible($donnees['visible']);
        }

    }

}
