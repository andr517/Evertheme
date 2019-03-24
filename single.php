<!--
JONATHANS KOD - Single.php för varje enskilt inlägg.
Titeln och thumbnailbilden ligger i en hero istället för bredvid inlägget som i home.php. På vissa sidor kan man ändra bild och titel genom options, men för att bilderna på inlägg ska vara relevanta var det en självklarhet att använda den utvalda bilden för detta.
-->

<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post();

        // I variabeln nedan hämtar jag den utvalda bilden för inlägget som man är inne på och lägger den som en hero-bakgrund. Titeln lägger jag sedan i en hero-body för att få den att ligga över thumbnailbilden.
        $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <article>
              <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $thumbnail; ?>')">
                <div class="hero-body">
                  <div class="container has-text-centered">
                    <h1 class="topboxtitle"><?php the_title(); ?></h1>
                  </div>
                </div>
              </section>
              <div class="container news-single">
                <ul class="news-fa-list">
                  <li>
                    <?php the_time(get_option('date_format')) ?>
                  </li>
            	    <li>
                    <br><?php the_category(' | '); ?> <!-- Delar upp varje kategori med ett "|" -->
                  </li>
                </ul>
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
