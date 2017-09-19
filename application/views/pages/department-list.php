<div class='row'>
    <div class='col-sm-12'>
        <div class='box box-primary'>
            <div class='box-header'>
                <h4 class='box-title'>Box Panel Title</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('departments/add_department'); ?>" class="btn btn-box-tool">
                        <i class="fa fa-plus"></i>
                        <span class="text-blue">Add New Department</span>
                    </a>
                </div>
            </div>
            <div class='box-body'>
                <p>Put some content here</p>
                <div class='table-responsive'>
                    <table class='table table-bordered table-stripped table-hover' id='datatable-test'>
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($departments as $index => $department): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('departments/confirmation/edit_department/' . $department['id']); ?>" data-toggle="modal" data-target="#modal-confirmation-<?php echo $index; ?>">
                                        <i class="fa fa-pencil"></i>
                                        <span>Edit</span>
                                    </a>
                                </td>
                                <td><?php echo $department['name']; ?></td>
                                <td><?php echo $department['description']; ?></td>
                                <td class="text-center"><?php echo $department['active_status_label']; ?></td>
                            </tr>

                            <div class="modal fade" id="modal-confirmation-<?php echo $index; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content"></div>
                                </div>
                            </div>

                            <?php endforeach; ?>
                            <?php if (empty($departments)): ?>
                            <tr class="text-center">
                                <td colspan="3">-- NO RECORD FOUND --</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>