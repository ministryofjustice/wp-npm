<div class="row boxes">
  <div class="col-lg-3 col-md-6">
    <a href="">
      About NPM
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="">
      About OPCAT
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="">
      About NPM Members
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="">
      Publications
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
    <h2>Latest Publications</h2>
    <ul>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li><a href="<?= get_permalink( ); ?>"><?= get_the_title( ); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>

  <?php
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 3
  ];
  $query = new WP_Query( $args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  <div class="col-lg-8 latest-news">
    <h2>Recent News</h2>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>

</div>
