<!--
JONATHANS KOD - Visar den kategorin man är inne på. Hämtar kategoribild och lägger den som en herobild. Kategoribildsfunktionen är skapat genom att göra en ACF fältgrupp med specifikationerna "Show this field group if Taxonomy Term is equal to category." Därigenom skapas en "Utvald Bild"-ruta på alla taxonomier som är av "category"-typen. Bilden funkar precis som i inlägg, men är nu för hela kategorin.
Variabeln nedan hämtar sedan bildfältet från denna grupp och visar den som bakgrundsbild.
-->

<?php get_header();

$term = get_queried_object(); // Hämtar objektet i fråga, category. (Enligt dokumentationen "if you're on a category archive, it will return the category object").
$catimage = get_field('catimage', $term); // Hämtar fältet från ACF
?>

<section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $catimage; ?>')">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="topboxtitle"><?php wp_title(''); ?><!-- '' tar bort >> från kategorititeln. --></h1>
    </div>
  </div>
</section>
<div class="container">
  <?php if(have_posts() ):
    while(have_posts()):
      the_post(); ?>
        <div class="columns news">
          <div class="column news-thumb">
            <?php the_post_thumbnail('large'); ?>
          </div>
          <div class="column is-three-fifths">
            <h2 class="news-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <ul class="news-fa-list">
              <li>
                <?php the_time( get_option(  'date_format' ) )?> |
              </li>
            	<li>
                <?php the_category(' | '); ?> <!-- Delar upp varje kategori med ett "|". -->
              </li>
            </ul>
              <?php the_excerpt(); ?> <!-- Visar summary istället för hela texten likt home.php. -->
          </div>
        </div>
    <?php endwhile;
    else : _e( 'There are no articles in this category.', 'textdomain' );
  endif; ?>

  <?php get_template_part('partials/pagination') ?>

</div>

<?php get_footer(); ?>
