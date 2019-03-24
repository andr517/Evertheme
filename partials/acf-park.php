<?php
if( have_rows('park_content') ):

    while (have_rows('park_content') ) : the_row();

      if( get_row_layout() == 'header_image' ):

        $topboximage = get_sub_field('image'); ?>

        <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $topboximage ?>');">
            <div class="hero-body">
              <div class="container has-text-centered">
                <div class="zoomIn">
                <h1 class="topboxtitle"><?php the_sub_field('title'); ?></h1>
                </div>
                </div>
              </div>
            </section>

            <?php elseif ( get_row_layout() == '' ):  ?>

    <?php
      endif;

      endwhile;

      else:

      endif;

        ?>
