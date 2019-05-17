<?php
$bdd = new AUTOPARK();

$reqtRentals = $bdd->bdd->query("SELECT rentals.*, vehicles.idVehicle, vehicles.matriculation AS matriculationx FROM rentals, vehicles WHERE rentals.idVehicle = vehicles.idVehicle ") or die(mysql_error());
$reqtDrivers = $bdd->bdd->query("SELECT * FROM drivers WHERE status = 1 AND availability = 1") or die(mysql_error());
$reqtVehicle = $bdd->bdd->query("SELECT vehicles.*, carmodel.idModel, carmodel.model AS model, carmodel.year AS year, carmodel.mark AS mark FROM vehicles, carmodel WHERE (vehicles.status = 1 AND vehicles.availability = 1) AND vehicles.idModel = carmodel.idModel") or die(mysql_error());
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Car Rentals </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>                      
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add new car Rental</button>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <!--<th>Driver</th>-->
                    <th>Number of Hours</th>                    
                    <th>Unit Hour/ FCFA</th>
                    <th>Rental Type</th>
                    <th>Total Cost</th>
                    <th>Rental ID</th>                    
                    <th>Status</th>
                    <th>Date</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rec = $reqtRentals->fetch()) {
                    ?>  
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
                        <td><?php echo $rec['matriculation']; ?></td>                                                                                                                                               
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
                         elseif ($rec['status'] == 4) {
                            ?>
                            <td><span class="label label-danger pull-right">Canceled</span> </td> 
                            <?php
                        }
                        ?>         
                        <td><?php echo $rec['created']; ?></td> 
                        <td>
                            <?php
                             if ($rec['status'] == 3) {
                                ?>
                                <a data-toggle='tooltip' title='Fininalise Operation' data-placement='top' class='green' href='#' onclick='finalise_rental(<?php echo $rec["idRental"] ?>)'> <i class='ace-icon fa fa-check bigger-130'></i>
                                </a>
                                &nbsp;&nbsp;
                                <a data-toggle="tooltip" data-placement="top" title='Print Receipts'  class='blue' href="indexAdmin.php?page= <?php echo base64_encode('Rentals/printInvoice_pdf') . "&idr=" . base64_encode($rec["idRental"]) ?> " target="blank">   
                                    <i class='ace-icon fa fa-print bigger-500'></i>
                                </a>
                            <?php
                             }
                             if ($rec['status'] == 2) {
                                 ?>
                                &nbsp;&nbsp;
                                <a data-toggle="tooltip" data-placement="top" title='Print Receipts'  class='blue' href="indexAdmin.php?page= <?php echo base64_encode('Rentals/printInvoice_pdf') . "&idr=" . base64_encode($rec["idRental"]) ?> " target="blank">   
                                    <i class='ace-icon fa fa-print bigger-500'></i>
                                </a>
                                &nbsp;&nbsp;
                               <?php 
                             }
                            if ($rec['status'] == 1) {
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title='Process Payment'  class='green' href="indexAdmin.php?page= <?php echo base64_encode('Rentals/processPayments') . "&idr=" . base64_encode($rec["idRental"]) ?> ">   
                                    <i class='ace-icon fa fa-money bigger-500'></i>
                                </a>
                                &nbsp;&nbsp;
                                <a data-toggle="tooltip" data-placement="top" title='Print Receipts'  class='blue' href="indexAdmin.php?page= <?php echo base64_encode('Rentals/printInvoice_pdf') . "&idr=" . base64_encode($rec["idRental"]) ?> " target="blank">   
                                    <i class='ace-icon fa fa-print bigger-500'></i>
                                </a>
                                &nbsp;&nbsp;
                                <a data-toggle='tooltip' title='Cancel Rental Record' data-placement='top' class='red' href='#' onclick='cancel_rental(<?php echo $rec["idRental"] ?>)'> <i class='ace-icon fa fa-close bigger-130'></i>
                                </a>
                                <?php
                            }
                            ?>
                        </td> 
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>        

        <!-- Add Car Model modal -->        
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add New Car Rental</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idVehicle">Vehicle <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <select required="required" class="form-control" id="idVehicle" name="idVehicle">
                                        <option value=""> Select Vehicle</option>    
                                        <?php
                                        while ($rec = $reqtVehicle->fetch()) {
                                            ?>
                                            <option value="<?php echo $rec['idVehicle']; ?>"> <?php echo $rec['matriculation'] . " :- " . $rec['mark'] . " " . $rec['model'] . " -- " . $rec['year']; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Driver
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <select class="form-control" id="idDriver" name="idDriver">
                                        <option value=""> Select Driver</option>    
                                        <?php
                                        while ($rec = $reqtDrivers->fetch()) {
                                            ?>
                                            <option value="<?php echo $rec['idDriver']; ?>"> <?php echo $rec['name'] . " license type " . $rec['licenseType']; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rentalType" class="control-label col-md-3 col-sm-3 col-xs-12">Rental Type <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="rentalType" class="form-control col-md-7 col-xs-12" required="required"  name="rentalType">
                                        <option value="">Select Rental type</option>
                                        <option value="1">With Driver</option>
                                        <option value="2">Without Driver</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label for="hours" class="control-label col-md-3 col-sm-3 col-xs-12">Duration in hours <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="2" max="744" id="hours" class="form-control col-md-7 col-xs-12" required="required"  name="hours">                                        
                                </div>
                            </div>    
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="saveRental" class="btn btn-success">Save Rental</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                          
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
if (isset($_POST['saveRental'])) {
    $bdd = new AUTOPARK();

    $rentalType = clean($_POST['rentalType']);
    $idDriver = clean($_POST['idDriver']);
    if ($rentalType == 1 && !empty($idDriver)) {
        echo '1';
        $random_number = intval("0" . rand(1, 9) . rand(0, 9) . rand(0, 9)); // random(ish) 5 digit int
        $random_string = chr(rand(65, 90)) . chr(rand(65, 90)); // random(ish) 5 character string
        $autoPark = "AutoPark_ ";
        $matriculation = $autoPark . $random_string . $random_number; // concatenate the generated codes       

        $idVehicle = clean($_POST['idVehicle']);
        $rentalType = clean($_POST['rentalType']);
        $hours = clean($_POST['hours']);

        if ($rentalType == 1) {
            $reqtVehicleRqt = $bdd->bdd->query("SELECT * FROM vehicles WHERE idVehicle = '" . $idVehicle . "' ") or die(mysql_error());
            $reqtV = $reqtVehicleRqt->fetch();
            $unitHour = $reqtV['feeWithDriver'];
        } elseif ($rentalType == 2) {
            $reqtVehicleRqt = $bdd->bdd->query("SELECT * FROM vehicles WHERE idVehicle = '" . $idVehicle . "' ") or die(mysql_error());
            $reqtV = $reqtVehicleRqt->fetch();
            $unitHour = $reqtV['feeWithoutDriver'];
        }
        $totalCost = $hours * $unitHour;

        $rem = new RentalsManager($bdd->bdd);
        // print_r($rem);
        $autoParkData = new Rentals(array(
            'idUser' => $iduser,
            'idVehicle' => clean($_POST['idVehicle']),
            'idDriver' => clean($_POST['idDriver']),
            'hours' => clean($_POST['hours']),
            'unitHour' => $unitHour,
            'totalCost' => $totalCost,
            'rentalType' => clean($_POST['rentalType']),
            'matriculation' => $matriculation,
            'status' => 1,
            'registeredBy' => $iduser,
        ));
//   print_r($autoParkData);                           
        $rem->insert_rental($autoParkData);
    } else {
        ?>
        <script>
            swal("Seletion Error!", "Select driver and rental type With Driver OR Select no diver and rental type Without Driver!", "error");
        </script>           
        <?php
    }

    if ($rentalType == 2) {
//        echo '2';
        $random_number = intval("0" . rand(1, 9) . rand(0, 9) . rand(0, 9)); // random(ish) 5 digit int
        $random_string = chr(rand(65, 90)) . chr(rand(65, 90)); // random(ish) 5 character string
        $autoPark = "AutoPark_ ";
        $matriculation = $autoPark . $random_string . $random_number; // concatenate the generated codes       

        $idVehicle = clean($_POST['idVehicle']);
        $rentalType = clean($_POST['rentalType']);
        $hours = clean($_POST['hours']);

        if ($rentalType == 1) {
            $reqtVehicleRqt = $bdd->bdd->query("SELECT * FROM vehicles WHERE idVehicle = '" . $idVehicle . "' ") or die(mysql_error());
            $reqtV = $reqtVehicleRqt->fetch();
            $unitHour = $reqtV['feeWithDriver'];
        } elseif ($rentalType == 2) {
            $reqtVehicleRqt = $bdd->bdd->query("SELECT * FROM vehicles WHERE idVehicle = '" . $idVehicle . "' ") or die(mysql_error());
            $reqtV = $reqtVehicleRqt->fetch();
            $unitHour = $reqtV['feeWithoutDriver'];
        }
        $totalCost = $hours * $unitHour;

        $rem = new RentalsManager($bdd->bdd);
        // print_r($rem);
        $autoParkData = new Rentals(array(
            'idUser' => $iduser,
            'idVehicle' => clean($_POST['idVehicle']),
//            'idDriver' => "0",
            'hours' => clean($_POST['hours']),
            'unitHour' => $unitHour,
            'totalCost' => $totalCost,
            'rentalType' => clean($_POST['rentalType']),
            'matriculation' => $matriculation,
            'status' => 1,
            'registeredBy' => $iduser,
        ));
//   print_r($autoParkData);                           
        $rem->insert_rental($autoParkData);
    } else {
        ?>
        <script>
            swal("Seletion Error!", "Select no diver and rental type Without Driver OR Select driver and rental type: With Driver !", "error");
        </script>              
        <?php
    }
}
?>