
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Login Page - AutoPark</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="assets/css/ace.min.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="View/assets/css/ace-part2.min.css" />
        <![endif]-->
        <script src="assets/js/ace-extra.min.js"></script>
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
        <script src="assets/js/Custom/sweetalert-dev.js"></script>
        <script src="assets/js/Custom/sweetalert.min.js"></script>
        <link rel="stylesheet"  href="assets/css/sweetalert.css">

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="View/assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="View/assets/js/html5shiv.min.js"></script>
        <script src="View/assets/js/respond.min.js"></script>
        <![endif]-->

        <?php
        session_start();
        include_once('Model/db.php');

        if (isset($_POST['conn'])) {

            $login = clean($_POST['username']);
            $pass = sha1(clean($_POST['password']));

            $bdd = new AUTOPARK();

            $test = $bdd->bdd->query("SELECT * FROM users WHERE (username ='" . $login . "' && password ='" . $pass . "') && status = 1  ") or die(mysql_error());
            $reqt = $test->fetch();

            /*    Query to get name and other stuffs about user    */

            if ($reqt == NULL) {
                ?>
            <center>    
                <div class="lert alert-block alert-danger" style="position: relative; width: 65%; ">
                    <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                    <h4>ERROR!!! </h4>
                    Wrong Username or Password
                </div>
            </center>    
            <?php
        } else {
            $_SESSION["idUser"] = $reqt["idUser"];
            $_SESSION["username"] = $reqt["username"];
            $_SESSION["role"] = $reqt["role"];

            if ($_SESSION["role"] == "Administrator") {
                header("Location:indexAdmin.php");
            }
        }
    }
    ?>

</head>

<body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>                                    
                                <span class="red">Auto<span class="white" id="id-text2">Park</span></span>                                    
                            </h1>                                
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Enter Your login credentials
                                        </h4>

                                        <div class="space-6"></div>

                                        <form action="#" method="post">
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="username" class="form-control" placeholder="Username" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" name="password" class="form-control" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>

                                                <div class="space"></div>
                                                <center>
                                                    <div class="clearfix"> 
                                                        <button type="submit" name="conn" class="btn btn-lighter btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>
                                                </center>     
                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>

                                        <div class="social-or-login center">
                                            <span class="bigger-110">AutoPark Login</span>
                                        </div>

                                        <div class="space-6"></div>


                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix">
                                        <div style="text-align: center">
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                I forgot my password
                                            </a>
                                        </div>

                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->

                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="ace-icon fa fa-key"></i>
                                            Retrieve Password
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            Enter your email and to receive instructions
                                        </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" class="form-control" placeholder="Email" />
                                                        <i class="ace-icon fa fa-envelope"></i>
                                                    </span>
                                                </label>

                                                <div class="clearfix">
                                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                        <i class="ace-icon fa fa-lightbulb-o"></i>
                                                        <span class="bigger-110">Send Me!</span>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            Back to login
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.forgot-box -->

                        </div><!-- /.position-relative -->

                        <div class="navbar-fixed-top align-right">
                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">Dark</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">Blur</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">Light</a>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->


    <!-- <![endif]-->

    <!--[if IE]>
<script src="View/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement)
            document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function ($) {
            $(document).on('click', '.toolbar a[data-target]', function (e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible');//hide others
                $(target).addClass('visible');//show target
            });
        });



        //you don't need this, just used for changing background
        jQuery(function ($) {
            $('#btn-login-dark').on('click', function (e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-light').on('click', function (e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-blur').on('click', function (e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');
                e.preventDefault();
            });

        });
    </script>
</body>
</html>
<?php
if (isset($_GET["lock"])) {
    session_unset();
    session_destroy();
    header("Location:./");
    exit();
}
?>