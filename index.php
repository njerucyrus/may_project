<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 17:28
 */
require_once __DIR__ . '/vendor/autoload.php';
$patients = \Hudutech\Controller\PatientController::all();
$drugs = \Hudutech\Controller\DrugInventoryController::all();
$visitors = \Hudutech\Controller\PatientVisitController::all();

$patientCounter = 1;
$drugCounter = 1;
$visitCounter = 1;
foreach ($patients as $patient):
    $patientCounter++;
endforeach;

foreach ($drugs as $drug):
    $drugCounter++;
endforeach;

foreach ($visitors as $visit):
    $visitCounter++;
endforeach;

?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'views/head.php';
?>
<body class="page-body skin-facebook">

<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <?php
    include 'views/right_menu.php';
    ?>

    <div class="main-content">
        <?php include 'views/header_menu.php' ?>

        <hr/>


        <div class="row">
            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="24" data-postfix=""
                         data-duration="1500" data-delay="0">0
                    </div>

                    <h3>Hours</h3>
                    <p>Providing best services</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>


                    <h1 style="color: white">Date</h1>
                    <h2 style="color: white"><?php echo date("Y/m/d") ?></h2>
                </div>

            </div>

            <div class="clear visible-xs"></div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-aqua">
                    <div class="icon" style="padding-bottom: 40px;"><i class="fa fa-user-md"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $patientCounter; ?>" data-postfix=""
                         data-duration="1500" data-delay="1200">0
                    </div>

                    <h3>Registered Patients</h3>
                    <p>Patients registered in the system</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-blue">
                    <div class="icon" style="padding-bottom: 40px;"><i class="fa fa-ambulance"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $drugCounter; ?>" data-postfix=""
                         data-duration="1500" data-delay="1800">0
                    </div>

                    <h3>Drug Inventory</h3>
                    <p>Number of drugs registered</p>
                </div>

            </div>
        </div>

        <br/>

        <!--       down row start here-->

        <!--        down row stop here-->


        <br/>


        <br/>


        <!-- Footer -->
        <footer class="main" style="position: absolute; bottom: 0; ">

            &copy; 2017 <strong>Developed by</strong> <a href="http://hudutech.com" target="_blank">Hudutech
                Solutions</a>

        </footer>
    </div>





</div>


<!-- Imported styles on this page -->
<link rel="stylesheet" href="public/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="public/assets/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="public/assets/js/gsap/TweenMax.min.js"></script>
<script src="public/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="public/assets/js/bootstrap.js"></script>
<script src="public/assets/js/joinable.js"></script>
<script src="public/assets/js/resizeable.js"></script>
<script src="public/assets/js/neon-api.js"></script>
<script src="public/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="public/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="public/assets/js/jquery.sparkline.min.js"></script>
<script src="public/assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="public/assets/js/rickshaw/rickshaw.min.js"></script>
<script src="public/assets/js/raphael-min.js"></script>
<script src="public/assets/js/morris.min.js"></script>
<script src="public/assets/js/toastr.js"></script>
<script src="public/assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="public/assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="public/assets/js/neon-demo.js"></script>

</body>
</html>