<div class="row">
    <div class="col-lg-10" >
        <a class="btn btn-default" href="<?php echo site_url('warehouses/add'); ?>">ADD WAREHOUSE</a>
        <!--<?php dump($positions); ?>
        <?php echo $positions['modified']; ?>-->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ACTION</th>
                    <!--<th>ID</th>-->
                    <th>WAREHOUSE NAME</th>
                    <th>SHORT NAME</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($warehouses as $index => $warehouse): ?>
                <tr>
                    <td>
			            <a href="<?php echo site_url('warehouses/confirmation/edit/' . $warehouse['id']); ?>" data-toggle="modal" data-target="#modal-confirmation-<?php echo $index; ?>">
                            <i class="fa fa-pencil"></i>
                         	<span>Edit</span>
                        </a>
                        <a href="<?php echo site_url('warehouses/confirmation/' . $warehouse['status_url'] . '/' . $warehouse['id']); ?>" class="btn btn-link" data-toggle="modal" data-target="#modal-confirmation-<?php echo $index; ?>">
                                    <i class="fa <?php echo $warehouse['status_icon']; ?>"></i> <?php echo $warehouse['status_action']; ?>
                        </a>
                    </td>
                    <!--<td><?php echo $warehouse['id']; ?></td>-->
                    <td><?php echo $warehouse['name']; ?></td>
                    <td><?php echo $warehouse['short_name']; ?></td>
                    <td><?php echo $warehouse['address']; ?></td>
                    <td><?php echo $warehouse['status_label']; ?></td>
                </tr>
                            <div class="modal fade" id="modal-confirmation-<?php echo $index; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content"></div>
                                </div>
                            </div>
			
                <?php endforeach; ?>
                            <?php if (empty($warehouses)): ?>
                            <tr class="text-center">
                                <td colspan="3">-- NO RECORD FOUND --</td>
                            </tr>
                            <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>
