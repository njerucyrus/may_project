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
        <div class="col-md-10">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Default Form Inputs
                    </div>


                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered">


                        <div class="panel-body">
                            <form role="form" class="form-horizontal  form-groups-bordered">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Name</label>

                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="field-1" placeholder="Name">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </form>
                </div>
            </div>
        </div>
                        <?php
                        include 'footer_views.php';
                        ?>
                </div>
</body>
</html>
