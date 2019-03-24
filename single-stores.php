<!--
JONATHANS KOD - single-stores.php och single.php är väldigt lika varandra. Enda skillnaden är att jag har tagit bort date och category likt archive-stores.php för att det inte är relevant till informationssidor samt ändrat lite i titeln för att visa att det är en butik.
-->

<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post();

        // I variabeln nedan hämtar jag thumbnailbilden för inlägget som man är inne på och lägger den som en hero-bakgrund. Titeln lägger jag sedan i en hero-body för att få den att ligga över thumbnailbilden.
        $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <article>
              <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $thumbnail; ?>')">
                <div class="hero-body">
                  <div class="container has-text-centered">
                    <h1 class="topboxtitle">- Store - <br><?php the_title(); ?></h1>
                  </div>
                </div>
              </section>
              <div class="container news-single">
            <?php the_content(); ?>
            </div>
          </article>
          <?php
    endwhile;
else:
    _e('There are no articles to show.', 'textdomain');
endif;
?>

<?php get_footer(); ?>
