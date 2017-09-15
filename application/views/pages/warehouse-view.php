<html>
<head>
<title>WAREHOUSES</title>
<link rel="stylesheet" href="<?php echo site_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
<script src="<?php echo site_url("assets/jquery-3.2.1.min.js"); ?>"></script>
<script src="<?php echo site_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        WAREHOUSE 
        <small>Data's of Warehouses</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

		<div class="row">
            <div class="col-lg-10" >
                <a class="btn btn-default" href="<?php echo site_url('warehouses/add'); ?>">ADD WAREHOUSE</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ACTION</th>
                            <!--<th>ID</th>-->
                            <th>WAREHOUSE NAME</th>
                            <th>SHORT NAME</th>
                            <th>ADDRESS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($warehouses as $warehouse): ?>
                        <tr>
                            <td>
                                <a href="<?php echo site_url('warehouses/edit/'.$warehouse['id']); ?>">Edit</a>
                            </td>
                            <!--<td><?php echo $warehouse['id']; ?></td>-->
                            <td><?php echo $warehouse['warehouse_name']; ?></td>
                            <td><?php echo $warehouse['short_name']; ?></td>
                            <td><?php echo $warehouse['address']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>