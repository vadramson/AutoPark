<?php

class CategoryManager {

    private $_db; // Instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_category($uncleDan) {

        $resul = $this->_db->query(" SELECT * FROM category WHERE nameCat = '" . $uncleDan->getNameCat(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) {
            $q = $this->_db->prepare("INSERT INTO category SET idUsers = :idUsers, nameCat = :nameCat, status = :status ") or die(mysql_error());

            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':nameCat', $uncleDan->getNameCat());
            $q->bindValue(':status', $uncleDan->getStatus());
            $q->execute();

            echo"<script language='javascript'>alert('Category Added !')</script>";
            
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new Category', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Succesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
        } else {
            echo"<script language='javascript'>alert('Redondance Category Exists already!')</script>";
            
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new Category Redondance', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Unsuccesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
        }
    }

    
        function listCategoryx() {
        $resul = $this->_db->query(" SELECT * FROM  users ORDER BY idUsers DESC") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
        <td>" . $rec["name"] . "</td> <td>" . $rec["address"] . "</td><td>" . $rec["telephone"] . "</td><td>" . $rec["ursCode"] . "</td><td>" . $rec["username"] . "</td><td>" . $rec["priority"] . "</td><td>" . $rec["dateAdded"] . "</td><td>" . $rec["status"] . "</td>
                   <td> <a data-rel='tooltip' title='View and or Edit This Category' data-placement='top' class='blue' href=../Admin/indexAdmin.php?page=" . base64_encode('../Admin/users/userProfile') . "&idr=" . base64_encode($rec["idUsers"]) . ">   
                       <i class='ace-icon fa fa-search-plus bigger-130'></i>
                        </a>                        
                 <a data-rel='tooltip' title='Activate this Category' data-placement='top' class='green' href='#' onclick=activate_User('" . $rec["idUsers"] . "')> <i class='ace-icon fa fa-check bigger-130'></i>
                    </a>
                <a data-rel='tooltip' title='Deactivate this Category' data-placement='top' class='red' href='#' onclick=deactivate_User('" . $rec["idUsers"] . "')> <i class='ace-icon fa fa-trash-o bigger-130'></i>
                    </a>    
                  </td>
               </tr> ";
        }
    }
        

        function listCategory() {
        $resul = $this->_db->query(" SELECT * FROM  category ") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
                 <td>" . $rec["nameCat"] . "</td> <td>" . $rec["status"] . "</td>
                  <td> <a data-rel='tooltip' title='View Catagory' data-placement='top' class='blue' href=../Purchase/indexPurchase.php?page=" . base64_encode('../Purchase/Category/categoryConsult') . "&idr=" . base64_encode($rec["idCategory"]) . ">   
                       <i class='ace-icon fa fa-search-plus bigger-130'></i>
                        </a>                        
                 <a data-rel='tooltip' title='Activate this Category' data-placement='top' class='green' href='#' onclick=activate_Cate('" . $rec["idCategory"] . "')> <i class='ace-icon fa fa-check bigger-130'></i>
                    </a>
                <a data-rel='tooltip' title='Deactivate this User`s Profile' data-placement='top' class='red' href='#' onclick=deactivate_Cate('" . $rec["idCategory"] . "')> <i class='ace-icon fa fa-trash-o bigger-130'></i>
                    </a>    
                  </td>
               </tr> ";
        }
    }
    
    
    public function update_category($uncleDan) {
//        echo 'boy';
        
        $q = $this->_db->prepare("UPDATE category SET idUsers = :idUsers, nameCat = :nameCat WHERE idCategory = :idCategory") or die(mysql_error());
            
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':idCategory', $uncleDan->getIdCategory());
            $q->bindValue(':nameCat', $uncleDan->getNameCat());            
            $q->execute();
        echo "<script language = 'javascript'> alert ('Category Updated ! !')</script>";
        
        $log = $this->_db->prepare("INSERT INTO log SET operation = 'Updating an Existing Category', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Succesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
    }
    
  

}
