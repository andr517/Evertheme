<!--
JONATHANS KOD
För arkiv skapade jag en nytt ACF-grupp (Archive Page) med reglerna "Show this field group if Options Page is equal to Theme Options" för att lägga den under sidan Theme Options tillsammans med resterande options för bakgrundsbilder som search och author. I gruppen skapade jag endast ett bildfält som jag hämtar genom "the_field('archive_image', 'option')" och i koden nedan läggs den som baklgrundsbild. På så vis kan man, likt andra "speciella" sidor som search.php och author.php ändra vilken bakgrundsbild man vill ha genom adminpanelen. Titeln tar jag genom wp_title för att hämta en relevant titel, så om man t.ex går in på /2018 visas titeln som "2018", går du till /2018/11 visa titeln som "2018 November".
Likt mina andra sidor som också använder options för bakgrundsbilder och titlar som search, author och stores tycker jag att options är det bästa alternativet för ändåmålet. Alla bilder på sidan ska vara dynamiska, och options är ett mycket smidigt sätt att lösa detta på. Hade det behövts mer fält till sidorna hade jag enkelt kunnat skapat en ny submeny för options och lägga det där istället.
-->

<?php get_header(); ?>

  <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php the_field('archive_image', 'option'); ?>')">
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
    <?php get_template_part('partials/pagination') // Laddar in pagination-navigationen från pagination.php i partialsmappen. ?>
    <div class="control has-icons-left">
      <div class="select">
        <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
          <option value=""><?php echo esc_attr( __( 'Archive' ) ); ?></option>
          <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 0 ) ); ?>
        </select>
      </div>
      <span class="icon is-left">
        <i class="fa fa-folder"></i>
      </span>
    </div>

  </div>

<?php get_footer(); ?>
