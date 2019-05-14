<?php

class Drivers {

    private $idDriver;
    private $idUser;
    private $name;
    private $availability;
    private $licenseType;
    private $licenseID;
    private $picture;
    private $idNumber;
    private $email;
    private $phone;
    private $created;
    private $updated;
    private $status;
    
    
    

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }    
 
    function getIdDriver() {
        return $this->idDriver;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getName() {
        return $this->name;
    }

    function getAvailability() {
        return $this->availability;
    }

    function getLicenseType() {
        return $this->licenseType;
    }

    function getLicenseID() {
        return $this->licenseID;
    }

    function getPicture() {
        return $this->picture;
    }

    function getIdNumber() {
        return $this->idNumber;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getCreated() {
        return $this->created;
    }

    function getUpdated() {
        return $this->updated;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdDriver($idDriver) {
        $this->idDriver = $idDriver;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAvailability($availability) {
        $this->availability = $availability;
    }

    function setLicenseType($licenseType) {
        $this->licenseType = $licenseType;
    }

    function setLicenseID($licenseID) {
        $this->licenseID = $licenseID;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

    function setIdNumber($idNumber) {
        $this->idNumber = $idNumber;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setUpdated($updated) {
        $this->updated = $updated;
    }

    function setStatus($status) {
        $this->status = $status;
    }

       
    public function hydrate(array $donnees) {
        if (isset($donnees['idDriver'])) {
            $this->idDriver = ($donnees['idDriver']);
        }        
        if (isset($donnees['idUser'])) {
            $this->setIdUser($donnees['idUser']);
        }
        if (isset($donnees['name'])) {
            $this->setName($donnees['name']);
        }
        if (isset($donnees['availability'])) {
            $this->setAvailability($donnees['availability']);
        }
        if (isset($donnees['licenseType'])) {
            $this->setLicenseType($donnees['licenseType']);
        }
        if (isset($donnees['licenseID'])) {
            $this->setLicenseID($donnees['licenseID']);
        }
        if (isset($donnees['picture'])) {
            $this->setPicture($donnees['picture']);
        }
        if (isset($donnees['idNumber'])) {
            $this->setIdNumber($donnees['idNumber']);
        }
        if (isset($donnees['email'])) {
            $this->setEmail($donnees['email']);
        }
        if (isset($donnees['phone'])) {
            $this->setPhone($donnees['phone']);
        }
        if (isset($donnees['created'])) {
            $this->setCreated($donnees['created']);
        }
        if (isset($donnees['updated'])) {
            $this->setUpdated($donnees['updated']);
        }        
        if (isset($donnees['status'])) {
            $this->setStatus($donnees['status']);
        }

    }

}
