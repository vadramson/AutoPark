<?php
if (isset($_REQUEST["idr"])) {
    
        $idModel = base64_decode($_REQUEST['idr']);        
        $bdd = new AUTOPARK();
        $reqtCarmodel = $bdd->bdd->query("SELECT * FROM carmodel WHERE idModel = '".$idModel."' ") or die(mysql_error());
        $rec = $reqtCarmodel->fetch();
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Edit Car Model <?php echo $rec['model']?> </h2>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Car Model <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="model" required="required" value="<?php echo $rec['model']?>" name="model" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Year <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="1945" max="9999" value="<?php echo $rec['year']?>" id="year" name="year" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mark" class="control-label col-md-3 col-sm-3 col-xs-12">Mark <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="mark" class="form-control col-md-7 col-xs-12" value="<?php echo $rec['mark']?>" required="required" type="text" name="mark">
                                </div>
                            </div>                      
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="updateCarModel" class="btn btn-success">Update Model</button>
                                </div>
                            </div>
                        </form>
    </div>

</div>

<?php
if (isset($_POST['updateCarModel'])) {
    $bdd = new AUTOPARK();

    $rem = new CarmodelManager($bdd->bdd);
    // print_r($rem);
    $autoParkData = new Carmodel(array(
        'idModel' => clean($idModel),
        'model' => clean($_POST['model']),
        'year' => clean($_POST['year']),
        'mark' => clean($_POST['mark']),
    ));
//   print_r($autoParkData);                           
    $rem->update_carmodel($autoParkData);
}

}
?>