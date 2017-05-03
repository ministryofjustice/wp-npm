<?php use Roots\Sage\Titles; ?>
<?php if(is_front_page()): ?>
<div class="jumbotron">
  <div class="container">
    <div class="col-md-6">
      <h1><?php the_field('main_heading'); ?></h1>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?= get_field('banner_content'); ?>
      <?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
    </div>
    <div class="col-md-6">
          <?php

$images = get_field('homepage_gallery');

if( $images ): ?>
    <div id="slider" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <p class="flex-caption"><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>
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
