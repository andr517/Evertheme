    </div>

    <?php wp_footer(); ?>

      <!--
      JONATHANS KOD START - Tar värden ifrån options för att specificera text och bakgrundsfärg för footer.
      "Footer" är en submeny skapad genom functions.php där jag sedan har gett en fältgrupp specifikationerna "Show this field group if Options Page is equal to Footer".
      Färgerna för bakgrund samt text går sedan att ändra i adminpanelen via "Theme Options" > "Footer".
      -->
      <footer class="footer" style="color: <?php the_field('text_color', 'options');?>; background-color: <?php the_field('bgcolor', 'options');?>; ">
      <!--
      JONATHANS KOD SLUT
      -->

      <!--
      ANDRES KOD START - skapar tre columner där jag lägger tre widgetareas som blir dynamiska med bulma
      -->
       <div class="footer-columns" style="text-align:center;">
        <div class="columns is-centered">
          <div class="column is-one-third">
            <?php if(is_active_sidebar('footer-1')){
              dynamic_sidebar('footer-1');
            } ?>
          </div>
          <div class="column is-one-third">
            <?php if(is_active_sidebar('footer-2')){
              dynamic_sidebar('footer-2');
            } ?>
          </div>
          <div class="column is-one-third">
            <?php if(is_active_sidebar('footer-3')){
              dynamic_sidebar('footer-3');
            } ?>
          </div>
        </div>
      </div>
      <!--
      ANDRES KOD SLUT
      -->
      </footer>

    </body>
</html>
