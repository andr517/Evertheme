<!-- JONATHANS KOD - En arkivsidan som visar både år och månader som är klickbara länkar till arkivsidan man vill åt. wp_custom_archive hämtar ifrån funktionen i functions.php.
Sidan använder också sig av "popular posts" som visar de 10 populäraste inläggen (ifrån hur många visningar inlägget har). Funktionen är en loop med variabeln $popular i sin tur letar sig till funktionen som är skapad i functions.php. -->

<?php get_header() ?>

<?php get_template_part('partials/acf', 'news'); ?>
<!-- Hämtar acf-news.php som innehåller huvudbilden och titeln till News. Denna går att ändra i adminpanelen för sidan "News" -->

<section class="section">
  <div class="column has-text-centered">
    <h2 id="archives-title" class="title">Archives</h2>
  </div>
  <div class="column has-text-centered">
    <?php wp_custom_archive(); ?>
  </div>
  <div class="column has-text-centered">
    <h3 class="popular-title">Popular Posts</h3>
    <ol class="popular">
	   <?php
     $popular = new WP_Query(array('posts_per_page'=>10, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
	    while ($popular->have_posts()) : $popular->the_post(); ?>
	     <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	    <?php endwhile; wp_reset_postdata(); ?>
    </ol>
  </div>
</section>

<?php get_footer(); ?>
