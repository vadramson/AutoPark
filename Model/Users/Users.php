<?php
// ca ce sont les application en objet

class Users {
    
    private $idUser;
    private $name;
    private $address;
    private $telephone;
    private $ursCode;
    private $username;
    private $password;
    private $priority;
    private $dateAdded;
    private $pic;
    private $status;
    
    

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getName() {
        return $this->name;
    }

    function getAddress() {
        return $this->address;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getUrsCode() {
        return $this->ursCode;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getPriority() {
        return $this->priority;
    }

    function getDateAdded() {
        return $this->dateAdded;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdUsers($idUsers) {
        $this->idUsers = $idUsers;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setUrsCode($ursCode) {
        $this->ursCode = $ursCode;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPriority($priority) {
        $this->priority = $priority;
    }

    function setDateAdded($dateAdded) {
        $this->dateAdded = $dateAdded;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    function getPic() {
        return $this->pic;
    }

    function setPic($pic) {
        $this->pic = $pic;
    }

    
        
    public function hydrate(array $donnees) {
         if (isset($donnees['idUsers'])) {
            $this->setIdUser($donnees['idUser']);
        }
        
        if (isset($donnees['name'])) {
            $this->name = ($donnees['name']);
                          }

        if (isset($donnees['address'])) {
            $this->setAddress($donnees['address']);
        }
        
        if (isset($donnees['telephone'])) {
            $this->setTelephone($donnees['telephone']);
        }
        
        if (isset($donnees['ursCode'])) {
            $this->setUrsCode($donnees['ursCode']);
        }
        
        if (isset($donnees['username'])) {
            $this->setUsername($donnees['username']);
        }
        
        if (isset($donnees['password'])) {
            $this->setPassword($donnees['password']);
        }
        
        if (isset($donnees['priority'])) {
            $this->setPriority($donnees['priority']);
        }
        
        if (isset($donnees['dateAdded'])) {
            $this->setDateAdded($donnees['dateAdded']);
        }
        
        if (isset($donnees['pic'])) {
            $this->setPic($donnees['pic']);
        }
        
        if (isset($donnees['status'])) {
            $this->setStatus($donnees['status']);
        }
        

    }

}
