<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

do_action('get_header');
get_header();
get_template_part('templates/jumbotron');
get_template_part('templates/filters');

?>
<div class="wrap container" role="document">
  <div class="content row">
    <?php if (Config\display_sidebar()) : ?>
      <aside class="sidebar" role="complementary">
        <?php include Wrapper\sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>
    <main id="content" class="main" role="main">
      <?php include Wrapper\template_path(); ?>
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->
<?php get_footer(); ?>

