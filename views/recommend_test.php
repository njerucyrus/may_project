<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/10/17
 * Time: 8:13 PM
 */
$id = '';
if (isset($_GET['id'])){
   $_SESSION['patientId'] = $_GET['id'];
}
require_once __DIR__.'/../vendor/autoload.php';
$tests = \Hudutech\Controller\ClinicalTestController::all();
$patient = \Hudutech\Controller\ClinicalNoteController::getPatientFromClinicalNotes($_SESSION['patientId']);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'head_views.php' ?>
</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <?php include 'header_menu_views.php' ?>
        <div class="row">
            <div class="col col-md-10">
                <div class="panel-body">
                <div class="table-responsive">
                    <h3>Patient Info</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-success">
                            <th>PatientNo</th>
                            <th>Patient Name</th>
                            <th>Sex</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $patient['patientNo'] ?></td>
                            <td><?php echo $patient['surName']." ".$patient['firstName']." ".$patient['otherName']?></td>
                            <td><?php echo $patient['sex'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <div class="container-fluid">
                    <div class="form-horizontal" style="margin-bottom: 15px;">
                        <form>
                            <div class="form-inline">
                             <label for="testName" class="control-label" style="font-size: 1.2em;">Select Test</label>
                             <select class="form-control" id="testName">
                                 <?php foreach ($tests as $test):?>
                                 <option value="<?php echo $test['id']?>"><?php echo $test['testName']." @Ksh ". $test['cost']?></option>
                                 <?php endforeach; ?>
                             </select>
                                <button class="btn btn-primary btn-blue"><i class="entypo-plus-circled"></i> AddTo Patient's Test</button>
                            </div>

                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h3>Recommended Clinical Tests</h3>
                        <table class="table table-stripped" id="visitTable">
                            <thead>
                            <tr class="bg-success">
                                <th>Test Name</th>
                                <th>Cost (Ksh)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

