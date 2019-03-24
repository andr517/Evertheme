<!--
JONATHANS KOD - author.php och search.php använder ACF options för att visa bakgrundsbilden i herosektionen. Author har ett eget fält i "Theme Options" där man kan ändra den. Titeln har jag satt genom wp_title för att skriva ut just den författarsidan man är inne på, t.ex "Jonathan Eriksson" om man klickar sig in på min profil. I övrigt behåller author samma utseende som home.php.
-->

<?php get_header();?>

<section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php the_field('author_image', 'option'); ?>')">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="topboxtitle"><?php wp_title(''); ?></h1>
    </div>
  </div>
</section>
<div class="container">
  <div class="columns is-centered is-half search-col">
    <p>Viewing all posts made by: <b><?php wp_title(''); ?></b><br>
  </div>
  <?php if(have_posts() ):
    while(have_posts()):
      the_post(); ?>

        <article>
          <div class="columns news">
            <div class="column news-thumb"><?php the_post_thumbnail('large'); ?></div>
            <div class="column is-three-fifths">
              <h2 class="news-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <ul class="news-fa-list">
                <li>
                  <?php the_time( get_option(  'date_format' ) )?> |
                </li>
            	  <li>
                  <?php the_category(' | '); ?>
                </li>
              </ul>
              <?php the_excerpt(); ?>
            </div>
          </div>
        </article>

      <?php endwhile;
      else : _e( 'This author has not made any posts yet.', 'textdomain' ); // Om författaren inte har några poster.
    endif; ?>

  <?php get_template_part('partials/pagination') ?>

</div>

<?php get_footer(); ?>
