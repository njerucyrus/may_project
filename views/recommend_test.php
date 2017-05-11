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
        <hr>
        <div class="row">
            <div class="col col-md-10">
                <div class="panel-body">
                <div class="table-responsive">
                    <h3>Patient Info</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-success">
                            <th style="color: #000000;">PatientNo</th>
                            <th style="color: #000000;">Patient Name</th>
                            <th style="color: #000000;">Sex</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="color: #000000;"><?php echo $patient['patientNo'] ?></td>
                            <td style="color: #000000;"><?php echo $patient['surName']." ".$patient['firstName']." ".$patient['otherName']?></td>
                            <td style="color: #000000;"><?php echo $patient['sex'] ?></td>
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
                                <button class="btn btn-primary btn-blue" onclick="addTest('<?php echo $patient['id']?>')"><i class="entypo-plus-circled"></i> AddTo Patient's Test</button>
                            </div>

                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h3>Recommended Clinical Tests</h3>
                        <div id="feedback"></div>
                        <table class="table table-bordered" id="visitTable">
                            <thead>
                            <tr class="bg-success">
                                <th style="color: #000000;">Test Name</th>
                                <th style="color: #000000;">Cost (Ksh)</th>
                                <th style="color: #000000;">Action</th>
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

<?php include 'footer_views.php'?>
<script>
    jQuery(document).ready(function (e) {
       e.preventDefault();
    })
</script>
<script>
    function addTest(patientId) {
        var testId = jQuery('#testName').val();
        var url = 'recommend_test_endpoint.php';
        jQuery.ajax(
            {
                type: 'POST',
                url: url,
                data: JSON.stringify({'testId': testId, 'patientId': patientId}),
                contentType: 'application/json; charset=utf-8;',
                success : function (response) {
                    if (response.statusCode == 200){
                        jQuery('#feedback').removeClass('alert alert-danger')
                            .addClass('alert alert-success')
                            .text(response.message);
                        location.reload();
                    }
                    else if (response.statusCode == 500) {
                        jQuery('#feedback').removeClass('alert alert-success')
                            .html('<div class="alert alert-danger alert-dismissable">' +
                                '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>' +
                                '<strong>Error! </strong> ' + response.message + '</div>');

                    }
                }
            }
        )
    }
</script>
</body>
</html>

