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
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'head_views.php' ?>
    <title>iClinic | Patients List</title>
    <style>
        th, td, label, thead {
            color: #000000;
        }
    </style>
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
                        <div class="col col-md-6">
                            <form class="form-inline">
                                <label for="search" class="control-label">Search</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="search">
                                <input type="submit" class="btn btn-default" style="padding: 10px; color: black;"
                                       value="Search Patient">
                            </form>
                        </div>
                        <div class="col col-md-6">
                            <button class="btn btn-default" onclick="showAddNewModal()" style="padding: 10px;">Register
                                Single Patients
                            </button>
                            <button class="btn btn-success" style="padding: 10px;"><i class="entypo-attach"></i>Upload
                                From Excel
                            </button>
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
                                    <th style="color: black">ID Number</th>
                                    <th style="color: black">Sex</th>
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
                                        <td><?php echo $patient['idNo'] ?></td>
                                        <td><?php echo $patient['sex'] ?></td>
                                        <td><?php echo $patient['phoneNumber'] ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($patient['dateRegistered'])); ?></td>
                                        <td><?php echo $patient['dateRegistered']; ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-blue"
                                                    onclick="updatePatient(
                                                    '<?php echo $patient['id'] ?>',
                                                    '<?php echo $patient['idNo'] ?>',
                                                    '<?php echo $patient['surName'] ?>',
                                                    '<?php echo $patient['firstName'] ?>',
                                                    '<?php echo $patient['otherName'] ?>',
                                                    '<?php echo $patient['maritalStatus'] ?>',
                                                    '<?php echo $patient['phoneNumber'] ?>',
                                                    '<?php echo $patient['occupation'] ?>',
                                                    '<?php echo $patient['patientType'] ?>',
                                                    '<?php echo $patient['sex'] ?>',
                                                    '<?php echo $patient['patientNo'] ?>'
                                                    )"><i class="entypo-pencil"></i>Edit
                                            </button>
                                            <button class="btn btn-danger  btn-red" onclick="deletePatient('<?php echo $patient['id']?>')"><i class="entypo-cancel"></i>Delete
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
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="surName" class="control-label">Surname</label>

                            <input type="text" class="form-control" id="surName" placeholder="Your Surname">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="firstName" class="control-label">First Name</label>

                            <input type="text" class="form-control" id="firstName" placeholder="Your first name">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="otherName" class="control-label">Other Names</label>

                            <input type="text" class="form-control" id="otherName" placeholder="Other Names ...">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="idNo" class="control-label">ID Number</label>

                            <input type="text" class="form-control" id="idNo" placeholder="Your National id Number...">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="patientNumber" class="control-label">Patient Number</label>

                            <input type="text" class="form-control" id="patientNumber" placeholder="Patient Number ...">
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="phoneNumber" class="control-label">PhoneNumber</label>

                            <input type="text" class="form-control" id="phoneNumber"
                                   placeholder="Your Mobile PhoneNumber ...">
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="maritalStatus" class="control-label">Marital Status</label>
                            <select id="maritalStatus" class="form-control">
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="occupation" class="control-label">Occupation</label>
                            <input type="text" id="occupation" class="form-control" placeholder="Your occupation ...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sex" class="control-label">Sex</label>
                            <select id="sex" class="form-control">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="patientType" class="control-label">Patient Type</label>
                            <select id="patientType" class="form-control">
                                <option value="in_patient">IN-PATIENT</option>
                                <option value="out_patient">OUT-PATIENT</option>
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
            idNo: $('#idNo').val(),
            surName: $('#surName').val(),
            firstName: $('#firstName').val(),
            otherName: $('#otherName').val(),
            maritalStatus: $('#maritalStatus').val(),
            phoneNumber: $('#phoneNumber').val(),
            occupation: $('#occupation').val(),
            patientType: $('#patientType').val(),
            sex: $('#sex').val(),
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
                           idNo,
                           surName,
                           firstName,
                           otherName,
                           maritalStatus,
                           phoneNumber,
                           occupation,
                           patientType,
                           sex,
                           patientNo) {

        $('#idNo').val(idNo);
        $('#surName').val(surName);
        $('#firstName').val(firstName);
        $('#otherName').val(otherName);
        $('#maritalStatus').val(maritalStatus);
        $('#phoneNumber').val(phoneNumber);
        $('#occupation').val(occupation);
        $('#patientType').val(patientType);
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
            $.ajax(
                {
                    type: 'PUT',
                    url: url,
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        console.log(response.statusCode);
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
                           $('#confirmfeedback').removeClass('alert alert-danger')
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
