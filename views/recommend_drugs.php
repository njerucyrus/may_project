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


                            <h1>Drug Recommendation</h1>
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

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3> Add Drugs</h3>

                        </div>


                    </div>

                    <div class="panel-body ">

                        <!--                   body content will start here-->



                            <form role="form" class="form-groups-bordered">
                                <div class="row  container-fluid">


                                <div class="form-group col-xs-3 col-md-3" style="padding: 5px; margin: 5px;">
                                    <label for="drugName"style="padding-left: 10px;" class="control-label">Drug Name</label>


                                        <input type="text" class="form-control" id="drugName" placeholder="Drug Name">

                                </div>
                                <div class="form-group col-xs-2 col-md-2" style="padding: 5px; margin: 5px;">
                                    <label for="type"style="padding-left: 10px;" class="control-label">Administration Type</label>


                                    <input type="text" class="form-control" id="type" placeholder="type">

                                </div>
                                <div class="form-group col-xs-1 col-md-1" style="padding: 5px; margin: 5px;">
                                    <label for="dosage"style="padding-left: 10px;" class="control-label">Dosage</label>


                                    <input type="text" class="form-control" id="dosage" placeholder="Dosage">

                                </div>
                                <div class="form-group col-xs-3 col-md-3" style=" display:table;padding: 5px; margin: 5px;">
                                   <label for="prescription"style=" width:100%; padding-right: 50%" class="control-label">Drug Prescription</label>

                                    <select style="width:40%" class="form-control form-horizontal col-md-1" >
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>

                                    <input type="text"  style="padding-top:10px; width:20%; font-size: xx-large;"class="form-control form-horizontal col-md-1" id="drugName" placeholder="*" disabled>


                                    <select style="width:40%" class="form-control form-horizontal col-md-1" >
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>

                                </div>

                                    <div class="form-group col-xs-1 col-md-1" style="margin-top:30px; ">
                                        <!--    buttons-->

                                        <input value="Add" id="btn-add-recommend" onclick="submitFormData()"
                                               class="btn btn-green  btn-md" type="button">

                                    </div>


                                </div>



                            </form>


                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3> Prescribed Drugs</h3>

                        </div>


                    </div>

                    <div class="panel-body ">

                        <!--                   body content will start here-->






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
</body>
</html>