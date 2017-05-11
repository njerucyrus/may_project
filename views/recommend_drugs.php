<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 10/05/2017
 * Time: 19:56
 */


?>
<!DOCTYPE html>
<html>
<?php include 'head_views.php'?>
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


                            <h1>Drug Prescription</h1>
                            <div id="feedback">

                            </div>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->

                        <form role="form" class="form-horizontal form-groups-bordered">
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="patientNo" onkeyup="filterTable()" placeholder="Patient Number">

                                    <span class="input-group-btn">
											<button class="btn btn-primary" onclick="filterTable()" type="button">Search</button>
										</span>
                                </div>
                            </div>

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
    </div>
</div>


</body>
</html>