<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/11/17
 * Time: 10:17 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';
if (!empty($_POST['patientNo'])){
    $patientId = \Hudutech\Controller\PatientController::getPatientId($_POST['patientNo'])['id'];
    $today = date('Y-m-d');
    $patientTests = \Hudutech\Controller\PatientClinicalTestController::showClinicalTests($patientId, $today);
    $counter = 1;
}



?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'head_views.php' ?>
    <style>
        td, th, label, input, option {
            color: #000000;
            font-size: 1.4em;
        }
    </style>
</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <?php include 'header_menu_views.php' ?>
        <hr>
        <div class="row">
            <div class="col col-md-10">
                <div class="panel-body">
                    <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <div class="form-group">
                            <label for="patientNo" class="control-label">PatientNo</label>
                            <input type="text" id="patientNo" name="patientNo" class="form-control">
                        </div>
                        <input type="submit" name="submit" value="Show Tests" class="btn btn-primary btn-blue">

                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <div class="container-fluid">
                    <?php if(!empty($patientTests)) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TestName</th>
                                        <th>Result</th>
                                        <th>Extra Notes</th>
                                        <th>Completed</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?foreach ($patientTests as $patientTest):?>
                                 <tr>
                                     <th><?php echo $counter++?></th>
                                     <th><?php echo $patientTest['testName']?></th>
                                     <th><?php echo $patientTest['testResult']?></th>
                                     <th><?php echo $patientTest['description']?></th>
                                     <th><?php
                                          if ($patientTest['isPerformed'] == 0) {
                                              echo"<i class='entypo-cancel' style='color: red;'></i>";
                                          }elseif($patientTest['isPerformed'] ==1){
                                              echo "<i class='entypo-check' style='color: green;'></i>";
                                          }
                                         ?>
                                     </th>
                                     <th>
                                         <button class="btn btn-success"><i class="entypo-check"></i>Fill In Results</button>
                                         <button class="btn btn-primary btn-blue"><i class="entypo-pencil"></i>Edit Results</button>
                                     </th>
                                 </tr>
                            <?php endforeach;?>
                                </tbody>

                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include 'footer_views.php' ?>
</body>
</html>
