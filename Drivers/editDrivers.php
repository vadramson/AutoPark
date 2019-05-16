<?php
if (isset($_REQUEST["idr"])) {
    
        $idDriver = base64_decode($_REQUEST['idr']);        
        $bdd = new AUTOPARK();
        $reqtDrivers = $bdd->bdd->query("SELECT * FROM drivers WHERE idDriver = '".$idDriver."' ") or die(mysql_error());
        $rec = $reqtDrivers->fetch();
        $reqtVehicle = $bdd->bdd->query("SELECT * FROM vehicles WHERE status = 1 ") or die(mysql_error());
        
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Edit Car Driver Information <?php echo $rec['name']?> </h2>
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
                                <input type="text" required="required" class="form-control" id="name" value="<?php echo $rec['name']?>" name="name" placeholder="Driver`s Name">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="email" required="required" class="form-control" id="email" value="<?php echo $rec['email']?>" name="email" placeholder="Driver`s Email">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" required="required"  class="form-control" name="phone" value="<?php echo $rec['phone']?>" id="phone" placeholder="Driver`s phone number">                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">                                
                                <input type="number" required="required" placeholder="ID Card Number" name="idNumber" value="<?php echo $rec['idNumber']?>" id="idNumber" class="form-control" />                                    
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                Driver`s Picture
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <input type="file" class="form-control" id="picture" name="picture" placeholder="picture">                                
                                <input type="hidden" name="newpicture" value="<?php echo $rec['picture']?>">
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
                                <input type="number" required="required" class="form-control" id="licenseID" name="licenseID" value="<?php echo $rec['licenseID']?>" placeholder="license ID">                                
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

</div>

<?php
if (isset($_POST['saveDriver'])) {
    
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

            $rem = new DriversManager($bdd->bdd);
            // print_r($rem);
            $autoParkData = new Drivers(array(
                'idDriver' => $idDriver,
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
            $rem->update_driver($autoParkData);
        }
    }
    
}

}
?>