<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Voucher</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="username">Username <?php echo form_error('username') ?></label>
            <textarea class="form-control" rows="3" name="username" id="username" placeholder="Username"><?php echo $username; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="password">Password <?php echo form_error('password') ?></label>
            <textarea class="form-control" rows="3" name="password" id="password" placeholder="Password"><?php echo $password; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Masa Aktif <?php echo form_error('masa_aktif') ?></label>
            <input type="text" class="form-control" name="masa_aktif" id="masa_aktif" placeholder="Masa Aktif" value="<?php echo $masa_aktif; ?>" />
        </div>
	    <input type="hidden" name="id_voucher" value="<?php echo $id_voucher; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('voucher') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>