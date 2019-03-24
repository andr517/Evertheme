<!-- JONATHANS KOD - Flexible field för content under huvuddelen från index. I flexfältet ligger en repeater för citat, två och två uppdelade i citat vänster och citat höger. Varje ny rad man väljer att lägga till hamnar under det gamla, men två åt gången. -->

<?php
if( have_rows('indexflex2') ):
    while ( have_rows('indexflex2') ) : the_row();
        if( get_row_layout() == 'quotes' ):
          if( have_rows('quotes') ): ?>
            <div class="container">
              <div class="columns has-text-centered" style="margin-top: 30px;">
                <?php while ( have_rows('quotes') ) : the_row(); ?>
                  <div class="column">
                    <blockquote><p><?php the_sub_field('quote1'); ?></p></blockquote>
                  </div>
                  <div class="column">
                    <blockquote><p><?php the_sub_field('quote2'); ?></p></blockquote>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          <?php endif;?>

<!-- ANDRÉS KOD - En card repeater med bild titel text knapp med dynamisk länk där korten bryter åt höger. Storleken på korten är satt via bulma cards.-->

<?php elseif ( get_row_layout() == 'cards' ):  ?>
  <section class="section">
    <?php if( have_rows('repeater') ): ?>
      <div class="columns">
        <?php while ( have_rows('repeater') ) : ?><?php the_row(); ?>
          <?php if(get_sub_field('image')) { ?>
            <div class="container">
              <div class="card" id="indexcards">
               <div class="card-image">
                <figure class="image is-3by2">
                  <?php $cardimgdex = get_sub_field('image'); ?>
                  <img src="<?php echo $cardimgdex ?>" />
                </figure>
               </div>
               <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-4"><?php the_sub_field('title'); ?></p>
                  </div>
                </div>
                <div class="content" id="lidltext">
                  <?php the_sub_field('text'); ?>
                </div>
                <div class="content" id="indexbutton">
                  <a href="<?php the_sub_field('button_link'); ?>" class="button is-info has-text-centered">
                  <?php the_sub_field('button_text'); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php endwhile; ?>
      </div>

      <?php endif; ?>
    </section>

          <?php
        endif;
    endwhile;
endif;
?>
