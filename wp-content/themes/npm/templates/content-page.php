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
    <div class="row">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="col-md-3 pub-thumb">
        <?php
        $pdf_id = get_field('publication_file');
        $thumbnail_id = get_post_meta( $pdf_id, '_thumbnail_id', true );
        if ($thumbnail_id):
            $thumb_src = wp_get_attachment_image_src ( $thumbnail_id, 'pdf-thumb');
        ?>
          <a class="pdf-link image-link" href="<?= wp_get_attachment_url( $pdf_id ) ?>" target="_blank">
            <img src="<?= $thumb_src[0]; ?>">
            <span><?= get_the_title( ); ?></span>
          </a>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>

  <?php
  $args = array (
    'post_type' => 'publications',
    'post_per_page' => -1,
    'order' => 'ASC',
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
    <div class="row">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="col-md-3 pub-thumb">
        <?php
        $pdf_id = get_field('publication_file');
        $thumbnail_id = get_post_meta( $pdf_id, '_thumbnail_id', true );
        if ($thumbnail_id):
            $thumb_src = wp_get_attachment_image_src ( $thumbnail_id, 'pdf-thumb');
        ?>
          <a class="pdf-link image-link" href="<?= wp_get_attachment_url( $pdf_id ) ?>" target="_blank">
            <img src="<?= $thumb_src[0]; ?>">
            <span><?= get_the_title( ); ?></span>
          </a>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>

<?php

  $args = array (
  'post_type' => 'publications',
  'post_per_page' => -1,
  'order' => 'ASC',
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
    <div class="row">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="col-md-3 pub-thumb">
        <?php
        $pdf_id = get_field('publication_file');
        $thumbnail_id = get_post_meta( $pdf_id, '_thumbnail_id', true );
        if ($thumbnail_id):
            $thumb_src = wp_get_attachment_image_src ( $thumbnail_id, 'pdf-thumb');
        ?>
          <a class="pdf-link image-link" href="<?= wp_get_attachment_url( $pdf_id ) ?>" target="_blank">
            <img src="<?= $thumb_src[0]; ?>">
            <span><?= get_the_title( ); ?></span>
          </a>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>

  <?php

  $args = array (
  'post_type' => 'publications',
  'post_per_page' => -1,
  'order' => 'ASC',
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
    <div class="row">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="col-md-3 pub-thumb">
        <?php
        $pdf_id = get_field('publication_file');
        $thumbnail_id = get_post_meta( $pdf_id, '_thumbnail_id', true );
        if ($thumbnail_id):
            $thumb_src = wp_get_attachment_image_src ( $thumbnail_id, 'pdf-thumb');
        ?>
          <a class="pdf-link image-link" href="<?= wp_get_attachment_url( $pdf_id ) ?>" target="_blank">
            <img src="<?= $thumb_src[0]; ?>">
            <span><?= get_the_title( ); ?></span>
          </a>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>

<?php }; ?>
