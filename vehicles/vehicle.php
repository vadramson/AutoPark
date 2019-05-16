<?php
$bdd = new AUTOPARK();

$reqtVehicle = $bdd->bdd->query("SELECT vehicles.*, carmodel.idModel, carmodel.model AS model FROM vehicles, carmodel WHERE carmodel.idModel = vehicles.idModel ") or die(mysql_error());
$reqtCarmodel = $bdd->bdd->query("SELECT * FROM carmodel WHERE status = 1 ") or die(mysql_error());
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Car Models </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>                      
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add new Vehicle</button>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Model</th>
                    <th>Matriculation</th>
                    <th>Sim Number</th>                    
                    <th>Seats</th>                    
                    <th>Technology</th>
                    <th>Fee With Driver</th>
                    <th>Fee Without Driver</th>
                    <th>Availability</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rec = $reqtVehicle->fetch()) {
                    ?>  
                    <tr>
                        <td>
                            <img width="100px" src="images/vehicles/<?php echo $rec["picture"] ?>" alt="..." class="img-thumbnail">
                        </td>                    
                        <td><?php echo $rec['model']; ?></td>                    
                        <td><?php echo $rec['matriculation']; ?></td>                    
                        <td><?php echo $rec['simNumber']; ?></td>                                        
                        <td><?php echo $rec['seats']; ?></td>                                        
                        <td><?php echo $rec['technology']; ?></td>                                        
                        <td><?php echo $rec['feeWithDriver']; ?></td>                                        
                        <td><?php echo $rec['feeWithoutDriver']; ?></td>                                                                                                   
                        <?php
                        if ($rec['availability'] == 1) {
                            ?>
                            <td><span class="label label-success pull-right">Available</span> </td> 
                            <?php
                        } else {
                            ?>
                            <td><span class="label label-danger pull-right">Not Available</span> </td> 
                            <?php
                        }
                        ?>
                        <?php
                        if ($rec['status'] == 1) {
                            ?>
                            <td><span class="label label-success pull-right">Activated</span> </td> 
                            <?php
                        } else {
                            ?>
                            <td><span class="label label-danger pull-right">Deactivated</span> </td> 
                            <?php
                        }
                        ?>          
                        <td>                            
                            <a data-toggle="tooltip" data-placement="top" title='Edit Vehicle'  class='green' href="indexAdmin.php?page= <?php echo base64_encode('vehicles/editvehicles') . "&idr=" . base64_encode($rec["idVehicle"]) ?> ">   
                                <i class='ace-icon fa fa-edit bigger-500'></i>
                            </a>
                            &nbsp;&nbsp;
                            <?php
                            if ($rec['status'] == 1) {
                                ?>
                                <a data-toggle='tooltip' title='Deactivate this Vehicle' data-placement='top' class='red' href='#' onclick='deactivate_Vehicle(<?php echo $rec["idVehicle"] ?>)'> <i class='ace-icon fa fa-trash-o bigger-500'></i>
                                </a>
                                <?php
                            } else {
                                ?>                            
                                <a data-toggle='tooltip' title='Activate this Vehicle' data-placement='top' class='primary' href='#' onclick='activate_Vehicle(<?php echo $rec["idVehicle"] ?>)'> <i class='ace-icon fa fa-check-circle-o bigger-130'></i>
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
                        <h4 class="modal-title" id="myModalLabel">Add New Vehicle</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select required="required" class="form-control" id="idModel" name="idModel">
                                    <option value=""> Select Car Model</option>    
                                    <?php
                                    while ($rec = $reqtCarmodel->fetch()) {
                                        ?>
                                        <option value="<?php echo $rec['idModel']; ?>"> <?php echo $rec['mark'] . " " . $rec['model'] . " -- " . $rec['year']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" required="required" class="form-control" id="matriculation" name="matriculation" placeholder="Car Imatriculation">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" min="2" max="70" class="form-control" name="seats" id="seats" placeholder="Number of Seats">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="input-group demo2">
                                    <input type="text" required="required" placeholder="Select Vehicle Colour" name="colour" id="colour" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                Vehicle picture
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="file" required="required" class="form-control" id="picture" name="picture" placeholder="picture">                                
                            </div>                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select required="required"  class="form-control" name="technology" id="technology" placeholder="Vehicle Technology">                                
                                    <option value=""> Select Vehicle Technology</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="text" required="required" class="form-control" id="simNumber" name="simNumber" placeholder="Sim Number (For GPRS)">                                
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" min="2500" class="form-control" id="feeWithDriver" name="feeWithDriver" placeholder="Hourly fee With Driver">                                
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" min="1500" class="form-control" id="feeWithoutDriver" name="feeWithoutDriver" placeholder="Hourly fee Without Driver">                                
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="saveVehicle" class="btn btn-success">Save Vehicle</button>
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
if (isset($_POST['saveVehicle'])) {
    
    $bdd = new AUTOPARK();

    $picture = $_FILES['picture']['name'];
    $picture_temp = $_FILES['picture']['tmp_name'];
    

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
            $rem->insert_vehicles($autoParkData);
        }
    }
    
}
?>