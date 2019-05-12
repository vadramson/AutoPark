<?php
// ca ce sont les application en objet

class Category {

    private $idCategory;
    private $idUsers;
    private $nameCat;
    private $status;
    
    

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

   
    function getIdCategory() {
        return $this->idCategory;
    }

    function getIdUsers() {
        return $this->idUsers;
    }

    function getNameCat() {
        return $this->nameCat;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    function setIdUsers($idUsers) {
        $this->idUsers = $idUsers;
    }

    function setNameCat($nameCat) {
        $this->nameCat = $nameCat;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    
    public function hydrate(array $donnees) {
        if (isset($donnees['idCategory'])) {
            $this->idCategory = ($donnees['idCategory']);
                          }

        if (isset($donnees['idUsers'])) {
            $this->setIdUsers($donnees['idUsers']);
        }

        if (isset($donnees['nameCat'])) {
            $this->setNameCat($donnees['nameCat']);
        }
        
        if (isset($donnees['status'])) {
            $this->setStatus($donnees['status']);
        }

    }

}
