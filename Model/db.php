<?php


class AUTOPARK {
    
    public $bdd;


    function __construct(){
    try {

        $this->bdd = new PDO('mysql:host=localhost;dbname=autopark;charset=utf8', 'root', '');
		//$this->bdd = new PDO('mysql:host=localhost;dbname=saconet;charset=utf8', 'vadramson', 'admin');
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    } catch (Exception $e) {

        die('Error : ' . $e->getMessage()); 
    }
}
}

function clean($input){
    return addslashes(trim($input));
}


?>
