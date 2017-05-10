<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/9/17
 * Time: 10:59 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';

$clinicalTests = \Hudutech\Controller\ClinicalTestController::all();
$counter = 1;

?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'head_views.php' ?>
    <title>Clinical Tests</title>
</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <div class="row">
            <div class="col col-md-12">
                <div class="container-fluid" style="margin-top: 15px;">
                    <h5 class="center" style="font-size: 1.2em">Available Clinical Tests</h5>
                    <hr/>
                    <div class="col-md-10 table-responsive">
                        <div id="addNew" style="margin-bottom: 15px;" class="clearfix pull-left">
                            <button class="btn btn-primary btn-blue" onclick="showModal()">Add New</button>
                        </div>
                        <table class="table" id="visitTable">
                            <thead>
                            <tr class="bg-info">
                                <th>#</th>
                                <th>Test Name</th>
                                <th>Cost(Ksh)</th>
                                <th class="center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clinicalTests as $clinicalTest): ?>
                                <tr>
                                    <td><?php echo $counter++ ?></td>
                                    <td><?php echo $clinicalTest['testName'] ?></td>
                                    <td><?php echo $clinicalTest['cost'] ?></td>
                                    <td colspan="2">
                                        <button class="btn btn-default btn-sm btn-icon icon-left">
                                            <i class="entypo-pencil"></i>
                                            Edit
                                        </button>

                                        <button class="btn btn-danger btn-sm btn-icon icon-left ">
                                            <i class="entypo-cancel"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="testModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add NEW TESTS</h4>
                <div id="#feedbackMessage"></div>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="testName" class="control-label">Test Name</label>

                            <input type="text" class="form-control" id="testName" placeholder="Name of the test">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="testCost" class="control-label">Test Cost</label>

                            <input type="number" class="form-control" id="testCost"
                                   placeholder="Cost of the test in Ksh ..." required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-add" class="btn btn-info" onclick="addNewTest()">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <?php include 'footer_views.php' ?>
    <script>
        $(document).ready(function (e) {
            e.preventDefault;
        })
    </script>
    <script>
        function getModalData() {
            return {
                testName: $('#testName').val(),
                cost: $('#testCost').val()
            }
        }
        function showModal() {
            $('#testModal').modal('show');
        }
        function addNewTest() {
            var url = 'clinical_test_endpoint.php';
            var data = getModalData();
            console.log(data);
            console.log(url);
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function (response) {
                        if (response.status.toLowerCase() == "success") {
                            console.log(response);
                            $('#feedbackMessage').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                                location.reload();
                            }, 1000)
                        }
                        else if (response.statusCode == 500) {
                            $('#feedbackMessage').removeClass('alert alert-success')
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

