<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/10/17
 * Time: 8:13 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'head_views.php' ?>
</head>
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
                                <th>Test Name</th>
                                <th>Cost (Ksh)</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

