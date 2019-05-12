<?php
// ca ce sont les application en objet

class Equipment {

    private $idEquipment;
    private $idUsers;
    private $idCategory;
    private $namePdt;
    private $price;
    private $qty;
    private $dimensions;
    private $minimum;
    private $status;
    
    
    

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdEquipment() {
        return $this->idEquipment;
    }

    function getIdUsers() {
        return $this->idUsers;
    }

    function getIdCategory() {
        return $this->idCategory;
    }

    function getNamePdt() {
        return $this->namePdt;
    }

    function getPrice() {
        return $this->price;
    }

    function getQty() {
        return $this->qty;
    }

    function getDimensions() {
        return $this->dimensions;
    }

    function getMinimum() {
        return $this->minimum;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdEquipment($idEquipmentt) {
        $this->idEquipment = $idEquipment;
    }

    function setIdUsers($idUsers) {
        $this->idUsers = $idUsers;
    }

    function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    function setNamePdt($namePdt) {
        $this->namePdt = $namePdt;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setQty($qty) {
        $this->qty = $qty;
    }

    function setDimensions($dimensions) {
        $this->dimensions = $dimensions;
    }

    function setMinimum($minimum) {
        $this->minimum = $minimum;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        
    public function hydrate(array $donnees) {
        if (isset($donnees['idEquipment'])) {
            $this->idEquipment = ($donnees['idEquipment']);
        }
        
        if (isset($donnees['idUsers'])) {
            $this->setIdUsers($donnees['idUsers']);
        }
        
        if (isset($donnees['idCategory'])) {
            $this->idCategory = ($donnees['idCategory']);
                          }

        if (isset($donnees['namePdt'])) {
            $this->setNamePdt($donnees['namePdt']);
        }
        
        if (isset($donnees['price'])) {
            $this->setPrice($donnees['price']);
        }
        
         if (isset($donnees['qty'])) {
            $this->setQty($donnees['qty']);
                          }

        if (isset($donnees['dimensions'])) {
            $this->setDimensions($donnees['dimensions']);
        }
        
        if (isset($donnees['minimum'])) {
            $this->setMinimum($donnees['minimum']);
        }
        
        if (isset($donnees['status'])) {
            $this->setStatus($donnees['status']);
        }

    }

}
