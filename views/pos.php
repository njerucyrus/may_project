<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 7:23 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';

$patientId = '';
$counter = 1;
$prescriptions = [];
$patient = [];
if (isset($_POST['submit'])) {
    if (isset($_POST['patientNo'])) {
        if (!empty($_POST['patientNo'])) {
            $_SESSION['patientNo'] = $_POST['patientNo'];
            $idObj = \Hudutech\Controller\PatientController::getPatientId($_SESSION['patientNo']);
            if (!empty($idObj)) {
                $patientId = $idObj['id'];
            }
            $prescriptions = \Hudutech\Controller\DrugPrescriptionController::getPrescriptions($patientId);
            $patient = \Hudutech\Controller\PatientController::getPatientId($_SESSION['patientNo']);

            unset($_POST);
        } else {
            unset($_POST);
        }
    } else {
        unset($_POST);

    }
}
$drugs = \Hudutech\Controller\DrugInventoryController::all();

if (isset($_POST['btnAddCart'])) {
    if (!isset($_SESSION['cartData']) and !isset($_SESSION['cart'])) {

        $_SESSION['cartData'] = array();
        $_SESSION['cart'] = array();
    }
    if (isset($_POST['drug']) && isset($_POST['quantity'])) {

        if (!isset($_SESSION['receiptNo'])) {
            $receiptNo = \Hudutech\Controller\SalesController::generateReceiptNo();
            $_SESSION['receiptNo'] = $receiptNo;
        }

        $price = \Hudutech\Controller\DrugInventoryController::getPrice($_POST['drug'], $_POST['quantity']);

        $_SESSION['cartData']['patientId'] = $patient['id'];
        $_SESSION['cartData']['inventoryId'] = $_POST['drug'];
        $_SESSION['cartData']['qty'] = $_POST['quantity'];
        $_SESSION['cartData']['receiptNo'] = $_SESSION['receiptNo'];
        $_SESSION['cartData']['price'] = $price;
        $_SESSION['cartData']['datePurchased'] = date('Y-m-d');
        array_push($_SESSION['cart'], $_SESSION['cartData']);

    }
}
?>
<!DOCTYPE html>
<head>
    <?php include 'head_views.php' ?>
    <style>
        select {
            font-weight: bold;
        }
    </style>

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
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" METHOD="POST">
                                <div class="form-inline">
                                    <label for="patientNo">PatientNo</label>
                                    <input type="text" id="patientNo" name="patientNo" class="form-control"
                                           placeholder="Enter Patient Number">
                                    <input type="submit" name="submit" class="btn btn-primary btn-blue" value="Go">
                                </div>

                            </form>
                        </div>
                        <?php if (!empty($patient)) { ?>
                            <div class="form-horizontal col-md-12" style="margin-bottom: 15px; padding: 10px;">
                                <form>
                                    <div class="form-group col-md-4">
                                        <label for="patient_No">OutPatient Number</label>
                                        <input type="text" id="patient_No" class="form-control"
                                               value="<?php echo isset($patient['patientNo']) ? $patient['patientNo'] : ''; ?>"
                                               disabled>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="patientName">Patient Name</label>
                                        <input type="text" id="patientName" class="form-control"
                                               value="<?php echo isset($patient['surName']) ? $patient['surName'] : ''; ?>"
                                               disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="patientName">Age</label>
                                        <input type="text" id="patientAge" class="form-control"
                                               value="<?php echo isset($patient['age']) ? $patient['age'] : ''; ?>"
                                               disabled>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="patientName">Location</label>
                                        <input type="text" id="patientName" class="form-control"
                                               value="<?php echo isset($patient['location']) ? $patient['location'] : '' ?>"
                                               disabled>

                                    </div>

                                </form>
                            </div>
                            <?php
                        } else {
                            echo "No Patient Data found!";
                        }
                        ?>

                        <h3 style="margin-top: 15px;">Prescribed Drugs</h3>
                        <hr/>
                        <?php if (!empty($prescriptions)) {
                            ?>
                            <div class="table-responsive">

                                <table class="table table-stripped" id="prescriptionTable">
                                    <thead>
                                    <tr class="bg-success">
                                        <th>#</th>
                                        <th> Drug Name</th>
                                        <th> Drug Type</th>
                                        <th> Quantity</th>
                                        <th> Prescription</th>
                                        <th> Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($prescriptions as $presc): ?>
                                        <tr>
                                            <td><?php echo $counter++ ?></td>
                                            <td><?php echo $presc['drugName'] ?></td>
                                            <td><?php echo $presc['drugType'] ?></td>
                                            <td><?php echo $presc['quantity'] ?></td>
                                            <td><?php echo $presc['prescription'] ?></td>
                                            <td><?php echo $presc['status'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <?php

                        } else {
                            echo "No Drug Prescriptions Found!";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <div id="sellDrug" class="col-md-12">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary" data-collapsed="0">

                        <div class="panel-heading">
                            <div class="panel-title col-md-offset-3">


                                <h3>Sell Drug</h3>
                            </div>


                        </div>

                        <div class="panel-body">

                            <!--                   body content will start here-->

                            <form name="cartForm" id="cartForm"
                                  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <div class="form-group  col-md-5" style="padding: 5px; margin: 5px;">
                                    <label for="drug" style="padding-left: 10px;"
                                           class="control-label">Select Drug</label>

                                    <select class="form-control" name="drug" id="drug" data-width="auto">
                                        <?php foreach ($drugs as $drug): ?>
                                            <option value="<?php echo $drug['id'] ?>"><?php echo $drug['productName'] . " |QtyLeft[" . $drug['qtyInStock'] . "]"; ?></option>
                                        <?php endforeach; ?>

                                    </select>


                                </div>

                                <div class="form-group  col-md-3" style="padding: 5px; margin: 5px;">
                                    <label for="supplier" style="padding-left: 10px;"
                                           class="control-label">Quantity</label>

                                    <input type="number" class="form-control" name="quantity" id="supplier"
                                           placeholder="Quantity">


                                </div>

                                <div class="form-group col-md-2" style="padding-top: 30px;">
                                    <input type="submit" name="btnAddCart" value="Add to Cart"
                                           class="btn btn-green btn-md control-label"/>
                                </div>
                            </form>

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
                            <div class="form-group col-md-8 col-md-offset-3">
                                <input type="submit" value="Check Out" id="checkOut"
                                       class="btn btn-green btn-lg control-label"
                                />
                            </div>
                            <div>
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
                                        <th>Quantity</th>
                                        <th colspan="1">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($_SESSION['cart'] as $cartItem): ?>
                                        <tr>
                                            <td><?php echo $counter++ ?></td>
                                            <td><?php echo $cartItem['inventoryId'] ?></td>
                                            <td><?php echo $cartItem['qty'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>


                                </table>
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