<!-- victors -->

<?php

if (have_rows('attractions_content')):

    while (have_rows('attractions_content')):
        the_row();

        if (get_row_layout() == 'header_box'):

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

            <?php
        elseif (get_row_layout() == 'resturtant_cards'): ?>

              <section class="section">
                <div class="column">
                  <h2 class="title" id="card-title"><?php the_sub_field('title'); ?></h2>
                </div>
                <div class="column" style="margin-bottom: 30px;">
                  <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                </div>

                <?php if (have_rows('repeater')): ?>

                  <div class="columns">

                  <?php while (have_rows('repeater')): ?><?php the_row(); ?>

                    <?php if (get_sub_field('image'))
                    { ?>

              <a href="<?php the_sub_field('link'); ?>" class="column is-3">
                <div class="card">
                  <div class="card-image">
                    <figure class="image is-3by2">
                      <?php $bild = get_sub_field('image'); ?>
                      <img src="<?php echo $bild ?>" />
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">

                      <div class="media-content">
                        <p class="title is-4"><?php the_sub_field('title'); ?></p>
                      </div>
                    </div>
                    <div class="content">
                      <?php the_sub_field('text'); ?>
                      <br>
                      <?php the_sub_field('text2'); ?>
                    </div>
                  </div>
                </div>

              </a>

            <?php
                    } ?>

            <?php
                endwhile; ?>
          </div>

      <?php
            endif; ?>
<?php
        endif;
    endwhile;
endif;
?>
