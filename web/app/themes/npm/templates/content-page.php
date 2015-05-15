<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

<?php if ( is_page('publications-resources') ) { 

$args = array (
  'post_type' => 'publications',
  'post_per_page' => -1,
  'order' => 'ASC',
  'tax_query' => array(
    array(
      'taxonomy' => 'publication_type',
      'field'    => 'slug',
      'terms'    => 'annual-reports',
    ),
  ),
);


  $query = new WP_Query( $args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  <div class="pub-list">
    <h2>Annual reports</h2>
    <ul>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <li><a href="<?php the_field('publication_file')?>"><?= get_the_title( ); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  </div>

  <?php endif; ?>

<?php

  $args = array (
  'post_type' => 'publications',
  'post_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'publication_type',
      'field'    => 'slug',
      'terms'    => 'factsheets',
    ),
  ),
);
  $query = new WP_Query( $args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  <div class="pub-list">
    <h2>Factsheets</h2>
    <ul>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li><a href="<?= get_permalink( ); ?>"><?= get_the_title( ); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>


  <?php

  $args = array (
  'post_type' => 'publications',
  'post_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'publication_type',
      'field'    => 'slug',
      'terms'    => 'guidance-and-protocols',
    ),
  ),
);
  $query = new WP_Query( $args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  <div class="pub-list">
    <h2>Guidance and protocols</h2>
    <ul>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li><a href="<?= get_permalink( ); ?>"><?= get_the_title( ); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>


  <?php

  $args = array (
  'post_type' => 'publications',
  'post_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'publication_type',
      'field'    => 'slug',
      'terms'    => 'letters-and-submissions',
    ),
  ),
);
  $query = new WP_Query( $args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  <div class="pub-list">
    <h2>Letters and submissions</h2>
    <ul>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <li><a href="<?= get_permalink( ); ?>"><?= get_the_title( ); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>






<?php }; ?>


