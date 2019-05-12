<?php

class EquipmentManager {

    private $_db; // Instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_equipment($uncleDan) {

        $resul = $this->_db->query(" SELECT * FROM equipment WHERE namePdt = '" . $uncleDan->getNamePdt(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) {
            $q = $this->_db->prepare("INSERT INTO equipment SET idUsers = :idUsers, idCategory = :idCategory, namePdt = :namePdt, price = :price, qty = :qty, dimensions = :dimensions, minimum = :minimum, status = :status ") or die(mysql_error());
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':idCategory', $uncleDan->getIdCategory());
            $q->bindValue(':namePdt', $uncleDan->getNamePdt());
            $q->bindValue(':price', $uncleDan->getPrice());
            $q->bindValue(':qty', $uncleDan->getQty());
            $q->bindValue(':dimensions', $uncleDan->getDimensions());
            $q->bindValue(':minimum', $uncleDan->getMinimum());
            $q->bindValue(':status', $uncleDan->getStatus());
            $q->execute();

            echo"<script language='javascript'>alert('Equipment Added !')</script>";
            
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new Equipment', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Succesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
            
        } else {
            echo"<script language='javascript'>alert('Redondance Equipment Exists already!')</script>";
            
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new Equipment Redondance', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Unsuccesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
        }
    }


        function listEquipment() {
        $resul = $this->_db->query(" SELECT equipment.*, nameCat, category.idCategory FROM  equipment, category WHERE equipment.idCategory = category.idCategory") or die(mysql_error());
//        $resul = $this->_db->query(" SELECT idEquipment,idCategory, namePdt, price, qty, dimensions, minimum, status FROM  equipment ") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
                 <td>" . $rec["nameCat"] . "</td><td>" . $rec["namePdt"] . "</td> <td>" . $rec["price"] . "</td><td>" . $rec["qty"] . "</td><td>" . $rec["dimensions"] . "</td><td>" . $rec["minimum"] . "</td><td>" . $rec["status"] . "</td>
                   <td> <a data-rel='tooltip' title='View and or Edit This Equipment' data-placement='top' class='blue' href=../Purchase/indexPurchase.php?page=" . base64_encode('../Purchase/Equipments/viewEquipment') . "&idr=" . base64_encode($rec["idEquipment"]) . ">   
                       <i class='ace-icon fa fa-search-plus bigger-130'></i>
                        </a>                        
                 <a data-rel='tooltip' title='Activate this Equipment' data-placement='top' class='green' href='#' onclick=act_eqpt('" . $rec["idEquipment"] . "')> <i class='ace-icon fa fa-check bigger-130'></i>
                    </a>
                <a data-rel='tooltip' title='Deactivate this Equipment' data-placement='top' class='red' href='#' onclick=deact_eqpt('" . $rec["idEquipment"] . "')> <i class='ace-icon fa fa-trash-o bigger-130'></i>
                    </a>    
                  </td>
               </tr> ";
        }
    }
    
    
    public function update_equipment($uncleDan) {
//        echo 'boy';
        
        $q = $this->_db->prepare("UPDATE equipment SET idUsers = :idUsers, idCategory = :idCategory, namePdt = :namePdt, price = :price, qty = :qty, dimensions = :dimensions, minimum = :minimum WHERE idEquipment = :idEquipment") or die(mysql_error());
            
            $q->bindValue(':idEquipment', $uncleDan->getIdEquipment());
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':idCategory', $uncleDan->getIdCategory());
            $q->bindValue(':namePdt', $uncleDan->getNamePdt());
            $q->bindValue(':price', $uncleDan->getPrice());            
            $q->bindValue(':qty', $uncleDan->getQty());            
            $q->bindValue(':dimensions', $uncleDan->getDimensions());
            $q->bindValue(':minimum', $uncleDan->getMinimum());
            $q->execute();
        echo "<script language = 'javascript'> alert ('Equipment Updated ! !');</script>";
        
        $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new Equipment Redondance', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Unsuccesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
        
    }
    
  

}
