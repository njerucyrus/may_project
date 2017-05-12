<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 7:23 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
$patients = \Hudutech\Controller\PatientController::showNotInQueue();
$counter = 1;
?>
<!DOCTYPE html>
<head>
    <?php include 'head_views.php' ?>
</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <div class="row">
            <div class="col col-md-12">
            <div class="container-fluid">
                <div class="form-horizontal" style="margin-bottom: 15px;">
                    <form>
                        <div class="form-inline">
                            <label for="patientNo">PatientNo</label>
                            <input type="text" id="patientNo" class="form-control" placeholder="Enter Patient Number" onkeyup="filterTable()">
                            <button class="btn btn-primary" onclick="filterTable()">Go</button>
                        </div>

                    </form>
                </div>
                <div class="table-responsive">
                    <div id="addNew" style="margin-bottom: 15px;" class="clearfix pull-left">
                        <button class="btn btn-primary" onclick="showAddNewModal()">Add New </button>
                    </div>
                    <table class="table table-stripped" id="visitTable">
                        <thead>
                        <tr class="bg-success">
                            <th>#</th>
                            <th>PatientNo</th>
                            <th>FullName</th>
                            <th>Phone Number</th>
                            <th>Sex</th>
                            <th colspan="1">Action</th>
                        </tr>
                        </thead>

                            <?php foreach ($patients as $patient): ?>
                            <tr>
                                <td><?php echo $counter++ ?></td>
                                <td><?php echo $patient['patientNo']?></td>
                                <td><?php echo $patient['surName']." ". $patient['firstName']. " ".$patient['otherName']; ?></td>
                                <td><?php echo $patient['phoneNumber']?></td>
                                <td><?php echo $patient['sex']?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="addToVisitList('<?php echo $patient['id']?>')">Add To VisitList</button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Add new patient Modal-->
<div class="modal fade" id="patientModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Register New Patient Here</h4>
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
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="otherName" class="control-label">Other Names</label>

                            <input type="text" class="form-control" id="otherName" placeholder="Other Names">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="patientNo" class="control-label">Patient Number</label>

                            <input type="text" class="form-control" id="patientNo" placeholder="Patient Number">
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="phoneNumber" class="control-label">PhoneNumber</label>

                            <input type="text" class="form-control" id="phoneNumber" placeholder="Your Mobile PhoneNumber">
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
                            <input type="text" id="occupation" class="form-control" placeholder="Your occupation">
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
<div class="modal fade" id="confirm-addVisit" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Confirm Action</h4>
                <div id="confirmFeedback">

                </div>
            </div>

            <div class="modal-body">
                <p style="font-size: 16px;"> Click Continue to add the patient to visit list.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id='btn-confirmAdd' class="btn btn-info" data-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
<!--end-->

<?php include 'footer_views.php'?>
<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        e.preventDefault();
        $('#AddNewModal').hide();
        filterTable();

    })
</script>

<script type="text/javascript">
    function filterTable() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("patientNo");
        filter = input.value.toUpperCase();
        table = document.getElementById("visitTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    $('#addNew').hide();
                } else {
                    tr[i].style.display = "none";
                    $('#addNew').show()
                }
            }
        }
    }

    function getModalData() {
        return {
            idNo:$('#idNo').val(),
            surName:$('#surName').val(),
            firstName: $('#firstName').val(),
            otherName: $('#otherName').val(),
            maritalStatus:$('#maritalStatus').val(),
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
            //console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        console.log(response.statusCode);
                        if(response.statusCode == 200){
                            $('#feedback').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                               location.reload();
                            }, 1000);
                        }
                        if (response.statusCode == 500){
                            $('#feedback').removeClass('alert alert-success')
                                .html('<div class="alert alert-danger alert-dismissable">'+
                            '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>'+
                            '<strong>Error! </strong> '+response.message+'</div>')

                        }
                    }

                }
            )
        })
    }

    function addToVisitList(id) {
        $('#confirm-addVisit').modal('show');
        $('#btn-confirmAdd').on('click', function (e) {
            e.preventDefault();
            var url = 'patient_visit_endpoint.php';
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify({'id':id}),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        if(response.statusCode == 200){
                            $('#confirmFeedback').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                        if (response.statusCode == 500){
                            $('#confirmFeedback').removeClass('alert alert-success')
                                .html('<div class="alert alert-danger alert-dismissable">'+
                                    '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>'+
                                    '<strong>Error! </strong> '+response.message+'</div>')

                        }
                    }
                }
            )
        })
    }
</script>
</body>
</html>