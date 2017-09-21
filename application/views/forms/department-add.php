<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">Fill up all fields</div>
            <div class="box-body">
                <form action="<?php echo site_url('departments/save_data'); ?>" method="post" class="form-horizontal">
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
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="description" id="description" placeholder="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <input type="hidden" name="mode" value="add">
                            <button class="btn btn-success btn-block" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>