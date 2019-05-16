<?php
$bdd = new AUTOPARK();

$reqtExpenditure = $bdd->bdd->query("SELECT expenditure.*, vehicles.idVehicle, vehicles.matriculation AS matriculation FROM expenditure, vehicles WHERE expenditure.idVehicle = vehicles.idVehicle") or die(mysql_error());
$reqtVehicle = $bdd->bdd->query("SELECT * FROM vehicles WHERE status = 1 ") or die(mysql_error());
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Expenditure </h2>
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
                    <th>Nature</th>
                    <th>Description</th>                    
                    <th>cost</th>
                    <th>dateExpenditure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rec = $reqtExpenditure->fetch()) {
                    ?>  
                    <tr>
                        <td><?php echo $rec['matriculation']; ?></td>                    
                        <td><?php echo $rec['nature']; ?></td>                    
                        <td><?php echo $rec['description']; ?></td>                    
                        <td><?php echo $rec['cost']; ?></td>                                        
                        <td><?php echo $rec['dateExpenditure']; ?></td>                                                                                              
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
                        <h4 class="modal-title" id="myModalLabel">Add New Car Expenditure</h4>
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
                                    </select>                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nature">Nature <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nature" name="nature" required="required" class="form-control col-md-7 col-xs-12">
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
                                <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="description" class="form-control col-md-7 col-xs-12" required="required" name="description"></textarea>
                                </div>
                            </div>                      
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="saveCarExpenditure" class="btn btn-success">Save Expenditure</button>
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
if (isset($_POST['saveCarExpenditure'])) {
    $bdd = new AUTOPARK();

    $rem = new ExpenditureManager($bdd->bdd);
    // print_r($rem);
    $autoParkData = new Expenditure(array(
        'idVehicle' => clean($_POST['idVehicle']),
        'nature' => clean($_POST['nature']),
        'description' => clean($_POST['description']),
        'cost' => clean($_POST['cost']),
    ));
//   print_r($autoParkData);                           
    $rem->insert_expenditure($autoParkData);
}
?>