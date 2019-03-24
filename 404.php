<!--
JONATHANS KOD - author.php och search.php använder ACF options för att visa bakgrundsbilden i herosektionen. Author har ett eget fält i "Theme Options" där man kan ändra den. Titeln har jag satt genom wp_title för att skriva ut just den författarsidan man är inne på.
-->

<?php get_header();?>

<section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden;">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="topboxtitle"><?php wp_title('404 '); ?></h1>
    </div>
  </div>
</section>
<div class="container">
  <div class="columns">
    <div class="column has-text-centered">
      <h2>The page you are looking for doesn't exist!</h2>
      <?php get_search_form(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
