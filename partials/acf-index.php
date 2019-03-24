<!--
JONATHANS KOD - Ett flexibelt fält för index. Hämtar fältet (likt bilder) video från det flexibla fältet "indexflex" och läggger det i en div med en titel ovanpå. Videofilen går att ändra på sidan "Home" och måste vara .mp4-format. Videon autospelar och är tyst.
-->

<?php
if (have_rows('indexflex')):
    while (have_rows('indexflex')):
        the_row();
        if (get_row_layout() == 'topbox'): ?>
          <?php $video = get_sub_field('video'); ?>
          <div class="video-container">
             <video id="video-bg" autoplay muted loop poster="image" preload="true">
               <source src="<?php echo $video; ?>" type="video/mp4" />
               Your browser does not support the video tag.
             </video>
             <div class="overlay">
                <h1 class="topboxtitle animate-pop-in"><?php the_sub_field('title'); ?></h1>
             </div>
          </div>
        <?php
        endif;
    endwhile;
endif;
?>
