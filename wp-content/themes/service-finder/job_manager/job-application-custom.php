<form method="post" class="applyforjob">
  <div class="modal-body clearfix row">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon"><?php echo service_finder_currencysymbol(); ?></span>
          <input name="costing" type="text" class="form-control" placeholder="<?php esc_attr_e('Cost', 'service-finder'); ?>">
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon v-align-t"><i class="fa fa-pencil"></i></span>
          <textarea name="description" rows="4" class="form-control" placeholder="<?php esc_attr_e('Description', 'service-finder'); ?>"></textarea>
        </div>
      </div>
    </div>
    </div>
    <div class="modal-footer">
    <div class="col-md-12">
      <input type="hidden" name="jobid" value="<?php echo get_the_id(); ?>">
      <input name="submit" type="submit" value="<?php esc_attr_e('Submit', 'service-finder'); ?>" class="btn btn-primary margin-r-10">
      <input name="Reset" type="reset" value="<?php esc_attr_e('Reset', 'service-finder'); ?>"  class="btn btn-custom">
    </div>
    </div>
  </div>
</form>