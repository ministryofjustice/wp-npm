<?php use Roots\Sage\Titles; ?>
<?php if(is_front_page()): ?>
<div class="jumbotron">
  <div class="container">
    <div class="col-lg-6">
      <h1>Welcome to NPM</h1>
      <p>The UK National Preventive Mechanism was established in 2009 to strengthen the protection of people in detention through independent monitoring.</p>
      <p>In coordination across the four nations of the UK, the NPM focuses attention on practices in detention that could amount to ill-treatment, and works to ensure its own approaches are consistent with international standards for independent detention monitoring.</p>
    </div>
    <div class="col-lg-6">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="//www.youtube.com/embed/FtujXPA87ZI?modestbranding=1&showinfo=0&autohide=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen></iframe>
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
    <?php elseif(get_post_type( get_the_ID() ) == 'publications'): ?>
      Publications &amp; Resources
    <?php else: ?>
      <?= Titles\title(); ?>
    <?php endif; ?>
    </h1>
  </div>
</div>
<?php endif; ?>
