<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */
require_once __DIR__.'/../vendor/autoload.php';
include  __DIR__.'/includes/register_patient.inc.php';
?>
<!DOCTYPE>
<html>
<?php include 'head_views.php' ?>
<body class="page-body skin-facebook" >
<div class="page-container">

    <?php include 'right_menu_views.php' ?>
    <div class="main-content">
        <?php include 'header_menu_views.php'?>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">

                            <?php
                            if(empty($success_msg) && !empty($error_msg)){
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $error_msg ?>
                                </div>
                                <?php
                            }
                            elseif(empty($error_msg) and !empty($success_msg)){
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $success_msg  ?>
                                </div>

                                <?php
                            }
                            else
                            {
                                echo "";
                            }
                            ?>
                            <h1>Register New Patient</h1>
                        </div>


                    </div>

                    <div class="panel-body">

                        <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

                            <div class="form-group">
                                <label for="patientNo" class="col-sm-3 control-label">Patient Number</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="patientNo" placeholder="patient Number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idNo" class="col-sm-3 control-label">ID Number</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="idNo" placeholder="ID number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="surName" class="col-sm-3 control-label">SurName</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="surName" placeholder="surName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label">First Name</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="firstName" placeholder="firstName">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="otherName" class="col-sm-3 control-label">Other Name</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="otherName" placeholder="otherName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phoneNumber" class="col-sm-3 control-label">phoneNumber</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phoneNumber" placeholder="phone Number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="oc" class="col-sm-3 control-label">Occupation</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select Sex</label>

                                <div class="col-sm-5">
                                    <select name="sex" class="form-control">
                                        <option>Ms</option>
                                        <option>F</option>



                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select Marital Status</label>

                                <div class="col-sm-5">
                                    <select name="maritalStatus" class="form-control">
                                        <option>single</option>
                                        <option>married</option>
                                        <option>complicated</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select Patient Type</label>

                                <div class="col-sm-5">
                                    <select name="patientType" class="form-control">
                                        <option>in_patient</option>
                                        <option>out_patient</option>



                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">

                                    <input type="submit" name="submit " value="Register Patient" class="btn btn-primary btn-lg btn-block "/>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include 'footer_views.php';?>
</body>
</html>
