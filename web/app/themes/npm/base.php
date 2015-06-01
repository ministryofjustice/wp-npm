<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
      get_template_part('templates/jumbotron');
      get_template_part('templates/filters');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <?php if (Config\display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
          <div class="feat-img">
            <?php
              $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
              the_post_thumbnail('large');
              if(!empty($get_description)){//If description is not empty show the div
              echo '<div class="img-caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</div>';
            } ?>
          </div>
          <div class="sub-nav">
          <?php
            if($post->post_parent)
            $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            else
            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
            if ($children) { ?>
              <ul>
              <?php echo $children; ?>
              </ul>
          <?php } ?>
          </div>
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
        <main class="main" role="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
