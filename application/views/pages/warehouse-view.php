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
                <?php foreach($warehouses as $warehouse): ?>
                <tr>
                    <td>
                        <a href="<?php echo site_url('warehouses/edit/'.$warehouse['id']); ?>">Edit</a>
                    </td>
                    <!--<td><?php echo $warehouse['id']; ?></td>-->
                    <td><?php echo $warehouse['name']; ?></td>
                    <td><?php echo $warehouse['short_name']; ?></td>
                    <td><?php echo $warehouse['address']; ?></td>
                    <td><?php echo $warehouse['active_status']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
