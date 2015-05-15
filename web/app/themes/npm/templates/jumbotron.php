<?php use Roots\Sage\Titles; ?>
<?php if(is_front_page()): ?>
<div class="jumbotron">
  <div class="container">
    <div class="col-md-6">
      <h1><?php the_field('main_heading'); ?></h1>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
    </div>
    <div class="col-md-6">
      <div class="embed-responsive embed-responsive-16by9">
        <?php _e( wp_oembed_get( get_field( 'youtube_video' ) ) ); ?>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<div class="jumbotron title">
  <div class="container">
    <h1>
    <?php if(get_post_type( get_the_ID() ) == 'post'): ?>
      News
    <?php else: ?>
      <?= Titles\title(); ?>
    <?php endif; ?>
    </h1>
  </div>
</div>
<?php endif; ?>
