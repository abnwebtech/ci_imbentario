<script>
$(function() {
$('#datatable-warehouses').DataTable();
});
</script>
<div class="row">
    <div class="col-sm-12" >
        <div class='box box-primary'>
            <div class='box-header'>
            <h3 class="box-title">List of Warehouse</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('warehouses/add'); ?>" class="btn btn-box-tool">
                        <i class="fa fa-plus"></i>
                        <span class="text-blue">Add New Warehouse</span>
                    </a> 
                </div> 
            </div>              
                <div class='box-body'>
                <div class='table-responsive'>
                <table  id="datatable-warehouses"  class='table table-bordered table-stripped table-hover'>
                    <thead>
                        <tr>
                            <th>ACTION</th>
                            <th>WAREHOUSE NAME</th>
                            <th>SHORT NAME</th>
                            <th>ADDRESS</th>
                            <th class="text-center">STATUS</th>
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
                            <td class="text-center"><?php echo $warehouse['status_label']; ?></td>
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
