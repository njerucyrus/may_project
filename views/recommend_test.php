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
$today = date('Y-m-d');
$patientTests = \Hudutech\Controller\PatientClinicalTestController::showClinicalTests($_SESSION['patientId'], $today);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'head_views.php' ?>
    <style>
        td, label, input, option{
            color: #000000;
            font-size: 1.4em;
        }
    </style>
</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <?php //include 'header_menu_views.php' ?>
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
                                <button id='addTestBtn'class="btn btn-primary btn-blue" onclick="addTest('<?php echo $patient['id']?>', event)"><i class="entypo-plus-circled"></i> AddTo Patient's Test</button>
                            </div>

                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive" id="recommendedTests">
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
                             <?php foreach ($patientTests as $patientTest): ?>
                              <tr>
                                  <td><?php echo $patientTest['testName'] ?></td>
                                  <td><?php echo $patientTest['cost'] ?></td>
                                  <td colspan="1">
                                      <button class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteRecommendedTest('<?php echo $patientTest['patientTestId']?>')">
                                          <i class="entypo-cancel"></i>
                                          Delete
                                      </button>
                                  </td>
                              </tr>
                            <?php endforeach;?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 (Confirm)-->
<div class="modal fade" id="confirmDeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Confirm Action</h4>
            </div>
            <div id="confirmFeedback">
            </div>
            <div class="modal-body">

                <p style="font-size: 16px;">Click Continue to delete</p>
            </div>
            <div class="modal-footer">
                <button type="button" id='btnConfirmDelete' class="btn btn-danger" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer_views.php'?>

<script>
    function addTest(patientId, event) {
        var testId = jQuery('#testName').val();
        var url = 'recommend_test_endpoint.php';
        var data = {testId: testId, patientId: patientId};
        event.preventDefault();
        jQuery.ajax(
            {
                type: 'POST',
                url: url,
                data: JSON.stringify(data),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    console.log(response);
                    if (response.statusCode == 200) {
                        jQuery('#feedback').removeClass('alert alert-danger')
                            .addClass('alert alert-success')
                            .text(response.message);
                        console.log(response);
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
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
    function deleteRecommendedTest(id) {
     jQuery('#confirmDeleteModal').modal('show');
     var url = 'recommend_test_endpoint.php';
     jQuery('#btnConfirmDelete').on('click', function () {
         jQuery.ajax({
             type: 'DELETE',
             url: url,
             data: JSON.stringify({id:id}),
             dataType: 'json',
             contentType: 'application/json; charset=utf-8',
             success: function (response) {
                 console.log(response);
                 if (response.statusCode == 204) {
                     jQuery('#feedback').removeClass('alert alert-danger')
                         .addClass('alert alert-success')
                         .text(response.message);
                     console.log(response);
                     setTimeout(function () {
                         window.location.reload();
                     }, 1000);
                 }
                 else if (response.statusCode == 500) {
                     jQuery('#feedback').removeClass('alert alert-success')
                         .html('<div class="alert alert-danger alert-dismissable">' +
                             '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>' +
                             '<strong>Error! </strong> ' + response.message + '</div>');
                 }

             }
         })
     })
    }


</script>
</body>
</html>

