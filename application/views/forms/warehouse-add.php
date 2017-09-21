
<form class="form-horizontal" action="<?php echo site_url('warehouses/save'); ?>" method="post">
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Site</label>
        <div class="col-sm-6">
            <select class="form-control" name="site_id" id="site_id">
                <option value="">SELECT SITE</option>
                <?php foreach($sites as $index => $site): ?>
                <option value="<?php echo $site['id']; ?>"><?php echo $site['name']; ?></option>
                <?php endforeach; ?>              
            </select>
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-3">Warehouse Name:</label>
        <div class="col-sm-8">
            <input class='form-control' type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="name">
            <div class="validation_error"><?php echo form_error('name'); ?></div>
        </div>
    </div>
    <div class="form-group">   
        <label class="control-label col-sm-3">Short Name:</label>
        <div class="col-sm-8">
            <input class='form-control' type="text" name="short_name" value="<?php echo set_value('short_name'); ?>" placeholder="short_name">
            <div class="validation_error"><?php echo form_error('short_name'); ?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Address:</label>
        <div class="col-sm-8">
            <input class='form-control' type="text" name="address" value="<?php echo set_value('address'); ?>" placeholder="address">
            <div class="validation_error"><?php echo form_error('address'); ?></div>
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-3">&nbsp;</label>
        <div class="col-sm-8">
            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
        </div>
    </div>

   <input type="hidden" name="mode" value="add">
   
</form>

