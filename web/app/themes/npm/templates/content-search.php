<article <?php post_class(); ?>>
    <?php

    $result_title = get_the_title();

    if (get_post_type() === 'publications') {
        $pdf_id = get_field('publication_file');
        $result_url = wp_get_attachment_url($pdf_id);
        $ext = pathinfo($result_url, PATHINFO_EXTENSION);
        $result_title .= ' (' . $ext . ')';
    }
    else {
        $result_url = get_permalink();
    }
    ?>
  <header>
    <h2 class="entry-title"><a href="<?php echo $result_url; ?>"><?php echo $result_title; ?></a></h2>
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
