<style>
    #ammt{
        /*font-family: 'Lucida Calligraphy';*/
        font-weight: bold;
        background-color: skyblue;
        opacity: 0.5;
    }

    #outsd{
        /*font-family: 'Lucida Calligraphy';*/
        font-weight: bold;
        /*color:red;*/
        background-color: grey;
        /*opacity: 0.5;*/
    }

    #dynamic-table td{
        border: 1px;
        border-color: #66757f;
    }

    #dynamic-table th{
        border: 1px;
        border-color: #66757f;
        background-color: #66757f;
    }

</style>
<?php
require_once 'Model/db.php';
if (isset($_REQUEST["idr"])) {
    $idRental = base64_decode($_REQUEST["idr"]);

    $bdd = new AUTOPARK();

//    $reqtRental = $bdd->bdd->query("SELECT * FROM rentals WHERE idRental = '" . $idRental . "' ") or die(mysql_error());
    $reqtRental = $bdd->bdd->query("SELECT rentals.*, vehicles.idVehicle, vehicles.matriculation AS matriculationx FROM rentals, vehicles WHERE idRental = '" . $idRental . "' AND (rentals.idVehicle = vehicles.idVehicle) ") or die(mysql_error());
    $rec = $reqtRental->fetch();
    ?>

    <page backtop="0mm" backbottom="5mm" backleft="0mm" backright="0mm">  
        <table style="width: 100%;border: none; background-color: #66757f; ">
            <tr style="height: 5mm" >
                <td style="width: 40%;  font-size: 6pt; font-weight: bold;">
                    <h4 style="text-align: center; "><?php echo "AutoPark Plc."; ?></h4>
                    <h6> <span style="line-height: 0.5pt; margin-left: 5mm;">   <?php echo "PO BOX 6064 "; ?><?php echo strtoupper("Douala Cameroun"); ?></span><br>
                        <span style="line-height: 0.5pt; margin-left: 2mm;">  Email:  <?php echo " info@autopark.com" ?>
                            TEL: <?php echo "678 583 312"; ?></span></h6>
                </td>
                <td style="width: 22%; text-align: center; font-size: 7.5pt; font-weight: bold;">
                    <img src="images/logo.png"  alt="logo" style="height: 7mm; border-radius: 6mm;"><br>
                    <p> Customers's Copy.</p>
                </td>
                <td style="width: 37%;  font-size: 7pt; font-weight: bold;">
                    <h5>Date : <span style="text-decoration: none;"> <?php echo date("d-M-Y h:i:s a"); ?> </span> </h5>                    
                    <h5>Invoice N<sup>o </sup><span style="text-decoration: underline;"> <?php echo $rec['matriculation']; ?> </span></h5>
                </td><br> 
            </tr>
        </table><br>
        <table border="1" >
            <thead>
                <tr style="padding: 5px;">
                    <th>Vehicle</th>
                    <th>Number Hours</th>                    
                    <th>Unit Hour/ FCFA</th>
                    <th>Rental Type</th>
                    <th>Total</th>                    
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>  
                    <tr>
                        <td><?php echo $rec['matriculationx']; ?></td>                                                              
                        <td><?php echo $rec['hours']; ?></td>                    
                        <td><?php echo $rec['unitHour']; ?></td>                                                                
                            <?php
                            if ($rec['rentalType'] == 1) {
                            ?>
                            <td><span class="label label-success pull-right">With Driver</span> </td> 
                            <?php
                        } elseif ($rec['rentalType'] == 2) {
                            ?>
                            <td><span class="label label-primary pull-right">Without Driver</span> </td> 
                            <?php
                        }
                        ?>                                       
                        <td><?php echo $rec['totalCost']; ?></td>                                                                                                                                                                                                                                                                                              
                        <?php
                        if ($rec['status'] == 1) {
                            ?>
                            <td><span class="label label-success pull-right">Initiated</span> </td> 
                            <?php
                        } elseif ($rec['status'] == 2) {
                            ?>
                            <td><span class="label label-primary pull-right">Completed</span> </td> 
                            <?php
                        } elseif ($rec['status'] == 3) {
                            ?>
                            <td><span class="label label-default pull-right">Payed</span> </td> 
                            <?php
                        }
                        ?>         
                    </tr>                   
            </tbody>
        </table>                     
           <br>
           <table border="1">
               <tr>
                   <td style="width: 50%; padding-left: 52px; padding-right: 52px; padding-top: 30px;">
                       AutoParks`s Signature
                   </td>
                   <td style="width: 50%; padding-left: 52px; padding-right: 52px; padding-top: 30px;">
                       Customer`s Signature
                   </td>
               </tr>
           </table>


    </page>


    <!--Duplicate Receipt-->






    <?php
}


