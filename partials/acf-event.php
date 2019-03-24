<?php
 /*Johans acf kod*/
 ?>
<?php
if(have_rows('event_sections')) {
  while (have_rows('event_sections')) {
    the_row();
// topBoxContent använder sig av två subfields där 'image' hämtar ut bilden och 'title' hämtar ut titeln.
    if ( get_row_layout() == 'top_box_content' ) {
      $topboximage = get_sub_field('image'); //skapar en variabel som har subfältet 'image' som värde.?>
      <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $topboximage ?>');">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h2 class="topboxtitle"><?php the_sub_field('title'); ?></h2>
          </div>
        </div>
      </section>
<?php } ?>

<?php
  // twoColLayout är layout med två kolumner som har fyra subfält för varje kolumn.
    if ( get_row_layout() == 'two_col_layout' ) { ?>
      <div class="columns is-multiline twoCol">
        <?php // Vänstra Kolumnen. ?>
        <div class="column subCol">
          <div class="column backgroundImg" style="background-image: url('<?php the_sub_field('left_background');?>');"> <?php // subfältet för bakgrundsbilden. ?>
          </div>
          <a href="<?php the_sub_field('left_link'); // subfältet för länken. ?>">
            <div class="textBoxTwoCol">
              <h2><?php the_sub_field('left_title'); ?></h2> <?php // subfältet för titel. ?>
              <p><?php the_sub_field('left_text'); ?></p> <?php // subfältet för texten. ?>
            </div>
          </a>
        </div>
        <?php // Högra Kolumnen. ?>
        <div class="column subCol">
          <div class="column backgroundImg" style="background-image: url('<?php the_sub_field('right_background'); ?>');"> <?php // subfältet för bakgrundsbilden. ?>
          </div>
          <a href="<?php the_sub_field('right_link'); ?>"> <?php // subfältet för länken. ?>
            <div class="textBoxTwoCol">
              <h2><?php the_sub_field('right_title'); ?></h2> <?php // subfältet för titel. ?>
              <p><?php the_sub_field('right_text'); ?></p> <?php // subfältet för text. ?>
            </div>
          </a>
        </div>
      </div>
      <?php
    } ?>

<?php
// MultiColLayout är en layout med en repeater med fyra sub fält som lägger till en kolumn för varje event.
    if ( get_row_layout() == 'multi_col_layout' ) {?>
      <div class="multiCol columns is-multiline">
        <?php
        while (have_rows('col_repeater')) {
          the_row(); ?>
          <div class="column subCol">
            <div alt="hej" class="column backgroundImg" style="background-image: url('<?php the_sub_field('background'); ?>');"> <?php // subfältet för bakgrundsbilden. ?>
            </div>
            <a href="<?php the_sub_field('link'); ?>"> <?php // subfältet för länken. ?>
              <div class="textBox">
                <h2><?php the_sub_field('title'); ?></h2> <?php // subfältet för titel. ?>
                <p><?php the_sub_field('text'); ?></p> <?php // subfältet för text. ?>
              </div>
            </a>
          </div>
          <?php
        } ?>
      </div>
<?php
    } ?>

<?php
// Hero är en en kolumns layout som har tre subfält, ett för bakgrundsfärg, ett för färgen på texten och ett för titeln.
    if ( get_row_layout() == 'hero' ) {?>
      <section class="month columns" style="background-color: <?php the_sub_field('background_color'); ?>">
        <div class="month-body column">
            <h2 id='card-title' class="title" style='color: <?php the_sub_field('text_color'); ?>;'><?php the_sub_field('title'); ?></h2>
        </div>
      </section>
<?php
    }
  }
}
