<!DOCTYPE html>
<html class="html" lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <div class="wrap">

      <!-- Jonathans kod - navigationsmeny - Logon länkar till home_url (vald i adminpanelen) -->
      <nav class="mainnav">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu1' ) ); ?>
        <div class="logo" style="width:150px;">
          <a href="<?php $url = home_url();
          echo esc_url( $url ); ?>">
            <?php if(is_active_sidebar('logo-menu')){
              dynamic_sidebar('logo-menu');
            } ?>
          </a></div>
          <div class="logo2" style="width:150px;">
            <a href="<?php echo esc_url( $url ); ?>">
            <?php if(is_active_sidebar('logo-menu2')){
              dynamic_sidebar('logo-menu2');
            } ?>
            </a></div>
            <!--Searchbar, Andres kod, sätter värden för en dropdown searchbar widget som är kopplad till javascript och css -->
          <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-search"></i></button>
            <div id="myDropdown" class="dropdown-content">
              <?php if(is_active_sidebar('search-menu')){
                dynamic_sidebar('search-menu');
              } ?>
            </div>
          </div>
          <!------------>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu2' ) ); ?>
      </nav>

      <!-- JONATHANS KOD - Navigationsmeny för mobiler och surfplattor. Liknar huvudmenyn då den använder home_url() för rätt länk och wp_nav_menu( array( 'theme_location' => 'header-menu1' ) för att hitta rätt meny från adminpanelen. Övriga inställningar för menyn är från jonathan.css. -->
      <div class="Navbar">
        <div class="Navbar__Link Navbar__Link-brand">
          <a href="<?php $url = home_url();
          echo esc_url( $url ); ?>"><?php if(is_active_sidebar('logo-menu2')){
          dynamic_sidebar('logo-menu2');
        } ?></a>
        </div>
        <div class="Navbar__Link Navbar__Link-toggle">
          <i class="fa fa-bars"></i>
        </div>
        <nav class="Navbar__Items">
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu1' ) ); ?>
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu2' ) ); ?>
        </nav>
      </div>
