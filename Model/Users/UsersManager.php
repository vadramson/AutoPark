<?php

class UsersManager {

    private $_db; // PDO Instance

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_user($uncleDan) {

        $resul = $this->_db->query(" SELECT * FROM users WHERE telephone = '" . $uncleDan->getTelephone(). "' ") or die(mysql_error());
        $reqt = $resul->fetch();

        if ($reqt == NULL) {
            $q = $this->_db->prepare("INSERT INTO users SET name = :name, address = :address, telephone = :telephone, ursCode = :ursCode, username = :username, password = :password, priority = :priority, dateAdded = :dateAdded, pic = :pic, status = :status ") or die(mysql_error());

            $q->bindValue(':name', $uncleDan->getName());
            $q->bindValue(':address', $uncleDan->getAddress());
            $q->bindValue(':telephone', $uncleDan->getTelephone());
            $q->bindValue(':ursCode', $uncleDan->getUrsCode());
            $q->bindValue(':username', $uncleDan->getUsername());
            $q->bindValue(':password', $uncleDan->getPassword());
            $q->bindValue(':priority', $uncleDan->getPriority());
            $q->bindValue(':dateAdded', $uncleDan->getDateAdded());
            $q->bindValue(':pic', $uncleDan->getPic());
            $q->bindValue(':status', $uncleDan->getStatus());
            $q->execute();
            
            
            echo"<script language='javascript'>alert('User Added !')</script>";
            
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new user', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Succesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
            
        } else {
            echo"<script language='javascript'>alert('Redondance User Exists already!')</script>";
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Creation of new user', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Unsuccesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
        }
    }


        function listUsers() {
        $resul = $this->_db->query(" SELECT * FROM  users ORDER BY idUsers DESC") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
        <td>" . $rec["name"] . "</td> <td>" . $rec["address"] . "</td><td>" . $rec["telephone"] . "</td><td>" . $rec["ursCode"] . "</td><td>" . $rec["username"] . "</td><td>" . $rec["priority"] . "</td><td>" . $rec["dateAdded"] . "</td><td>" . $rec["status"] . "</td>
                   <td> <a data-rel='tooltip' title='View Users Profile' data-placement='top' class='blue' href=../Admin/indexAdmin.php?page=" . base64_encode('../Admin/users/userProfile') . "&idr=" . base64_encode($rec["idUsers"]) . ">   
                       <i class='ace-icon fa fa-search-plus bigger-130'></i>
                        </a>                        
                 <a data-rel='tooltip' title='Activate this User`s Profile' data-placement='top' class='green' href='#' onclick=activate_User('" . $rec["idUsers"] . "')> <i class='ace-icon fa fa-check bigger-130'></i>
                    </a>
                <a data-rel='tooltip' title='Deactivate this User`s Profile' data-placement='top' class='red' href='#' onclick=deactivate_User('" . $rec["idUsers"] . "')> <i class='ace-icon fa fa-trash-o bigger-130'></i>
                    </a>    
                  </td>
               </tr> ";
        }
    }
    
    
    function listLog() {
        $resul = $this->_db->query(" SELECT operation, author, dateO,result,name FROM  log, users WHERE idUsers = author ORDER BY idLog DESC") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
        <td>" . $rec["operation"] . "</td> <td>" . $rec["name"] . "</td><td>" . $rec["dateO"] . "</td><td>" . $rec["result"] . "</td>                   
               </tr> ";
        }
    }
    
    
    public function update_user($uncleDan) {        
//echo 'boy 1';        
        $q = $this->_db->prepare("UPDATE users SET name = :name, address = :address, telephone = :telephone, username = :username,  priority = :priority, pic = :pic WHERE idUsers = :idUsers") or die(mysql_error());
        
            
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':name', $uncleDan->getName());
            $q->bindValue(':address', $uncleDan->getAddress());
            $q->bindValue(':telephone', $uncleDan->getTelephone());            
            $q->bindValue(':username', $uncleDan->getUsername());            
            $q->bindValue(':priority', $uncleDan->getPriority());
            $q->bindValue(':pic', $uncleDan->getPic());
            $q->execute();
        echo "<script language = 'javascript'> alert ('User Updated ! !')</script>";
        
            $log = $this->_db->prepare("INSERT INTO log SET operation = 'Update User Profile', author = :idUsers, dateO = '".date("d-M-Y h:i:sa")."',result = 'Succesful' ") or die(mysql_error());
            $log->bindValue(':idUsers', $uncleDan->getIdUsers());
            $log->execute();
        
    }
    
  

}
