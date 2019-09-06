<?php
/**
 * Template name: Publications
 */
the_post();
?>

<?php get_template_part('templates/content', 'page'); ?>

<?php

$publication_types = array(
  'annual-reports' => 'Annual reports',
  'guidance-and-protocols' => 'Guidance and protocols',
  'factsheets' => 'Factsheets',
  'correspondence' => 'Correspondence',
  'submissions' => 'Submissions',
    'news-releases-and-statements' => 'News releases and statements'
);

?>

<?php foreach ($publication_types as $term => $title): ?>
  <?php

  $query = new WP_Query(array (
    'post_type' => 'publications',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'publication_type',
        'field'    => 'slug',
        'terms'    => $term,
      ),
    ),
  ));

  ?>
  <?php if ($query->have_posts()): ?>
    <div class="pub-list">
      <h2><?= $title ?></h2>
      <div class="row">
        <?php while ($query->have_posts()): $query->the_post(); ?>
          <div class="col-md-3 pub-thumb">
            <?php

            $pdf_id = get_field('publication_file');
            $pdf_url = wp_get_attachment_url($pdf_id);
            $thumb_src = wp_get_attachment_image_src($pdf_id, 'pdf-thumb');
            $the_title = get_the_title();

            ?>
            <a class="pdf-link image-link" href="<?= $pdf_url ?>" target="_blank" title="<?= $the_title ?>">
              <img src="<?= $thumb_src[0] ?>">
              <span class="publication-title"><?php
                  $words_num = str_word_count($the_title);
                  $words_max = 8;
                  echo wp_trim_words($the_title, $words_max, ($words_num > $words_max ? '...' : null));
                  ?></span>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
