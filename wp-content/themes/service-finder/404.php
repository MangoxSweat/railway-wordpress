<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
get_header(); ?>

<div class="page-content">
  <?php require get_template_directory() . '/lib/breadcrumb.php'; ?>
  <!-- contact area -->
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <div class="page-notfound text-center">
              <strong>4<i class="fa fa-frown-o text-primary"></i>4</strong> <span>
              <?php esc_html_e('Page not found', 'service-finder'); ?>
              </span> 
              <?php get_search_form(); ?>
              <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
              <?php esc_html_e('GO TO HOME', 'service-finder'); ?>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact area  END -->
</div>
<?php get_footer(); ?>
