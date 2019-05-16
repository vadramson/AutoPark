<?php
$bdd = new AUTOPARK();

$reqtDrivers = $bdd->bdd->query("SELECT * FROM drivers") or die(mysql_error());
$reqtVehicle = $bdd->bdd->query("SELECT * FROM vehicles WHERE status = 1 ") or die(mysql_error());
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Drivers </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>                      
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add New Car Driver</button>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>                    
                    <th>License Type</th>
                    <th>License ID</th>
                    <th>Availability</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rec = $reqtDrivers->fetch()) {
                    ?>  
                    <tr>
                        <td>
                            <img width="70px" src="images/drivers/<?php echo $rec["picture"] ?>" alt="..." class="img-thumbnail">
                        </td>
                        <td><?php echo $rec['name']; ?></td>                    
                        <td><?php echo $rec['email']; ?></td>                    
                        <td><?php echo $rec['phone']; ?></td>                    
                        <td><?php echo $rec['licenseType']; ?></td>                                        
                        <td><?php echo $rec['licenseID']; ?></td>                                                                                                                                                                                           
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
                            <a data-toggle="tooltip" data-placement="top" title='Edit Driver'  class='green' href="indexAdmin.php?page= <?php echo base64_encode('Drivers/editDrivers') . "&idr=" . base64_encode($rec["idDriver"]) ?> ">   
                                <i class='ace-icon fa fa-edit bigger-500'></i>
                            </a>
                            &nbsp;&nbsp;
                            <?php
                            if ($rec['status'] == 1) {
                                ?>
                                <a data-toggle='tooltip' title='Deactivate this Driver' data-placement='top' class='red' href='#' onclick='deactivate_Driver(<?php echo $rec["idDriver"] ?>)'> <i class='ace-icon fa fa-trash-o bigger-500'></i>
                                </a>
                                <?php
                            } else {
                                ?>                            
                                <a data-toggle='tooltip' title='Activate this Driver' data-placement='top' class='primary' href='#' onclick='activate_Driver(<?php echo $rec["idDriver"] ?>)'> <i class='ace-icon fa fa-check-circle-o bigger-130'></i>
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
                        <h4 class="modal-title" id="myModalLabel">Add New Car Driver</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" required="required" class="form-control" id="name" name="name" placeholder="Driver`s Name">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="email" required="required" class="form-control" id="email" name="email" placeholder="Driver`s Email">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" required="required"  class="form-control" name="phone" id="phone" placeholder="Driver`s phone number">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">                                
                                <input type="number" required="required" placeholder="ID Card Number" name="idNumber" id="idNumber" class="form-control" />                                    
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                Driver`s Picture
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="file" required="required" class="form-control" id="picture" name="picture" placeholder="picture">                                
                            </div>                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select required="required"  class="form-control" name="licenseType" id="licenseType" >                                
                                    <option value=""> Select Driver`s license Type</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="description" class="control-label">Driver`s License ID <span class="required">*</span></label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="number" required="required" class="form-control" id="licenseID" name="licenseID" placeholder="license ID">                                
                            </div>                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="saveDriver" class="btn btn-success">Save Driver</button>
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
if (isset($_POST['saveDriver'])) {
    
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

            $rem = new DriversManager($bdd->bdd);
            // print_r($rem);
            $autoParkData = new Drivers(array(
                'idUser' => $iduser,
                'name' => clean($_POST['name']),
                'licenseType' => clean($_POST['licenseType']),
                'licenseID' => clean($_POST['licenseID']),
                'idNumber' => clean($_POST['idNumber']),
                'email' => clean($_POST['email']),
                'phone' => clean($_POST['phone']),
                'picture' => $picture,
            ));
//               print_r($autoParkData); 
            move_uploaded_file($picture_temp, 'images/drivers/' . $picture);
            $rem->insert_driver($autoParkData);
        }
    }
    
}
?>