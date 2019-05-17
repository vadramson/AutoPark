<?php
if (isset($_REQUEST["idr"])) {
    
        $idRental = base64_decode($_REQUEST['idr']);        
        $bdd = new AUTOPARK();
        $reqtRental = $bdd->bdd->query("SELECT * FROM rentals WHERE idRental = '".$idRental."' ") or die(mysql_error());
        $rec = $reqtRental->fetch();
?>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-car"></i> Process Rental Payment: <?php echo $rec['matriculation']?> </h2>
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
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button style="margin-left: 45%;" class="btn btn-block btn-primary col-md-7 col-xs-12"><i class="fa fa-money"></i><?php echo ' '.$rec['totalCost'].' XAF';?></button>
                                    <input type="hidden" id="idRental" required="required" value="<?php $rec['totalCost']?>" name="totalCost" class="form-control ">
                                    <input type="hidden" id="idRental" required="required" value="<?php $idRental?>" name="idRental" class="form-control ">
                                </div>
                            </div>                     
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="processPayment" class="btn btn-success">Proceed With Payment</button>
                                </div>
                            </div>
                        </form>
    </div>

</div>

<?php
if (isset($_POST['processPayment'])) {
    $bdd = new AUTOPARK();
    $totalCost = $rec['totalCost'];
    
   $reqtPayments = $bdd->bdd->query("INSERT INTO payments SET idRental = '".$idRental."', totalCost = '".$totalCost."' ") or die(mysql_error());
   $reqtRental = $bdd->bdd->query("UPDATE rentals SET status = 3 WHERE idRental = '".$idRental."' ") or die(mysql_error());
    ?>
            <script>
             swal("Rental!", "Payed Successefully!", "success");   
             setTimeout(function() {
                window.location.href = "indexAdmin.php?page=UmVudGFscy9SZW50YWxz";
             }, 120);   
            </script>;              
            <?php
}

}
?>