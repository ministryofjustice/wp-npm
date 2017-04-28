<div class="feat-img">
  <?php
    $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
    the_post_thumbnail('large');
    if(!empty($get_description)):
  ?>
    <div class="img-caption"><?= get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
  <?php endif; ?>
</div>
