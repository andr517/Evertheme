<?php get_header() ?>

    <?php get_template_part('partials/acf', 'index');?>

      <div class="container">
        <?php
        if(have_posts() ):
          while(have_posts()):
            the_post();
            the_content();
          endwhile;
            else : _e( 'There are no posts to show.', 'textdomain' );
        endif;
          ?>
      </div>

      <?php get_template_part('partials/acf', 'index2');?>

      <?php get_template_part('partials/social');?>

<?php get_footer(); ?>
