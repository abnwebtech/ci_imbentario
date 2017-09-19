
<form class="form-horizontal" action="<?php echo site_url('warehouses/save'); ?>" method="post">

   <div class="form-group">
        <label class="control-label col-sm-3">Warehouse Name:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="name" value="<?php echo $warehouse['name']; ?>" placeholder="name">
            <div class="validation_error"><?php echo form_error('name'); ?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Short Name:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="short_name" value="<?php echo $warehouse['short_name']; ?>" placeholder="short_name">
            <div class="validation_error"><?php echo form_error('short_name'); ?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Address:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="address" value="<?php echo $warehouse['address']; ?>" placeholder="address">
            <div class="validation_error"><?php echo form_error('address'); ?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">&nbsp;</label>
        <div class="col-sm-7">
            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
        </div>
    </div>

   <input type="hidden" name="mode" value="edit">
   <input type="hidden" name="id" value="<?php echo $warehouse['id']; ?>">
   
</form>