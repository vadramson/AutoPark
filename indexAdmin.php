<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AutoPark | </title>

        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- Sweet Alerts -->
        <link href="alerts/sweetalert.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
                    <!-- jQuery -->
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <!-- Sweet Alert -->
        <script src="alerts/sweetalert.min.js"></script>
        
        <!-- Bootstrap Colorpicker -->
        <link href="vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

        
        
        <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/DateTimePicker.css" />
    </head>
    <?php
    session_start();
    $iduser = $_SESSION["idUser"];
    $_SESSION["username"];
    $_SESSION["role"];

//echo 'id is '.$iduser;

    if (isset($_SESSION["username"]) && (($_SESSION["role"]) == "Administrator")) {
        include 'Model/db.php';
        include_once('Model/Carmodel/Carmodel.php');
        include_once('Model/Carmodel/CarmodelManager.php');     
        include_once('Model/Vehicles/Vehicles.php');
        include_once('Model/Vehicles/VehiclesManager.php');
        include_once('Model/Expenditure/Expenditure.php');
        include_once('Model/Expenditure/ExpenditureManager.php');
        include_once('Model/Mentainence/Mentainence.php');
        include_once('Model/Mentainence/MentainenceManager.php');
        include_once('Model/Drivers/Drivers.php');
        include_once('Model/Drivers/DriversManager.php');
        include_once('Model/Rentals/Rentals.php');
        include_once('Model/Rentals/RentalsManager.php');


        $bdd = new AUTOPARK();

        $test = $bdd->bdd->query("SELECT * FROM users WHERE idUser = '" . $iduser . "' && status = 1 ") or die(mysql_error());
        $reqt = $test->fetch();
        ?>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <div class="col-md-3 left_col">
                        <div class="left_col scroll-view">
                            <div class="navbar nav_title" style="border: 0;">
                                <a href="indexAdmin.php" class="site_title"><i class="fa fa-automobile"></i> <span>AutoPark</span></a>
                            </div>

                            <div class="clearfix"></div>

                            <!-- menu profile quick info -->
                            <div class="profile">
                                <div class="profile_pic">
                                    <img src="images/<?php echo $reqt["picture"] ?>" alt="..." class="img-circle profile_img">
                                </div>
                                <div class="profile_info">
                                    <span>Welcome,</span>
                                    <h2><?php echo $reqt["username"] ?></h2>
                                </div>
                            </div>
                            <!-- /menu profile quick info -->

                            <br />

                            <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section">
                                    <h3>General</h3>
                                    <ul class="nav side-menu">
                                        <li><a><i class="fa fa-home"></i> Car <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="indexAdmin.php?page=<?php echo base64_encode('Carmodels_V/carModel');?>">Add Car Models</a></li>
                                                <li><a href="indexAdmin.php?page=<?php echo base64_encode('vehicles/vehicle');?>">Add Vehicles</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-edit"></i> Car Expenditures <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="indexAdmin.php?page=<?php echo base64_encode('Expenditures/Expenditures');?>">Expenditures</a></li>                                               
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-desktop"></i> Car Maintenance <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                            <li><a href="indexAdmin.php?page=<?php echo base64_encode('Maintenance/Maintenance');?>">Maintenance</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-table"></i> Drivers <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                              <li><a href="indexAdmin.php?page=<?php echo base64_encode('Drivers/Drivers');?>">Add Driver</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-bar-chart-o"></i> Retals <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="indexAdmin.php?page=<?php echo base64_encode('Rentals/Rentals');?>">Add or Process Rental</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <!-- /sidebar menu -->

                            <!-- /menu footer buttons -->
                            <div class="sidebar-footer hidden-small">
                                <a data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Lock">
                                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Logout">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!-- /menu footer buttons -->
                        </div>
                    </div>

                    <!-- top navigation -->
                    <div class="top_nav">
                        <div class="nav_menu">
                            <nav>
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>

                                <ul class="nav navbar-nav navbar-right">
                                    <li class="">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <img src="images/<?php echo $reqt["picture"] ?>" alt=""><?php echo $reqt["name"] ?>
                                            <span class=" fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">                                            
                                            <li><a href="index.php?lock"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /top navigation -->

                    <!-- page content -->
                    <div class="right_col" role="main">
                        <?php
                        if (isset($_REQUEST["page"])) {
                            $page = base64_decode($_REQUEST["page"]) . ".php";
                            if (file_exists($page)) {
                                @include($page);
                            } else {
                                header("location:autopark_404.php ");
                            }
                        } else {
                            @include('dashboard.php');
                        }
                        ?>                        
                    </div>
                    <!-- /page content -->                       
                    <!-- footer content -->
                    <footer>
                        <div class="pull-right">
                            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>


            <!-- Bootstrap -->
            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="vendors/nprogress/nprogress.js"></script>
            <!-- Chart.js -->
            <script src="vendors/Chart.js/dist/Chart.min.js"></script>
            <!-- gauge.js -->
            <script src="vendors/gauge.js/dist/gauge.min.js"></script>
            <!-- bootstrap-progressbar -->
            <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
            <!-- iCheck -->
            <script src="vendors/iCheck/icheck.min.js"></script>
            <!-- Skycons -->
            <script src="vendors/skycons/skycons.js"></script>
            <!-- Flot -->
            <script src="vendors/Flot/jquery.flot.js"></script>
            <script src="vendors/Flot/jquery.flot.pie.js"></script>
            <script src="vendors/Flot/jquery.flot.time.js"></script>
            <script src="vendors/Flot/jquery.flot.stack.js"></script>
            <script src="vendors/Flot/jquery.flot.resize.js"></script>
            <!-- Flot plugins -->
            <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
            <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
            <script src="vendors/flot.curvedlines/curvedLines.js"></script>
            <!-- DateJS -->
            <script src="vendors/DateJS/build/date.js"></script>
            <!-- JQVMap -->
            <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
            <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
            <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="js/moment/moment.min.js"></script>
            <script src="js/datepicker/daterangepicker.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="build/js/custom.min.js"></script>
            <!-- AJAX Operations File -->
            <script src="js/ajaxOps.js"></script>

             <!-- Datatables Script Import -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
            <script src="js/datetimepicker_css.js"></script>

    
     <!-- Bootstrap Colorpicker -->
    <script src="vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
             
             
             <!-- Datatables -->
    <script>
        console.log(window.location.href);
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    
    <!-- Bootstrap Colorpicker -->
    <script>
      $(document).ready(function() {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
      });
    </script>
    <!-- /Bootstrap Colorpicker -->
    
        </body>
    </html>
    <?php
} else {
    header("location:index.php");
}
?>