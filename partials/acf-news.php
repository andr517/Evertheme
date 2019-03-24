<!--
JONATHANS KOD - Här har jag gjort, likt mina andra sidor, en hero med en bakgrundsbild och överliggande text. För att hämta både bilden och titeln använde jag the_field och get_field, dock fungerade inte dessa utan att jag satte ID:t på posten (sidan News) och la det som andra värde efter fältnamnet som beskrivs i ACF dokumentationen - the_field($selector, [$post_id], [$format_value])).
-->

<?php $topboximage = get_field('image', 15); ?>

<section class="hero is-medium" style="background-size: cover; width:100%; overflow: hidden; background-image: url('<?php echo $topboximage ?>');">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="topboxtitle"><?php the_field('title', 15); ?></h1>
    </div>
  </div>
</section>
