<!--
JONATHANS KOD - Home.php för alla senaste inlägg.
Varje thumbnail ligger bredvid inlägget och en hero används som topp-bild. Denna går att andra på sidan "News". En pagination finns även för att gå till nästa sida av arkivet. Pagination-menyn hämtas från "pagination.php" då jag återanvänder den i många filer.
-->

<?php get_header() ?>

<?php get_template_part('partials/acf', 'news'); ?>
<!-- Hämtar acf-news.php som innehåller huvudbilden och titeln till News. Denna går att ändra i adminpanelen för sidan "News" -->

<div class="container">

  <?php if(have_posts() ):
    while(have_posts()):
      the_post(); ?>
        <article>
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
                   <?php the_category(' | '); ?>
                 </li>
               </ul>
               <?php the_excerpt(); ?> <!-- Visar en summary istället för hela content. Antal tecken på excerpt har jag sedan ändrat i functions.php samt lagt till en "Read More" istället för [...] - också i functions.php -->
             </div>
            </div>
          </article>
    <?php endwhile;
    else : _e( 'There are no articles to show.', 'textdomain' ); // Om inga inlägg finns kommer det istället stå detta.
  endif; ?>

  <?php get_template_part('partials/pagination') ?>

  <!-- Jag tyckte att vi inte skulle skapa en hel sida för månadsarkiv, så jag valde att lägga arkiven i en select-meny längst ned på home.php. På så vis kan man ändå lätt komma åt arkiv för månader, men på ett subtilare ställe. För att få fram arkiven använder jag wp_get_archives och typ => monthly för att visa månader, istället för till exempel år. -->
  <div class="control has-icons-left">
    <div class="select">
      <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
        <option value=""><?php echo esc_attr( __( 'Archives' ) ); ?></option>
        <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 0 ) ); ?>
      </select>
    </div>
    <span class="icon is-left">
      <i class="fa fa-folder"></i>
    </span>
  </div>
  <a href="johanwestin.com/everzone/archives"><button class="button">Archive Page</button></a>
</div>

<?php get_footer(); ?>
