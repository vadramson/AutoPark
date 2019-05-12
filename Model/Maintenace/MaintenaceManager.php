<?php

class MaintenaceManager {

    private $_db; // Instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_maintenance($uncleDan) {

            $q = $this->_db->prepare("INSERT INTO maintenance SET idUsers = :idUsers, company = :company, amount = :amount, teamLeader = :teamLeader, dateOp = :dateOp, visible = :visible ") or die(mysql_error());
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':company', $uncleDan->getCompany());
            $q->bindValue(':amount', $uncleDan->getAmount());
            $q->bindValue(':teamLeader', $uncleDan->getTeamLeader());
            $q->bindValue(':dateOp', $uncleDan->getDateOp());
            $q->bindValue(':visible', $uncleDan->getVisible());
            $q->execute();

            echo"<script language='javascript'>alert('Maintenace Operation Registered !')</script>";
        
    }


        function listMaintenance(){
        $resul = $this->_db->query(" SELECT maintenance.*, maintenance.idUsers, name, users.idUsers FROM  maintenance, users WHERE  maintenance.idUsers = users.idUsers") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
                 <td>" . $rec["name"] . "</td> <td>" . $rec["company"] . "</td><td>" . $rec["amount"] . "</td><td>F CFA</td><td>" . $rec["teamLeader"] . "</td><td>" . $rec["dateOp"] . "</td><td>" . $rec["visible"] . "</td>
                   <td> <a data-rel='tooltip' title='View and or Edit This Maintenance' data-placement='top' class='blue' href=../Technical/indexTechnical.php?page=" . base64_encode('../Technical/Maintenance/viewMaintenance') . "&idr=" . base64_encode($rec["idMaintenace"]) . ">   
                       <i class='ace-icon fa fa-search-plus bigger-130'></i>
                        </a>
                  </td>
               </tr> ";
        }
    }
    
    
    public function update_expenses($uncleDan) {
        
        $q = $this->_db->prepare("UPDATE maintenance SET idUsers = :idUsers, company = :company, amount = :amount, teamLeader = :teamLeader, dateOp = :dateOp WHERE idMaintenace = :idMaintenace") or die(mysql_error());
            $q->bindValue(':idMaintenace', $uncleDan->getIdMaintenace());
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':company', $uncleDan->getCompany());
            $q->bindValue(':amount', $uncleDan->getAmount());
            $q->bindValue(':teamLeader', $uncleDan->getTeamLeader());
            $q->bindValue(':dateOp', $uncleDan->getDateOp());
            $q->execute();
        echo "<script language = 'javascript'> alert ('Maintenance Operation Updated ! !')</script>";
        
    }
    
  

}
