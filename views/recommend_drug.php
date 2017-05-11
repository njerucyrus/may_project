<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/10/17
 * Time: 8:13 PM
 */
$id = '';
if (isset($_GET['id'])){
    $_SESSION['patientId'] = $_GET['id'];
}
require_once __DIR__.'/../vendor/autoload.php';
$patient = \Hudutech\Controller\ClinicalNoteController::getPatientFromClinicalNotes($_SESSION['patientId']);

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
            <div class="col col-md-10">
                <div class="panel-body">
                    <div class="table-responsive">
                        <h3>Patient Info</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-success">
                                <th>PatientNo</th>
                                <th>Patient Name</th>
                                <th>Sex</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $patient['patientNo'] ?></td>
                                <td><?php echo $patient['surName']." ".$patient['firstName']." ".$patient['otherName']?></td>
                                <td><?php echo $patient['sex'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">
                            <div id="feedback">

                            </div>

                            <h3> Add Drugs</h3>

                        </div>


                    </div>

                    <div class="panel-body ">

                        <!--                   body content will start here-->



                            <form role="form" class="form-groups-bordered">
                                <div class="row  container-fluid">

                                    <input type="hidden" id="patientNoHidden" value="<?php echo $patient['patientNo']; ?>">
                                <div class="form-group col-xs-3 col-md-3" style="padding: 5px; margin: 5px;">
                                    <label for="drugName"style="padding-left: 10px;" class="control-label">Drug Name</label>


                                        <input type="text" class="form-control" id="drugName"  name="drugName" placeholder="Drug Name">

                                </div>
                                <div class="form-group col-xs-2 col-md-2" style="padding: 5px; margin: 5px;">
                                    <label for="type"style="padding-left: 10px;" class="control-label">Administration Type</label>


                                    <input type="text" class="form-control" name="drugType" id="drugType" placeholder="type">

                                </div>
                                <div class="form-group col-xs-1 col-md-1" style="padding: 5px; margin: 5px;">
                                    <label for="dosage"style="padding-left: 10px;" class="control-label">Dosage</label>


                                    <input type="text" class="form-control" name="quantity"id="quantity" placeholder="Dosage">

                                </div>
                                <div class="form-group col-xs-3 col-md-3" style=" display:table;padding: 5px; margin: 5px;">
                                   <label for="prescription"style=" width:100%; padding-right: 50%" class="control-label">Drug Prescription</label>

                                    <select style="width:40%" id="prescription1" class="form-control form-horizontal col-md-1" >
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

                                    <input type="text"  style="padding-top:10px; width:20%; font-size: xx-large;"class="form-control form-horizontal col-md-1" id="prescription2" placeholder=" * " disabled>


                                    <select style="width:40%" id="prescription3" class="form-control form-horizontal col-md-1" >
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

                                        <input value="Add" id="add" onclick="submitFormData()"  class="btn btn-green  btn-md" type="button">

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
<script>
    jQuery(document).ready(function (e) {
        e.preventDefault;


    })
</script>
<script>

    function getFormData() {
        return {

            patientId : $("#patientNoHidden").val(),
         drugName : $("#drugName").val(),
         drugType : $("#drugType").val(),
         quantity : $("#quantity").val(),
         prescription1 : $("#prescription1").val(),

         prescription3 : $("#prescription3").val(),

        }

    }
    function submitFormData() {

        var url = 'recommend_drug_endpoint.php';
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




</script>
</body>
</html>