<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/21/17
 * Time: 9:51 AM
 */
require_once __DIR__.'/../vendor/autoload.php';
$counter = 1;
$users = \Hudutech\Controller\UserController::all();
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
                    <div class="container-fluid" style="margin-top: 15px;">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="usersTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $counter++ ?></td>
                                        <td><?php echo $user['firstName'];?></td>
                                        <td><?php echo $user['lastName'];?></td>
                                        <td><?php echo $user['email'];?></td>
                                        <td><?php echo $user['username'];?></td>
                                        <td><?php echo $user['userLevel'];?></td>
                                        <td>
                                            <a href="change_password.php?username=<?php echo urlencode($user['username'])?>" class="btn btn-default"><i class="entypo-lock-open"></i>Change Password</a>
                                            <button class="btn btn-info"><i class="entypo-lock"></i> Deactivate Account</button>
                                            <button class="btn btn-danger btn-red">Delete Account</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
