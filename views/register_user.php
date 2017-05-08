<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */
?>
<!DOCTYPE>
<html>
<?php include 'head_views.php' ?>
<body class="page-body skin-facebook" data-url="http://neon.dev">
<div class="page-container">
    <?php include 'right_menu_views.php' ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Default Form Inputs
                    </div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered">

                        <div class="form-group">
                            <label for="firstName" class="col-sm-3 control-label">First Name</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="firstName" placeholder="firstName">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastName" class="col-sm-3 control-label">Last Name</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="lastName" placeholder="lastName">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-5">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userName" class="col-sm-3 control-label">UserName</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="userName" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select User Level</label>

                            <div class="col-sm-5">
                                <select id="userLevel" class="form-control">
                                    <option>admin</option>
                                    <option>manager</option>
                                    <option>receptionist</option>
                                    <option>doctor</option>
                                    <option>lab_technician</option>
                                    <option>pharmacist</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>

                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirmpassword" class="col-sm-3 control-label">Confirm Password</label>

                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                            </div>
                        </div>







                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-default">save</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>



<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!---->
<!--            <div class="panel panel-primary" data-collapsed="0">-->
<!---->
<!--                <div class="panel-heading">-->
<!--                    <div class="panel-title">-->
<!--                        Default Form Inputs-->
<!--                    </div>-->
<!---->
<!---->
<!--                </div>-->
<!---->
<!--                <div class="panel-body">-->
<!---->
<!--                    <form role="form" class="form-horizontal form-groups-bordered">-->
<!---->
<!---->
<!--                        <div class="panel-body">-->
<!--                            <form role="form" class="form-horizontal  form-groups-bordered">-->
<!--                                <div class="form-group col-sm-5">-->
<!--                                    <label for="field-1" class="col-sm-3 control-label">First Name</label>-->
<!---->
<!--                                    <div class="col-sm-5">-->
<!--                                        <input type="text" class="form-control" id="firstName" placeholder="firstName">-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="form-group">-->
<!--                                        <label for="field-2" class="col-sm-3 control-label">Last Name</label>-->
<!---->
<!--                                        <div class="col-sm-5">-->
<!--                                            <input type="text" class="form-control" id="lastName" placeholder="lastName">-->
<!--                                        </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!---->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--                        --><?php
//                        include 'footer_views.php';
//                        ?>
<!--                </div>-->
</body>
</html>
