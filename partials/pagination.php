<!--
JONATHANS KOD - Koden nedan lägger till en pagination som har texten Previous och Next på vardera sida om siffrorna.
-->

<div class="columns is-centered">
  <div class="column is-half paginavi">
    <?php the_posts_pagination( array(
      'mid_size'  => 2,
      'prev_text' => __( 'Previous', 'textdomain' ),
      'next_text' => __( 'Next', 'textdomain' ),
      ) );
    ?>
  </div>
</div>
