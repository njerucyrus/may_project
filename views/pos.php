<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 7:23 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';
$patients = \Hudutech\Controller\PatientController::showNotInQueue();
$counter = 1;
?>
<!DOCTYPE html>
<head>
    <?php include 'head_views.php' ?>


</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php'; ?>
    <div class="main-content">
        <?php include 'header_menu_views.php' ?>
        <div class="row">

            <div class="col col-md-12">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="container-fluid">
                        <div class="form-horizontal" style="margin-bottom: 15px; padding: 10px;">
                            <form>
                                <div class="form-inline">
                                    <label for="patientNo">PatientNo</label>
                                    <input type="text" id="patientNo" class="form-control"
                                           placeholder="Enter Patient Number" onkeyup="filterTable()">
                                    <button class="btn btn-primary" onclick="filterTable()" style="margin: 5px;">Go
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="form-horizontal col-md-12" style="margin-bottom: 15px; padding: 10px;">
                            <form>
                                <div class="form-group col-md-4">
                                    <label for="patientName">Patient Name</label>
                                    <input type="text" id="patientName" class="form-control"
                                           value="John Mwangi" disabled>

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="patientName">Age</label>
                                    <input type="text" id="patientAge" class="form-control"
                                           value="35" disabled>

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="patientName">Location</label>
                                    <input type="text" id="patientName" class="form-control"
                                           value="Wambugu Farm" disabled>

                                </div>

                            </form>
                        </div>

                        <h3 style="margin-top: 15px;">Prescribed Drugs</h3>
                        <hr/>
                        <div class="table-responsive">

                            <table class="table table-stripped" id="visitTable">
                                <thead>
                                <tr class="bg-success">
                                    <th>#</th>
                                    <th>Drug Name</th>
                                    <th>Drug Type</th>
                                    <th>Quantity</th>
                                    <th>Prescription</th>
                                    <th>Status</th>
                                    <th colspan="1">Action</th>
                                </tr>
                                </thead>

                                <?php foreach ($patients as $patient): ?>
                                    <tr>
                                        <td><?php echo $counter++ ?></td>
                                        <td><?php echo $patient['patientNo'] ?></td>
                                        <td><?php echo $patient['surName'] . " " . $patient['firstName'] . " " . $patient['otherName']; ?></td>
                                        <td><?php echo $patient['phoneNumber'] ?></td>
                                        <td><?php echo $patient['sex'] ?></td>
                                        <td>
                                            <button class="btn btn-primary"
                                                    onclick="addToVisitList('<?php echo $patient['id'] ?>')">Add To
                                                VisitList
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Sell Drug</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->



                        <div class="form-group  col-md-4" style="padding: 5px; margin: 5px;">
                            <label for="supplier" style="padding-left: 10px;"
                                   class="control-label">Select Drug</label>

                            <select class="form-control" data-width="auto" >
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>


                        </div>

                        <div class="form-group  col-md-3" style="padding: 5px; margin: 5px;">
                            <label for="supplier" style="padding-left: 10px;"
                                   class="control-label">Quantity</label>

                            <input type="number" class="form-control" name="quantity" id="supplier"
                                   placeholder="Quantity">


                        </div>

                        <input value="Add Product" id="add" onclick="submitData()"
                               class="btn btn-green btn-md control-label"
                               type="button"/>




                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>

<?php include 'footer_views.php' ?>
<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="../public/assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="../public/assets/js/neon-demo.js"></script>

<script type="text/javascript">
    $('select').select2();
</script>
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

    function addToVisitList(id) {
        $('#confirm-addVisit').modal('show');
        $('#btn-confirmAdd').on('click', function () {
            var url = 'patient_visit_endpoint.php';
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify({'id': id}),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        if (response.statusCode == 200) {
                            console.log(response);
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
        })
    }
</script>

</body>
</html>