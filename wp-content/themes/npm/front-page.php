<div class="row boxes">
  <div class="col-lg-3 col-md-6">
    <a href="<?php the_field('homelink_1'); ?>">
      <?php the_field('homelink_1_text'); ?>
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="<?php the_field('homelink_2'); ?>">
      <?php the_field('homelink_2_text'); ?>
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="<?php the_field('homelink_3'); ?>">
      <?php the_field('homelink_3_text'); ?>
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="<?php the_field('homelink_4'); ?>">
      <?php the_field('homelink_4_text'); ?>
    </a>
  </div>
</div>

<div class="row">
  <?php
  $args = [
    'post_type' => 'publications',
    'posts_per_page' => 5
  ];
  $query = new WP_Query( $args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  <div class="col-lg-4 latest-publications">
    <h2><?php the_field('left_heading'); ?></h2>
    <ul>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li><a href="<?php the_field('publication_file')?>"><?= get_the_title( ); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>
  <?php $content = get_field('content'); ?>
  <?php if ( !empty($content) ) : ?>
  <div class="col-lg-8 latest-news">
    <h2><?php the_field('right_heading'); ?></h2>
    <?= $content; ?>
  </div>
  <?php endif; ?>

</div>
