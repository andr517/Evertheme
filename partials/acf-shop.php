<!-- Andres kod:acf-shop -->
<!-- Jag har också skapat woocommerce sidan, vilket denna sida länkar till där jag har tagit bort vissa delar samt lagt till meny sidebar samt ändrat utseende på text knappar placering mm. -->
<!-- Lägger till en bakrundsbild i header boxen med en titel i mitten -->
<?php
// startar flexiblefield loopen
if (have_rows('shop_content')):

    while (have_rows('shop_content')):
        the_row();

        if (get_row_layout() == 'header_box'):
            // Ger "image" fältet ett värde
            $topboximage = get_sub_field('image'); ?>
        <!-- echoar bilden som bakgrund till hero sektionen samt sätter stil  -->
        <section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $topboximage ?>');">
            <div class="hero-body">
              <div class="container has-text-centered">
                <div class="zoomIn">
                <h1 class="topboxtitle"><?php the_sub_field('title'); ?></h1>
                </div>
                </div>
              </div>
            </section>

<!-- En repeater som dynamiskt skapar kort med top titel bild, card titel och text, finns också fält för länkar. -->
            <!-- hämtar layout  -->
            <?php
        elseif (get_row_layout() == 'top_cards'): ?>

              <section class="section">
                <div class="column">
                  <h2 class="title" id="card-title"><?php the_sub_field('title'); ?></h2>
                </div>

                <!-- Kollar om 'repeater' har rader -->
                <?php if (have_rows('repeater')): ?>

                  <div class="columns">
                    <!-- loopar igenom raderna -->
                  <?php while (have_rows('repeater')): ?><?php the_row(); ?>
                    <!-- Sätter denna if så bulma inte skapar en card outline om inget finns -->
                    <?php if (get_sub_field('image'))
                    { ?>
              <!-- Gör hela columnen klickbar och skapar en dynamisk länk ruta -->
              <a href="<?php the_sub_field('link'); ?>" class="column is-3">

                <div class="card" id="repcardtop">
                  <div class="card-image">
                    <figure class="image is-3by2">
                      <!-- Ger 'image' ett värde -->
                      <?php $image = get_sub_field('image'); ?>
                      <img src="<?php echo $image ?>" />

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
                    </div>
                  </div>
                </div>

              </a>
              <!-- avslutar image ifen -->
            <?php
                    } ?>
            <!-- Avslutar while -->
            <?php
                endwhile; ?>
          </div>
          <!-- Avslutar if 'repeatern' -->
      <?php
            endif; ?>
  </section>

<!-- En centrerad text box som har plats för titel, subtitel, text som dynamiskt kan länka till vad som.  -->
  <!-- hämtar layout  -->
  <?php
        elseif (get_row_layout() == 'center_text'): ?>

    <div class="container has-text-centered" id="centertextbox">
      <h2 class="title is-2"><?php the_sub_field('title'); ?></h2>
      <h3 class="subtitle is-5 "><?php the_sub_field('sub_title'); ?></h3>

      <div class="subtitle is-4">
       <a href="<?php the_sub_field('link'); ?>"<p><?php the_sub_field('text'); ?></p></a>
      </div>
    </div>

<!-- columner med plats för bilder som i olika storlekar visas med scaletransform på mousehover -->
    <!-- hämtar layout  -->
    <?php
        elseif (get_row_layout() == 'picture_columns'): ?>

      <section class="section">

          <div class="container">
            <div class="columns">
              <!-- Ger 'shopimage' ett värde -->
            <?php $shopimage1 = get_sub_field('image1'); ?>
            <!-- echoar bilden som bakgrund till columnen  -->
            <div class="column is-8 is-12-mobile" id="twocolleft" style="background-image: url('<?php echo $shopimage1 ?>');">
            </div>
            <!-- Ger 'shopimage' ett värde -->
            <?php $shopimage2 = get_sub_field('image2'); ?>
            <!-- echoar bilden som bakgrund till columnen  -->
            <div class="column is-4 is-12-mobile" id="twocolright" style="background-image: url('<?php echo $shopimage2 ?>');">
            </div>

            </div>

             <div class="columns" id="botpiccol">
            <!-- Ger 'shopimage' ett värde -->
            <?php $shopimage3 = get_sub_field('image3'); ?>
            <!-- echoar bilden som bakgrund till columnen  -->
            <div class="column is-4 is-12-mobile" id="twocolbotleft" style="background-image: url('<?php echo $shopimage3 ?>');">
            </div>
            <!-- Ger 'shopimage' ett värde -->
            <?php $shopimage4 = get_sub_field('image4'); ?>
            <!-- echoar bilden som bakgrund till columnen  -->
            <div class="column is-8 is-12-mobile" id="twocolbotright" style="background-image: url('<?php echo $shopimage4 ?>');">
            </div>

          </div>
         </div>

        </section>

