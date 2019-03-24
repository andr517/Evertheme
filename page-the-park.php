<?php get_header(); ?>
<?php get_template_part('partials/acf-park');?>

<section class="section">
   <div class="container">
<h2 style="font-size: 40px;">Experience Everzone</h2>
 <h3>The Largest top rated amusement park in Texas, With next gen rollercoasters you will experience g-forces on an whole other level! prepare for an amazing experience at everzone park.</h3>
   </div>
 </section>
<!-- tiles start -->
<div class="tile is-ancestor">
  <div class="centermy tile is-centered is-7">
<!-- tile 1 -->
<a href="http://johanwestin.com/everzone/the-park/attractions/" style=" color: inherit;">
    <div class="tile is-parent zoom">
      <article class="tile is-child notification">
        <p class="title">Attractions</p>
        <p class="subtitle">Explore the rides Everzone offers.</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
    </a>
    <!-- tile 1 slut -->
    <!-- tile 2 -->
    <a href="http://johanwestin.com/everzone/the-park/resturants/" style=" color: inherit;">
    <div class="tile is-parent zoom">
      <article class="tile is-child notification">
        <p class="title">Resturants</p>
        <p class="subtitle">Everzone's on site resturants.</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
    </a>
        <!-- tile 3 -->
        <a href="http://johanwestin.com/everzone/stores/" style=" color: inherit;">
            <div class="tile is-parent zoom">
              <article class="tile is-child notification">
                <p class="title">Stores</p>
                <p class="subtitle">Souvenir & candy.</p>
                <div class="content">
                  <!-- Content -->
                </div>
              </article>
            </div>
            </a>
            <!-- tile 3 slut -->
  </div>
</div>
<!-- tiles ending -->
<div class="container has-text-centered">
  <h2>Location</h2>
</div>
<div class="mymap" style=" margin-bottom: -10px;">
  <?php echo do_shortcode( '[mapsmarker marker="1"]' ); ?>
</div>
  <?php get_footer(); ?>
