<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 7:23 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
$patients = \Hudutech\Controller\PatientController::showNotInQueue();
$counter = 1;

?>
<!DOCTYPE html>
<?php include 'head_views.php' ?>
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
                        <button class="btn btn-primary">Add New </button>
                    </div>
                    <table class="table table-stripped" id="visitTable">
                        <thead>
                        <tr class="bg-success">
                            <th>#</th>
                            <th>PatientNo</th>
                            <th>FullName</th>
                            <th>Phone Number</th>
                            <th>Sex</th>
                            <th colspan="1">Action</th>
                        </tr>
                        </thead>
                        <tr>
                            <?php foreach ($patients as $patient): ?>
                            <td><?php echo $counter++ ?></td>
                            <td><?php echo $patient['patientNo']?></td>
                            <td><?php echo $patient['sirName']." ". $patient['firstName']. " ".$patient['otherName']; ?></td>
                            <td><?php echo $patient['phoneNumber']?></td>
                            <td><?php echo $patient['sex']?></td>
                            <td>
                                <button class="btn btn-primary">Add To VisitList</button>
                            </td>
                            <?php endforeach;?>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php include 'footer_views.php'; ?>
<script type="text/javascript">
    $(document).ready(function (e) {
        e.preventDefault;
        $('#addNew').hide();
    })
</script>

<script type="text/javascript">
    function filterTable() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("patientNo");
        filter = input.value.toUpperCase();
        table = document.getElementById("visitTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    $('#addNew').hide();
                } else {
                    tr[i].style.display = "none";
                    $('#addNew').show()
                }
            }
        }
    }
</script>
</body>
</html>