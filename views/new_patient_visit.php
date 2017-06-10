<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/9/17
 * Time: 7:46 AM
 */
?>

<!DOCTYPE html>
<html>
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
                    <div class="row">
                        <div class="col col-md-10">
                            <div class="search-form-contaner container-fluid">
                                <fieldset>
                                    <legend>Search Patient</legend>
                                    <form class="form-group">
                                        <label for="search">PatientFinder</label>
                                        <input type="text" class="form-control"
                                               placeholder="Search Patient by name, patient number, location, id number or phone number..."
                                               style="height: 45px;border: #1dcaff; border-style:solid; font-size: 16px;"
                                       id="searchText" >
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div id="results">
                        <div class=" table-responsive container-fluid">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>Patient Number</th>
                                <th>Name</th>
                                <td>Location</td>
                                <td>Age</td>
                                <td>Action</td>
                                </thead>
                                <tbody id="resultsTable">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer_views.php"; ?>
<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
<script src="../public/assets/js/paginator/jquery.paginate.min.js"></script>
<script>
    $(document).ready(function (e) {
      e.preventDefault;
      $('#results').hide();
      search()
    });
</script>
<script>
function search() {
    $('#searchText').on('keyup', function () {


        var text =$(this).val();
        var url = 'new_patient_visit_endpoint.php?q='+text;
        $.ajax(
            {
                type: 'GET',
                url: url,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8;',
                success: function (response) {
                    //console.log(response);
                    if(response.statusCode == 200){
                        var data = response['data'];
                        var row = '';
                        for(var i=0; i<data.length; i++){
                           // console.log(data[i]['patientNo']);
                            row +='<tr>' +
                                '<td>'+data[i]['patientNo']+'</td>'+
                                '<td>'+data[i]['surName']+'</td>'+
                                '<td>'+data[i]['location']+'</td>'+
                                '<td>'+data[i]['age']+'</td>'+
                                '<td><button class="btn btn-primary btn-blue">Add To VisitList</button></td>'+
                                '</tr>';
                        }

                        $('#results').show();
                        $('#resultsTable').html(row);
                        console.log(row);
                    } else{
                        $('#results').hide();
                    }


                },
                error: function (e) {
                    console.log("error", e);
                }
            }
        )
    })

}
</script>
</body>
</html>
