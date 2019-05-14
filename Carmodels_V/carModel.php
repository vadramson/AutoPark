<?php
$bdd = new AUTOPARK();

$reqtCarmodel = $bdd->bdd->query("SELECT * FROM carmodel ") or die(mysql_error());
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
        <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add new car model</button>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Mark</th>                    
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rec = $reqtCarmodel->fetch()) {
                    ?>  
                    <tr>
                        <td><?php echo $rec['model']; ?></td>                    
                        <td><?php echo $rec['year']; ?></td>                    
                        <td><?php echo $rec['mark']; ?></td>                    
                        <td><?php echo $rec['created']; ?></td>                                        
                        <td><?php echo $rec['updated']; ?></td>                                        
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
                            <?php // echo $rec['model']; ?>
                            <a data-toggle="tooltip" data-placement="top" title='Edit Car Model'  class='green' href="indexAdmin.php?page= <?php echo base64_encode('Carmodels_V/editCarModel') . "&idr=" . base64_encode($rec["idModel"]) ?> ">   
                             <i class='ace-icon fa fa-edit bigger-500'></i>
                            </a>
                            &nbsp;&nbsp;
                              <?php
                            if ($rec['status'] == 1) {
                            ?>
                            <a data-toggle='tooltip' title='Deactivate this Car Model' data-placement='top' class='red' href='#' onclick='deactivate_Carmodel(<?php echo $rec["idModel"] ?>)'> <i class='ace-icon fa fa-trash-o bigger-500'></i>
                            </a>
                            <?php
                            } else {
                            ?>                            
                            <a data-toggle='tooltip' title='Activate this Car Model' data-placement='top' class='primary' href='#' onclick='activate_Carmodel(<?php echo $rec["idModel"] ?>)'> <i class='ace-icon fa fa-check-circle-o bigger-130'></i>
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
                        <h4 class="modal-title" id="myModalLabel">Add New Car Model</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Car Model <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="model" required="required" name="model" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Year <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="1945" id="year" name="year" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mark" class="control-label col-md-3 col-sm-3 col-xs-12">Mark <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="mark" class="form-control col-md-7 col-xs-12" required="required" type="text" name="mark">
                                </div>
                            </div>                      
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="saveCarModel" class="btn btn-success">Save Model</button>
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
if (isset($_POST['saveCarModel'])) {
    $bdd = new AUTOPARK();

    $rem = new CarmodelManager($bdd->bdd);
    // print_r($rem);
    $autoParkData = new Carmodel(array(
        'model' => clean($_POST['model']),
        'year' => clean($_POST['year']),
        'mark' => clean($_POST['mark']),
    ));
//   print_r($autoParkData);                           
    $rem->insert_carmodel($autoParkData);
}
?>