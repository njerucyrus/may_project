<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/html">
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
                            <h1>Consultation Panel</h1>
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
                                        <td><input type="button" value="Add Clinical Notes" class="btn-primary form-controls"/></td>

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
                                <textarea class="form-control autogrow" id="field-ta" placeholder="Enter patients current complaints"></textarea>
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
                                <textarea class="form-control autogrow" id="field-ta" placeholder="Enter patients current history"></textarea>
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
                                <textarea class="form-control autogrow" id="field-ta" placeholder="Enter patients family social history"></textarea>
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
                                <textarea class="form-control autogrow" id="field-ta" placeholder="Enter patients physical Examination"></textarea>
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
                            <input value="Submit and recommend Drugs" class="btn btn-green  btn-lg"type="button" >

                        </div>
                        <div  class="col-md-3 col-md-offset-2">
                            <!--    buttons-->

                            <input value="Submit and recommend Lab Test" class="btn btn-blue   btn-lg" type="button" />
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
</body>
</html>
