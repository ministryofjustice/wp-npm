<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php if( have_rows('member') ): $i = 0; ?>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php while ( have_rows('member') ) : the_row(); $i++; ?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading<?= $i ?>">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
              <?= get_sub_field('title'); ?>
            </a>
          </h4>
        </div>
        <div id="collapse<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $i ?>">
          <div class="panel-body">
            <?= get_sub_field('content'); ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>
