<!--
JONATHANS KOD - Här har jag skapat en ny ACF-options page (Theme Options) (se functions.php) som jag tilldelat en fältgrupp till (Search Page Options) via "Show this field group if Options Page is equal to Theme Options".
I denna grupp har jag gjort två nya fält, search_image samt search_title. Dessa två visas sedan i herosektionen nedan. Man kan på så sätt själv välja vilken titel "Search" ska ha, samt bakgrundsbild genom fliken "Theme Options" i adminpanelen.

Förövrigt behåller search.php samma struktur som home.php.
-->

<?php get_header();?>

<section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php the_field('search_image', 'option'); ?>')">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="topboxtitle"><?php the_field('search_title', 'option'); ?></h1>
    </div>
  </div>
</section>
<div class="container">
  <div class="columns is-centered is-half search-col">
    <p>Viewing search results for: <b><?php echo esc_html( get_search_query( false ) ); ?></b></p><br> <!-- Denna kod visar det ord eller den text du har sökt på. -->
  </div>
  <?php if(have_posts() ):
    while(have_posts()):
      the_post(); ?>

        <article>
          <div class="columns news">
            <div class="column news-thumb"><?php the_post_thumbnail('large'); ?></div>
            <div class="column is-three-fifths">
              <h2 class="news-title"><a href="<?php the_permalink(); ?>" title="<?php  the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
      else : _e( 'No search results found. Try searching for a different word.', 'textdomain' ); // Om det ord man sökt på inte finns visas denna texten.
    endif; ?>

    <?php get_template_part('partials/pagination') ?>
</div>

<?php get_footer(); ?>
