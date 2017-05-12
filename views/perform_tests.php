<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/11/17
 * Time: 10:17 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';
$patientId = '';
if (isset($_POST['submit'])) {
    if (!empty($_POST['patientNo'])) {
        $_SESSION['patientNo'] = $_POST['patientNo'];

    }
}
$patientId = \Hudutech\Controller\PatientController::getPatientId($_SESSION['patientNo'])['id'];
$today = date('Y-m-d');
$patientTests = \Hudutech\Controller\PatientClinicalTestController::showClinicalTests($patientId, $today);
$counter = 1;
$patient = \Hudutech\Controller\PatientController::getPatientId($_SESSION['patientNo']);

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
                    <form class="form-inline" method="post"
                          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class="form-group">
                            <label for="patientNo" class="control-label">PatientNo</label>
                            <input type="text" id="patientNo" name="patientNo" class="form-control" required>
                        </div>
                        <input type="submit" name="submit" value="Show Tests" class="btn btn-primary btn-blue">

                    </form>
                </div>
            </div>
        </div>

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
                                <td style="color: #000000;"><?php echo $patient['surName'] . " " . $patient['firstName'] . " " . $patient['otherName'] ?></td>
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
                    <?php if (!empty($patientTests)) {
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
                                <? foreach ($patientTests as $patientTest): ?>
                                    <tr>
                                        <th><?php echo $counter++ ?></th>
                                        <th><?php echo $patientTest['testName'] ?></th>
                                        <th><?php echo $patientTest['testResult'] ?></th>
                                        <th>
                                            <?php
                                            if (is_null($patientTest['description'])) {
                                                echo "---";
                                            } else {
                                                echo $patientTest['description'];
                                            }
                                            ?>
                                        </th>
                                        <th><?php
                                            if ($patientTest['isPerformed'] == 0) {
                                                echo "<i class='entypo-cancel' style='color: red;'></i>";
                                            } elseif ($patientTest['isPerformed'] == 1) {
                                                echo "<i class='entypo-check' style='color: green;'></i>";
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            <button class="btn btn-success"
                                                    onclick="showModal('<?php echo $patientTest['patientTestId'] ?>', '<?php echo $patientTest['testName'] ?>')">
                                                <i class="entypo-pencil"></i>Fill In Results
                                            </button>
                                        </th>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <?php
                    } else {
                        echo "<h4> No Tests found!</h4>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--FILL IN RESULT MODAL-->
<div class="modal fade" id="testResultModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="testResultTitle">Record Clinical Test Results</h4>
                <div id="feedback"></div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="testName"> Recording Results For</label>
                            <input type="text" id="testName" class="form-control" disabled
                                   style="color: dodgerblue; font-size: 1.2em;">
                        </div>

                    </div>

                    <div class="col-sm-12">

                        <div class="form-group">
                            <input type="hidden" id="testId">
                            <label for="txtTestResult" class="control-label">Test Result</label>
                            <input type="text" class="form-control" name="txtTestResult" id="txtTestResult"
                                   placeholder="Enter Results Here..." required>
                        </div>
                    </div>

                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for="txtDescription" class="control-label">Extra Notes(Optional)</label>
                            <textarea id="txtDescription" class="form-control autogrow" style="text-align: start;"
                                      placeholder="some descriptions of the test..">
                            </textarea>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSubmitResult" class="btn btn-info" onclick="recordTestResult()">
                        Submit
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!--END -->
<?php include 'footer_views.php'?>
<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>

<script type="text/javascript">

    function getModalData() {
        return {
            id: $('#testId').val(),
            testResult: $('#txtTestResult').val(),
            description: $('#txtDescription').val()
        };
    }

    function showModal(id, testName) {
        jQuery('#testResultModal').modal('show');
        jQuery('#testName').val(testName);
        jQuery('#testId').val(id);
    }

    function recordTestResult() {
        var url = 'perform_test_endpoint.php';
        var data = getModalData();
        console.log(data);
        $.ajax(
            {
                type: 'PUT',
                url: url,
                data: JSON.stringify(data),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    if (response.statusCode == 201) {
                        console.log(response);
                        $('#feedback').removeClass('alert alert-danger')
                            .addClass('alert alert-success')
                            .text(response.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                    if (response.statusCode == 500) {
                        $('#feedback').removeClass('alert alert-success')
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
