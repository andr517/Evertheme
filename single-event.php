<!-- Johans kod -->

<?php get_header() ?>

        <?php
        if(have_posts() ):
          while(have_posts()):
            the_post();

            $thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <article>
              <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $thumbnail; ?>')">
                <div class="hero-body">
                  <div class="container has-text-centered">
                    <h1 class="topboxtitle"><?php the_title(); ?></h1>
                  </div>
                </div>
              </section>
              <div class="container news-single">
                <?php the_content(); ?>
              </div>
            </article>
          <?php
          endwhile; ?>

          <div class="has-text-centered">
            <a class="button is-info" href="http://johanwestin.com/everzone/events/">
              Back
            </a>
            <a class="button is-info" href="http://johanwestin.com/everzone/product-category/tickets/concert-tickets/">
              Tickets
            </a>
          </div>
          <?php
        endif;?>

<?php get_footer(); ?>
