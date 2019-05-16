<?php
$bdd = new AUTOPARK();

$reqtMentainence = $bdd->bdd->query("SELECT mentainence.*, vehicles.idVehicle, vehicles.matriculation AS matriculation FROM mentainence, vehicles WHERE mentainence.idVehicle = vehicles.idVehicle") or die(mysql_error());
$reqtVehicle = $bdd->bdd->query("SELECT * FROM vehicles WHERE status = 1 ") or die(mysql_error());
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Mentainence </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>                      
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add new car expenditure</button>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Fault</th>
                    <th>Garage</th>                    
                    <th>Cost</th>
                    <th>State</th>                    
                    <th>Date In</th>
                    <th>Expected Date Out</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rec = $reqtMentainence->fetch()) {
                    ?>  
                    <tr>
                        <td><?php echo $rec['matriculation']; ?></td>                    
                        <td><?php echo $rec['fault']; ?></td>                    
                        <td><?php echo $rec['garage']; ?></td>                    
                        <td><?php echo $rec['cost']; ?></td>                                        
                        <td><?php echo $rec['state']; ?></td>                                        
                        <td><?php echo $rec['dateIn']; ?></td>                                                                                              
                        <td><?php echo $rec['dateOut']; ?></td>                                                                                              
                        <td>
                            <?php 
                            if( $rec['dateOut'] == "0000-00-00"){
                                ?>
                             <a data-toggle="tooltip" data-placement="top" title='Edit Maintenence Record'  class='green' href="indexAdmin.php?page= <?php echo base64_encode('Maintenance/editMaintenance') . "&idr=" . base64_encode($rec["idMaintennce"]) ?> ">   
                             <i class='ace-icon fa fa-edit bigger-500'></i>
                            </a>
                            &nbsp;&nbsp;
                            <?php 
                            }
                            echo $rec['dateOut']; ?>
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
                        <h4 class="modal-title" id="myModalLabel">Add New Car Mentainence</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idVehicle">Vehicle <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control" id="idVehicle" name="idVehicle">
                                        <option value=""> Select Car Vehicle</option>    
                                        <?php
                                        while ($rec = $reqtVehicle->fetch()) {
                                            ?>
                                            <option value="<?php echo $rec['idVehicle']; ?>"> <?php echo $rec['matriculation']; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>                               
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nature">Fault <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="fault" name="fault" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Garage <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="garage" name="garage" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Total cost <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="cost" name="cost" min="25" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="state" class="form-control col-md-7 col-xs-12" required="required" name="state">
                                        <option value="">Select State</option>
                                        <option value="In Proces">In Proces</option>
                                        <option value="Finished and out">Finished and out</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label for="dateIn" class="control-label col-md-3 col-sm-3 col-xs-12">Date In <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="dateIn"  name="dateIn" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="dateOut" class="control-label col-md-3 col-sm-3 col-xs-12">Date Out </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="dateOut"  name="dateOut"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="saveMentainence" class="btn btn-success">Save Mentainence</button>
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
if (isset($_POST['saveMentainence'])) {
    $bdd = new AUTOPARK();

    $rem = new MentainenceManager($bdd->bdd);
    // print_r($rem);
    $autoParkData = new Mentainence(array(
        'idVehicle' => clean($_POST['idVehicle']),
        'idUser' => $iduser,
        'fault' => clean($_POST['fault']),
        'garage' => clean($_POST['garage']),
        'cost' => clean($_POST['cost']),
        'state' => clean($_POST['state']),
        'dateIn' => clean($_POST['dateIn']),
        'dateOut' => clean($_POST['dateOut']),
    ));
//   print_r($autoParkData);                           
    $rem->insert_mentainence($autoParkData);
}
?>