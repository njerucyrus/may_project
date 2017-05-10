<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */

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
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Patient Number">

                                    <span class="input-group-btn">
											<button class="btn btn-primary" type="button">Search</button>
										</span>
                                </div>
                            </div>

                            <div class="col-md-10">

                                <h4>Patient Details</h4>

                                <table class="table table-condensed table-bordered ">
                                    <thead>
                                    <tr>

                                        <th>Patient Number</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Occupation</th>
                                        <th>Marital Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>

                                        <td>Arlind</td>
                                        <td>Nushi</td>
                                        <td>Arlind</td>
                                        <td>Nushi</td>
                                        <td>Arlind</td>
                                        <td><input type="button" value="Add Clinical Notes"
                                                   class="btn-primary form-controls"/></td>

                                    </tr>


                                    </tbody>
                                </table>

                            </div>

                        </form>

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


                            <h3>Current Complaints</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->
                        <div class="form-group">


                            <div class="col-sm-12">
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
                            <input value="Submit and recommend Drugs" id="btn-add-recommend" onclick="submitFormData()"
                                   class="btn btn-green  btn-lg" type="button">

                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <!--    buttons-->

                            <input value="Submit and recommend Lab Test" id="btn-add-test" class="btn btn-blue   btn-lg"
                                   type="button"/>
                        </div>

                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>

        </div>

    </div>


    <?php
    include 'footer_views.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function (e) {
            e.preventDefault();

        })
    </script>
    <script>
        function getFormData() {
            return {
//    patientId:$('#patientId').val(),
                patientId: 2883,
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
                            }
                            if (response.statusCode == 500) {
                                $('#feedback').removeClass('alert alert-success')
                                    .addClass('alert alert-danger')
                                    .text(response.message);
                            }
                        }

                    }
                )

        }
    </script>
</body>
</html>
