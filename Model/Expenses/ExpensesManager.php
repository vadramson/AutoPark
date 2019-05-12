<?php

class ExpensesManager {

    private $_db; // Instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->_db = $db;
    }

    function insert_expenses($uncleDan) {

            $q = $this->_db->prepare("INSERT INTO expenses SET idUsers = :idUsers, reason = :reason, amount = :amount, dateOp = :dateOp, visible = :visible ") or die(mysql_error());
            $q->bindValue(':idUsers', $uncleDan->getIdUsers());
            $q->bindValue(':reason', $uncleDan->getReason());
            $q->bindValue(':amount', $uncleDan->getAmount());
            $q->bindValue(':dateOp', $uncleDan->getDateOp());
            $q->bindValue(':visible', $uncleDan->getVisible());
            $q->execute();

            echo"<script language='javascript'>alert('Expense Added !')</script>";
        
    }


        function listExpenses() {
        $resul = $this->_db->query(" SELECT expenses.*, expenses.idUsers, name  FROM  expenses, users WHERE expenses.idUsers = users.idUsers ") or die(mysql_error());
        while ($rec = $resul->fetch()) {
            ?>
            <tr> 
            <?php

            echo" 
                 <td>" . $rec["name"] . "</td> <td>" . $rec["reason"] . "</td><td>" . $rec["amount"] . "</td><td> F CFA</td><td>" . $rec["dateOp"] . "</td><td>" . $rec["visible"] . "</td>
                   <td> <a data-rel='tooltip' title='View and or Edit This Expense' data-placement='top' class='blue' href=../Purchase/indexPurchase.php?page=" . base64_encode('../Purchase/Expenses/viewExpenses') . "&idr=" . base64_encode($rec["idExpense"]) . ">   
                       <i class='ace-icon fa fa-search-plus bigger-130'></i>
                        </a> 
                  </td>
               </tr> ";
        }
    }
    
    
    public function update_expenses($uncleDan) {        
        
        $q = $this->_db->prepare("UPDATE expenses SET idUsers = :idUsers, reason = :reason, amount = :amount, dateOp = :dateOp WHERE idExpense = :idExpense") or die(mysql_error());
//        echo $uncleDan->getIdExpense();
            $q->bindValue(':idExpense', $uncleDan->getIdExpense());
            $q->bindValue(':idUsers', $uncleDan->getIdUsers()); 
            $q->bindValue(':reason', $uncleDan->getReason());
            $q->bindValue(':amount', $uncleDan->getAmount());
            $q->bindValue(':dateOp', $uncleDan->getDateOp());
            $q->execute();
//            echo 'boy 1';
        echo "<script language = 'javascript'> alert ('Expense Updated ! !')</script>";
        
    }
    
  

}
