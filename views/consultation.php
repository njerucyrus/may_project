<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */
require __DIR__.'/../vendor/autoload.php';
$queuePatients= \Hudutech\Controller\PatientController::showInQueue();
$counter=1;

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<?php include 'head_views.php' ?>
<body class="page-body skin-facebook">
<div class="page-container">

    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <?php include 'header_menu_views.php' ?>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h1>Consultation Panel</h1>
                            <div id="feedback">

                            </div>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->
                        <form role="form" class="form-horizontal form-groups-bordered">


                            <div class="col-md-10">

                                <h4>Patient Details</h4>

                                <table class="table table-condensed table-bordered " id="queueTable">
                                    <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Patient Number</th>
                                        <th>Name</th>
                                        <th>Occupation</th>
                                        <th>Marital Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($queuePatients as $queuePatient ): ?>
                                    <tr>

                                        <td><?php echo $counter++?></td>
                                        <td><?php echo $queuePatient['patientNo'] ?></td>
                                        <td><?php echo $queuePatient['surName']." ".$queuePatient['firstName']." ".$queuePatient['otherName'] ;  ?></td>
                                        <td><?php echo $queuePatient['occupation'] ?></td>
                                        <td><?php echo $queuePatient['maritalStatus'] ?></td>
                                        <td><input type="button" value="Add Clinical Notes" onclick="showClinicalNotesForms('<?php echo $queuePatient['id']?>', '<?php echo $queuePatient['patientNo']?>')"
                                                   class="form-controls btn btn-blue  btn-md"/></td>

                                    </tr>
                                    <?php endforeach; ?>


                                    </tbody>
                                </table>

                            </div>

                        </form>

                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
        </div>
<div id="clinicalNotesForms" class="col-md-12">
        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Current Complaints</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->
                        <div class="form-group">


                            <div class="col-sm-12">
                                <input type="hidden" id="patientNoHidden">
                                <textarea class="form-control autogrow" id="complaint" name="complaint"
                                          placeholder="Enter patients current complaints"></textarea>
                            </div>
                        </div>


                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Current History</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->
                        <div class="form-group">


                            <div class="col-sm-12">
                                <textarea class="form-control autogrow" id="complaintHistory" name="complaintHistory"
                                          placeholder="Enter patients complaint history"></textarea>
                            </div>
                        </div>


                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Family Social History</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->
                        <div class="form-group">


                            <div class="col-sm-12">
                                <textarea class="form-control autogrow" id="familySocialHistory"
                                          name="familySocialHistory"
                                          placeholder="Enter patients family social history"></textarea>
                            </div>
                        </div>


                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Physical Examination</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->
                        <div class="form-group">


                            <div class="col-sm-12">
                                <textarea class="form-control autogrow" id="physicalExamination"
                                          name="physicalExamination"
                                          placeholder="Enter patients physical Examination"></textarea>
                            </div>
                        </div>


                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">


                    <div class="panel-body ">

                        <!--                   body content will start here-->

                        <div class="col-md-3 col-md-offset-2">
                            <!--    buttons-->

                            <button id="btn-add-test" class="btn btn-green   btn-lg" onclick="submitRecommendDrug()">Submit and recommend Drugs</button>


                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <!--    buttons-->

                            <button id="btn-add-test" class="btn btn-blue   btn-lg" onclick="submitRecommendTest()">Submit and recommend Lab Test</button>
                        </div>

                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>

        </div>
</div>
    </div>


    <?php
    include 'footer_views.php';
    ?>
    <script>
        jQuery(document).ready(function (e) {
            e.preventDefault;
           hideClinicalNotesForms();

        })
    </script>
    <script>
        function hideClinicalNotesForms ()
        {
            jQuery('#clinicalNotesForms').hide();
        }

        function showClinicalNotesForms (patientId,patientNo) {

            jQuery('#clinicalNotesForms').show();
            jQuery('#patientNoHidden').val(patientId) ;
            showFilterTable(patientNo);


        }


        function showFilterTable(patientNo) {
            // Declare variables
            var  filter, table, tr, td, i;

            filter = patientNo.toUpperCase();
            table = document.getElementById("queueTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";

                    } else {
                        tr[i].style.display = "none";

                    }
                }
            }
        }

        function filterTable() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("patientNo");
            filter = input.value.toUpperCase();
            table = document.getElementById("queueTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        hideClinicalNotesForms();
                    } else {
                        tr[i].style.display = "none";
                        hideClinicalNotesForms();
                    }
                }
            }
        }




        function getFormData() {
            return {
                 patientId:$('#patientNoHidden').val(),
                complaint: $('#complaint').val(),
                complaintHistory: $('#complaintHistory').val(),
                familySocialHistory: $('#familySocialHistory').val(),
                physicalExamination: $('#physicalExamination').val(),
            }

        }
        function submitFormData() {

                var url = 'consultation_endpoint.php';
                var data = getFormData();
                console.log(data);
                $.ajax(
                    {
                        type: 'POST',
                        url: url,
                        data: JSON.stringify(data),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function (response) {
                            console.log(response);
                            if (response.statusCode == 200) {
                                $('#feedback').removeClass('alert alert-danger')
                                    .addClass('alert alert-success')
                                    .text(response.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                                jQuery('#patientNoHidden').val('') ;
                            }
                            if (response.statusCode == 500) {
                                $('#feedback').removeClass('alert alert-success')
                                    .addClass('alert alert-danger')
                                    .text(response.message);
                                jQuery('#patientNoHidden').val('') ;
                            }
                        }

                    }
                )

        }

        function submitRecommendTest() {
            var url = 'consultation_endpoint.php';
            var data = getFormData();
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        console.log(response);
                        if (response.statusCode == 200) {
                            $('#feedback').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                            var  patientId = jQuery('#patientNoHidden').val();
                            window.location.href = 'recommend_test.php?id='+patientId;
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
        function submitRecommendDrug() {
            var url = 'consultation_endpoint.php';
            var data = getFormData();
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url: url,
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        console.log(response);
                        if (response.statusCode == 200) {
                            $('#feedback').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                            var  patientId = jQuery('#patientNoHidden').val();
                            window.location.href = 'recommend_drug.php?id='+patientId;
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
