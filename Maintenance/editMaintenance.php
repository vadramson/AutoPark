<?php
if (isset($_REQUEST["idr"])) {
    
        $idMaintennce = base64_decode($_REQUEST['idr']);        
        $bdd = new AUTOPARK();
        $reqtMaintenace = $bdd->bdd->query("SELECT mentainence.*, vehicles.idVehicle, vehicles.matriculation AS matriculation FROM mentainence, vehicles WHERE mentainence.idVehicle = vehicles.idVehicle AND idMaintennce = '".$idMaintennce."' ") or die(mysql_error());
        $rect = $reqtMaintenace->fetch();
        $reqtVehicle = $bdd->bdd->query("SELECT * FROM vehicles WHERE status = 1 ") or die(mysql_error());

?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Edit Car Maintenace <?php echo $rec['fault']?> </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>                      
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idVehicle">Vehicle <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control" id="idVehicle" name="idVehicle">  

                                        <?php
                                        while ($rec = $reqtVehicle->fetch()) {
                                            if($rec['idMaintennce'] == $idMaintennce){
                                            ?>
                                            <option value="<?php echo $idMaintennce; ?>"> <?php echo $rect['matriculation']; ?> </option>
                                            <?php
                                            }
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
                                    <input type="text" id="fault" name="fault" value="<?php echo $rect['fault']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Garage <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="garage" name="garage" value="<?php echo $rect['garage']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Total cost <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="cost" name="cost" value="<?php echo $rect['cost']; ?>" min="25" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="state" class="form-control col-md-7 col-xs-12" required="required" name="state">
                                        <?php
                                            if($rect['state'] == "In Proces"){
                                                ?>
                                        <option value="<?php echo $rect['state']; ?>"><?php echo $rect['state']; ?></option>
                                        <option value="Finished and out">Finished and out</option>
                                        <?php
                                            }
                                        else {
                                            ?>
                                        <option value="<?php echo $rect['state']; ?>"><?php echo $rect['state']; ?></option>
                                        <option value="In Proces">In Proces</option>
                                        <?php
                                        }
                                        ?>                                        
                                    </select>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label for="dateIn" class="control-label col-md-3 col-sm-3 col-xs-12">Date In <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="dateIn"  name="dateIn" value="<?php echo $rect['dateIn']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">                                
                                <label for="dateOut" class="control-label col-md-3 col-sm-3 col-xs-12">Date Out </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="dateOut"  name="dateOut" value="<?php echo $rect['dateOut']; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="updateMentainence" class="btn btn-success">Update Mentainence</button>
                                </div>
                            </div>
                        </form>
    </div>

</div>

<?php
if (isset($_POST['updateMentainence'])) {
    $bdd = new AUTOPARK();

    $rem = new MentainenceManager($bdd->bdd);
    // print_r($rem);
    $autoParkData = new Mentainence(array(
        'idMaintennce' => $idMaintennce,
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
    $rem->update_expenditure($autoParkData);
}

}
?>