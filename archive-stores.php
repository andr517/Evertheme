<!--
JONATHANS KOD - Arkivsida för posttypen "Stores" - alla butiker. Arkivsidan ser ut som category.php och andra liknande filer med en ACF option för att hämta bakgrundsbilden som man själv får välja i "Theme Options".
Har också tagit bort the_category och the_date för att Stores bara ska vara informationssidor om de olika butikerna och båda datum och kategori inte är relevant för innehållet.
-->

<?php get_header(); ?>

  <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php the_field('stores_image', 'option'); ?>')">
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="topboxtitle"><?php wp_title(''); ?></h1>
      </div>
    </div>
  </section>

  <div class="container">
    <?php
      if(have_posts() ):
        while(have_posts()):
          the_post(); ?>
            <article>
              <div class="columns news">
                <div class="column news-thumb">
                  <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="column is-three-fifths">
                  <h2 class="news-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  <?php the_excerpt(); ?> <!-- Visar en summary istället för hela content. Antal tecken på excerpt har jag sedan ändrat i functions.php samt lagt till en "Read More" istället för [...] - också i functions.php -->
                </div>
              </div>
            </article>
          <?php endwhile;
            else : _e( 'There are no articles to show.', 'textdomain' ); // Om inga inlägg finns kommer det istället stå detta.
          ?>
        <?php endif; ?>
    <?php get_template_part('partials/pagination') ?>
  </div>

<?php get_footer(); ?>
