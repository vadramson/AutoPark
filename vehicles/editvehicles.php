<?php
if (isset($_REQUEST["idr"])) {
    
        $idVehicle = base64_decode($_REQUEST['idr']);        
        $bdd = new AUTOPARK();
        $reqtVehicle = $bdd->bdd->query("SELECT vehicles.*, carmodel.idModel, carmodel.model AS model FROM vehicles, carmodel WHERE idVehicle = '".$idVehicle."' AND carmodel.idModel = vehicles.idModel ") or die(mysql_error());
        $rec = $reqtVehicle->fetch();
        $reqtCarmodel = $bdd->bdd->query("SELECT * FROM carmodel WHERE status = 1 ") or die(mysql_error());
        
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Edit Vehicle <?php echo $rec['mark'].' '.$rec['model']. ' '. $rec['year']?> </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>                      
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
       <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select required="required" class="form-control" id="idModel" name="idModel">
                                    <option value=""> Select Car Model</option>    
                                    <?php
                                    while ($rect = $reqtCarmodel->fetch()) {
                                        ?>
                                        <option value="<?php echo $rect['idModel']; ?>"> <?php echo $rect['mark'] . " " . $rect['model'] . " -- " . $rect['year']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" required="required" value="<?php echo $rec['matriculation']; ?>" class="form-control" id="matriculation" name="matriculation" placeholder="Car Imatriculation">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" value="<?php echo $rec['seats']; ?>" min="2" max="70" class="form-control" name="seats" id="seats" placeholder="Number of Seats">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="input-group demo2">
                                    <input type="text" required="required" placeholder="Select Vehicle Colour" value="<?php echo $rec['colour']; ?>" name="colour" id="colour" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                Vehicle picture
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="file"  class="form-control" id="picture" name="picture" placeholder="picture">                                
                                <input type="hidden" name="newpicture" value="<?php echo $rec['picture']; ?>">
                            </div>                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select required="required"  class="form-control" name="technology" id="technology" placeholder="Vehicle Technology">                                
                                    <?php
                                            if($rec['technology'] == "Automatic"){
                                                ?>
                                        <option value="<?php echo $rec['technology']; ?>"><?php echo $rec['technology']; ?></option>
                                        <option value="Manual">Manual</option>
                                        <?php
                                            }
                                        else {
                                            ?>
                                        <option value="<?php echo $rec['technology']; ?>"><?php echo $rec['technology']; ?></option>
                                        <option value="Automatic">Automatic</option>
                                        <?php
                                        }
                                        ?>   
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="text" required="required" class="form-control" id="simNumber" name="simNumber" value="<?php echo $rec['simNumber']; ?>" placeholder="Sim Number (For GPRS)">                                
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" min="2500" class="form-control" id="feeWithDriver" name="feeWithDriver" value="<?php echo $rec['feeWithDriver']; ?>" placeholder="Hourly fee With Driver">                                
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" min="1500" class="form-control" id="feeWithoutDriver" name="feeWithoutDriver" value="<?php echo $rec['feeWithoutDriver']; ?>" placeholder="Hourly fee Without Driver">                                
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="updateVehicle" class="btn btn-success">Update Vehicle</button>
                                </div>
                            </div>
                        </form>
    </div>

</div>

<?php
if (isset($_POST['updateVehicle'])) {
    
    $bdd = new AUTOPARK();

    $picture = $_FILES['picture']['name'];
    $picture_temp = $_FILES['picture']['tmp_name'];
    $emptPic = clean($_POST['newpicture']);
    
    if(empty($picture)){
        $picture = $emptPic;
    } else {
        $picture = $picture;
    }

// Get the extension of the uploaded picture
    if (!empty($picture)) {
        $image = explode('.', $picture); // split the name of picture into two based on extension with the full stop (.) delimiter
        $image_extension = end($image); // get the end or extension  of the image
//                print_r($image_extension); //test if it works.
        if (in_array(strtolower($image_extension), array('png', 'gif', 'jpg', 'jpeg')) === false) {
            echo"<script language='javascript'>alert('Choose a Valid Image!')</script>";
        } else {

            $rem = new VehiclesManager($bdd->bdd);
            // print_r($rem);
            $autoParkData = new Vehicles(array(
                'idVehicle' => $idVehicle,
                'idModel' => clean($_POST['idModel']),
                'matriculation' => clean($_POST['matriculation']),
                'seats' => clean($_POST['seats']),
                'colour' => clean($_POST['colour']),
                'technology' => clean($_POST['technology']),
                'simNumber' => clean($_POST['simNumber']),
                'feeWithDriver' => clean($_POST['feeWithDriver']),
                'feeWithoutDriver' => clean($_POST['feeWithoutDriver']),
                'picture' => $picture,
            ));
//               print_r($autoParkData); 
            move_uploaded_file($picture_temp, 'images/vehicles/' . $picture);
            $rem->update_vehicle($autoParkData);
        }
    }
    
}

}
?>