<!-- En owl slider repeater som har plats för bild,titel,subtitel,text,pris och knapp, som kan länkas till vad som. Slider värdena har också ändrats i owl.js filen. -->
      <!-- hämtar layout  -->
      <?php
        elseif (get_row_layout() == 'owl_slider'): ?>
      <!-- Anger sektionen som owl slider och sätter en autoplay hastighet på 3000 millisekunder -->
      <section class="slideshow" data-autoplay="3000" data-singleitem="true" id="slider" class="owl-carousel">
      <!-- loopar igenom raderna -->
      <?php while (have_rows('repeater')): ?><?php the_row(); ?>
        <!-- Ger 'boximage' ett värde -->
        <?php $box1image = get_sub_field('image1'); ?>

      <div class="slide">
      <div class="container">
      <div class="columns">
       <div class="column is-5 is-6-mobile">
         <!-- echoar bilden i columnen  -->
         <img src="<?php echo $box1image ?>" />
         </div>
         <div class="column is-12-mobile" id="owlsec">
          <!-- Visar subfälten inom columnen i varje owl slider -->
         <h2 class="is-size-5-mobile"><?php the_sub_field('title'); ?></h2>
         <h3 class="is-size-6-mobile"><?php the_sub_field('sub_title'); ?></h3>
         <p class="is-size-7-mobile"><?php the_sub_field('text'); ?></p>
         <p class="is-size-8-mobile"><?php the_sub_field('price'); ?></p>
         <!-- Gör knappen dynamisk där länken går att byta i acf -->
         <a href="<?php the_sub_field('button_link'); ?>" class="button is-info"><?php the_sub_field('button'); ?></a>
         </div>

      </div>
      </div>
      </div>
      <!-- Avslutar while loopen -->
      <?php
            endwhile; ?>

      </section>

<!-- En repeater som har tre horisontella kort samt bakrundsbild och titel går också att sätta länk via "link" fältet -->
    <!-- hämtar layout  -->
    <?php
        elseif (get_row_layout() == 'cat_rep'): ?>

    <div class="card">
      <div class="container">
    <!-- loopar igenom raderna -->
    <?php while (have_rows('repeater')): ?><?php the_row(); ?>
      <!-- Ger catbg ett värde -->
      <?php $catbg1 = get_sub_field('catbgimg1'); ?>
      <?php $catbg2 = get_sub_field('catbgimg2'); ?>
      <?php $catbg3 = get_sub_field('catbgimg3'); ?>
        <div class="columns" id="catrepcol">
          <!-- Gör varje column till en klickbar länk -->
          <a href="<?php the_sub_field('link1'); ?>">
      <div class="column is-4">
      <div class="card-image">
        <figure class="image">
          <img src="<?php echo $catbg1 ?>">
        </figure>
      </div>
      <div class="card-content has-text-centered">
        <p class="title is-4"><?php the_sub_field('text1'); ?></p>
      </a>
      </div>
    </div>
    <!-- Gör varje column till en klickbar länk -->
    <a href="<?php the_sub_field('link2'); ?>">
    <div class="column is-4">
      <div class="card-image">
        <figure class="image">
          <img src="<?php echo $catbg2 ?>">
        </figure>
      </div>
      <div class="card-content has-text-centered">
        <p class="title is-4"><?php the_sub_field('text2'); ?></p>
      </a>
      </div>
    </div>
    <!-- Gör varje column till en klickbar länk -->
    <a href="<?php the_sub_field('link1'); ?>">
    <div class="column is-4">
      <div class="card-image">
        <figure class="image">
          <img src="<?php echo $catbg3 ?>">
        </figure>
      </div>
      <div class="card-content has-text-centered">
        <p class="title is-4"><?php the_sub_field('text3'); ?></p>
      </a>
      </div>
    </div>
</div>
    <!-- Avslutar while loopen -->
    <?php
            endwhile; ?>

</div>
</div>

<!-- Avlsutar flexiblefield loopen -->
<?php
        endif;
    endwhile;
endif;
?>
