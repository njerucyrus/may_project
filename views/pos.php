<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 7:23 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';

$counter = 1;
?>
<!DOCTYPE html>
<head>
    <?php include 'head_views.php' ?>


</head>
<body class="page-body skin-facebook">
<div class="page-container">
    <?php include 'right_menu_views.php'; ?>
    <div class="main-content">
        <?php include 'header_menu_views.php' ?>
        <div class="row">

            <div class="col col-md-12">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="container-fluid">
                        <div class="form-horizontal" style="margin-bottom: 15px; padding: 10px;">
                            <form>
                                <div class="form-inline">
                                    <label for="patientNo">PatientNo</label>
                                    <input type="text" id="patientNo" class="form-control"
                                           placeholder="Enter Patient Number" onkeyup="filterTable()">
                                    <button class="btn btn-primary" onclick="filterTable()" style="margin: 5px;">Go
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="form-horizontal col-md-12" style="margin-bottom: 15px; padding: 10px;">
                            <form>
                                <div class="form-group col-md-4">
                                    <label for="patientName">Patient Name</label>
                                    <input type="text" id="patientName" class="form-control"
                                           value="John Mwangi" disabled>

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="patientName">Age</label>
                                    <input type="text" id="patientAge" class="form-control"
                                           value="35" disabled>

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="patientName">Location</label>
                                    <input type="text" id="patientName" class="form-control"
                                           value="Wambugu Farm" disabled>

                                </div>

                            </form>
                        </div>

                        <h3 style="margin-top: 15px;">Prescribed Drugs</h3>
                        <hr/>
                        <div class="table-responsive">

                            <table class="table table-stripped" id="visitTable">
                                <thead>
                                <tr class="bg-success">
                                    <th>#</th>
                                    <th>Drug Name</th>
                                    <th>Drug Type</th>
                                    <th>Quantity</th>
                                    <th>Prescription</th>
                                    <th>Status</th>
                                    <th colspan="1">Action</th>
                                </tr>
                                </thead>


                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="sellDrug" class="col-md-12">

        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Sell Drug</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->



                        <div class="form-group  col-md-5" style="padding: 5px; margin: 5px;">
                            <label for="supplier" style="padding-left: 10px;"
                                   class="control-label">Select Drug</label>

                            <select class="form-control" data-width="auto" >
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>


                        </div>

                        <div class="form-group  col-md-3" style="padding: 5px; margin: 5px;">
                            <label for="supplier" style="padding-left: 10px;"
                                   class="control-label">Quantity</label>

                            <input type="number" class="form-control" name="quantity" id="supplier"
                                   placeholder="Quantity">


                        </div>

                        <div class="form-group col-md-2" style="padding-top: 30px;">
                            <input value="Add to Cart" id="add" onclick="submitData()"
                                   class="btn btn-green btn-md control-label"
                                   type="button"/>
                        </div>




                        <!--                        body content will stop here-->
                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">


                            <h3>Cart</h3>
                        </div>


                    </div>

                    <div class="panel-body">

                        <!--                   body content will start here-->



                        <div class="table-responsive">

                            <table class="table table-stripped" id="visitTable">
                                <thead>
                                <tr class="bg-success">
                                    <th>#</th>
                                    <th>Drug Name</th>
                                    <th>Drug Type</th>
                                    <th>Quantity</th>
                                    <th>Prescription</th>
                                    <th>Status</th>
                                    <th colspan="1">Action</th>
                                </tr>
                                </thead>



                            </table>
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



                            </div>


                        </div>

                        <div class="panel-body">

                            <!--                   body content will start here-->




                            <div class="form-group  col-md-8" style="padding: 5px; margin: 5px;">
                                <label for="total" style="padding-left: 10px;"
                                       class="control-label">Total</label>


                                <div class="input-group">
                                    <span class="input-group-addon btn-success">KSH</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon btn-success">.00</span>
                                </div>

                            </div>


                            <div class="form-group  col-md-8" style="padding: 5px; margin: 5px;">
                                <label for="amountPaid" style="padding-left: 10px;"
                                       class="control-label">Amount Paid</label>


                                <div class="input-group">
                                    <span class="input-group-addon btn-success">KSH</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon btn-success">.00</span>
                                </div>

                            </div>

                            <div class="form-group  col-md-8" style="padding: 5px; margin: 5px;">
                                <label for="amountDue" style="padding-left: 10px;"
                                       class="control-label">Amount Due</label>


                                <div class="input-group">
                                    <span class="input-group-addon btn-success">KSH</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon btn-success">.00</span>
                                </div>

                            </div>
                            <div class="form-group col-md-8 col-md-offset-3" >
                                <input value="Check Out" id="checkOut" onclick="submitData()"
                                       class="btn btn-green btn-lg control-label"
                                       type="button"/>
                            </div>
                        <div>
                        </div>


                            <!--                        body content will stop here-->
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>

<?php include 'footer_views.php' ?>
<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>










</body>
</html>