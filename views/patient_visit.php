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
<?php include 'head_views.php' ?>
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
                                    <button class="btn btn-primary">Add To VisitList</button>
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

<!--- modal here-->

<div id="patientModal" class="modal fade modal-lg col-md-offset-2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register Patient Here</h4>
                <div id="feedback">

                </div>
            </div>
            <div class="modal-body">
                    <form role="form" class="form-horizontal form-groups-bordered">

                        <div class="form-group">
                            <label for="patientNumber" class="col-sm-3 control-label">Patient Number</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="patientNumber" name="patientNumber" placeholder="Patient Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="idNo" class="col-sm-3 control-label">ID Number</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="idNo" name="idNo" placeholder="ID number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="surName" class="col-sm-3 control-label">SurName</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="surName" name="surName" placeholder="surname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstName" class="col-sm-3 control-label">First Name</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="otherName" class="col-sm-3 control-label">Other Name</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="otherName" name="otherName" placeholder="Other Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber" class="col-sm-3 control-label">phoneNumber</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="occupation" class="col-sm-3 control-label">Occupation</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="sex">Select Sex</label>

                            <div class="col-sm-5">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Marital Status</label>

                            <div class="col-sm-5">
                                <select name="maritalStatus"  id='maritalStatus' class="form-control">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Patient Type</label>

                            <div class="col-sm-5">
                                <select name="patientType" id="patientType" class="form-control">
                                    <option value="in_patient">In-Patient</option>
                                    <option value="out_patient">Out-Patient</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">

                                <input type="submit" name="submit" id='btn-add'value="Register Patient" class="btn btn-primary btn-lg btn-block "/>
                            </div>
                        </div>

                    </form>

                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--modal end-->


<?php include 'footer_views.php'; ?>
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
                        console.log(response);
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
                                .addClass('alert alert-danger')
                                .text(response.message);
                        }
                    }

                }
            )
        })
    }
</script>
</body>
</html>