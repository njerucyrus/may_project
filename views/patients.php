<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/14/17
 * Time: 9:03 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';

$patients = \Hudutech\Controller\PatientController::all();
$counter = 1;


if (isset($_POST['importSubmit'])) {

    $patientsArray = array();
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            fgetcsv($csvFile);

            //parse data from csv file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {

                array_push($patientsArray, array(
                    "patientNo" => $line[0],
                    "fullName" => $line[1],
                    "sex"=>strtoupper($line[2]),
                    "age"=>$line[3],
                    "location"=>$line['4'],
                    "patientType"=>"out_patient",
                ));
            }

            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else {
        $qstring = '?status=invalid_file';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'head_views.php' ?>
    <title>iClinic | Patients List</title>
</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php'; ?>
    <div class="main-content">
        <?php include 'header_menu_views.php' ?>
        <div class="panel panel-primary" data-collapsed="0">
            <div class="container-fluid">
                <div class="row" style="margin-top: 15px;">
                    <div class="row">
                        <div class="col col-md-4">
                            <form class="form-inline">
                                <label for="search" class="control-label">Search</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="search">
                            </form>
                        </div>
                    </div>
                    <div class="col col-md-12" style="margin: 15px;">
                        <div class="pull-right">
                            <form action="" method="post" enctype="multipart/form-data" id="importFrm"
                                  class="form-inline" style="margin-right: 25px;">
                                <input type="file" name="file" class="form-control"/>
                                <input type="submit" class="btn btn-success" name="importSubmit"
                                       value="import from excel">

                            </form>
                        </div>
                        <div>
                            <button class="btn btn-default" onclick="showAddNewModal()">Register
                                Single Patients
                            </button>
                        </div>

                    </div>
                </div>
                <div class="col col-md-12">
                    <div class="table-responsive" style="margin-top: 15px;">
                        <table class="table table-bordered">
                            <h3>Showing Registered Patients</h3>
                            <hr/>
                            <thead>
                            <tr class="bg-info">
                                <th>#</th>
                                <th style="color: black">PatientNumber</th>
                                <th style="color: black">FullName</th>
                                <th style="color: black">Gender</th>
                                <th style="color: black">Phone Number</th>
                                <th style="color: black">Date Registered</th>
                                <th style="color: black">Timestamp</th>
                                <th style="color: black">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($patients as $patient): ?>
                                <tr>
                                    <td><?php echo $counter++ ?></td>
                                    <td><?php echo $patient['patientNo'] ?></td>
                                    <td><?php echo $patient['surName'] . " " . $patient['firstName'] . " " . $patient['otherName']; ?></td>
                                    <td><?php echo $patient['sex'] ?></td>
                                    <td><?php echo $patient['phoneNumber'] ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($patient['dateRegistered'])); ?></td>
                                    <td><?php echo $patient['dateRegistered']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-blue"
                                                onclick="updatePatient(
                                                        '<?php echo $patient['id'] ?>',
                                                        '<?php echo $patient['surName'] ?>',
                                                        '<?php echo $patient['phoneNumber'] ?>',
                                                        '<?php echo $patient['patientType'] ?>',
                                                        '<?php echo $patient['sex'] ?>',
                                                        '<?php echo $patient['age'] ?>',
                                                        '<?php echo $patient['patientNo'] ?>'
                                                        )"><i class="entypo-pencil"></i>Edit
                                        </button>
                                        <button class="btn btn-danger  btn-red"
                                                onclick="deletePatient('<?php echo $patient['id'] ?>')"><i
                                                    class="entypo-cancel"></i>Delete
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
</div>
<div class="modal fade" id="patientModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title">Register New Patient Here</h4>
                <div id="feedback">
                </div>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="fullName" class="control-label">FullName</label>

                            <input type="text" class="form-control" id="fullName" placeholder="Your first name">
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="patientNumber" class="control-label">Patient Number</label>

                            <input type="text" class="form-control" id="patientNumber" placeholder="Patient Number ...">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="phoneNumber" class="control-label">PhoneNumber</label>

                            <input type="text" class="form-control" id="phoneNumber"
                                   placeholder="Your Mobile PhoneNumber ...">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sex" class="control-label">Gender</label>
                            <select id="sex" class="form-control">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="age" class="control-label">Age</label>
                            <input type="number" max="150" class="form-control" id="age" name="age">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="patientType" class="control-label">Patient Type</label>
                            <select id="patientType" class="form-control">
                                <option value="in_patient">IN-PATIENT</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-add" class="btn btn-info">Submit Details</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!--add to visit list modal-->
<!-- Modal 4 (Confirm)-->
<div class="modal fade" id="confirmDeleteModal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="confirmTitle">Confirm Action</h4>
                <div id="confirmFeedback">

                </div>
            </div>

            <div class="modal-body">
                <p style="font-size: 16px;"> Are you sure you want to delete patient?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id='btnConfirmDelete' class="btn btn-info">Continue</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end-->

<?php include "footer_views.php"; ?>
<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
<script>
    function getModalData() {
        return {
            fullName: $('#fullName').val(),
            phoneNumber: $('#phoneNumber').val(),
            patientType: $('#patientType').val(),
            sex: $('#sex').val(),
            age: $('#age').val(),
            patientNo: $('#patientNumber').val()
        }
    }
    function showAddNewModal() {
        $('#patientModal').modal('show');
        $('#btn-add').on('click', function (e) {
            e.preventDefault();
            var url = 'add_patient_endpoint.php';
            var data = getModalData();
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        console.log(response.statusCode);
                        if (response.statusCode == 200) {
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
                                    '<strong>Error! </strong> ' + response.message + '</div>')

                        }
                    }

                }
            )
        })
    }

    function updatePatient(id,
                           fullName,
                           phoneNumber,
                           patientType,
                           sex,
                           age,
                           patientNo) {


        $('#fullName').val(fullName);
        $('#phoneNumber').val(phoneNumber);
        $('#age').val(age);
        $('#patientType').attr('selected', true);
        $('#sex').val(sex);
        jQuery('#patientModal').modal('show');
        jQuery('#btn-add').text('Save Changes');
        jQuery('#title').text('UPDATE Patient Details');
        $('#patientNumber').val(patientNo);
        $('#btn-add').on('click', function (e) {
            e.preventDefault;
            var url = 'add_patient_endpoint.php';
            var data = getModalData();
            data['id'] = id;
            console.log(data);
            $.ajax(
                {
                    type: 'PUT',
                    url: url,
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        console.log(response);
                        if (response.statusCode == 201) {
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
                                    '<strong>Error! </strong> ' + response.message + '</div>')

                        }
                    }

                }
            )
        })
    }

    function deletePatient(id) {
        $('#confirmTitle').text('Delete Patient');
        $('#confirmDeleteModal').modal('show');
        var url = 'add_patient_endpoint.php';
        $('#btnConfirmDelete').on('click', function (e) {
            e.preventDefault;
            $.ajax(
                {
                    type: 'DELETE',
                    url: url,
                    data: JSON.stringify({'id': id}),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        if (response.statusCode == 204) {
                            $('#confirmFeedback').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                        if (response.statusCode == 500) {
                            $('#confirmFeedback').removeClass('alert alert-success')
                                .html('<div class="alert alert-danger alert-dismissable">' +
                                    '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>' +
                                    '<strong>Error! </strong> ' + response.message + '</div>')

                        }
                    }
                }
            )
        });
    }
</script>
</body>
</html>
