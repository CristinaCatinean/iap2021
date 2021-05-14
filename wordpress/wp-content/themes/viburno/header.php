<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package viburno
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo('description');?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <a class="skip-link" href="#site-content"><?php esc_html_e( 'Skip to the content', 'viburno' ); ?></a>
  <header id="site-header" role="banner">
    <div class="header container">
      <div class="branding grid-center">
       <a class="animate" href="<?php echo esc_url_raw(home_url()); ?>" title="<?php esc_attr_e( 'Home', 'viburno' ); ?>">
       <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
         if ( has_custom_logo() ) {
            echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        }
        ?>
        </a>
        <div class="header-title grid-center">

          <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php esc_attr_e( 'Home', 'viburno' ); ?>"><?php bloginfo( 'name' ); ?></a></div>
          <?php
          $ilex_description = get_bloginfo( 'description', 'display' );
          if ( $ilex_description || is_customize_preview() ) :
            ?>
            <div class="site-description"><?php echo $ilex_description; /* WPCS: xss ok. */ ?></div>
          <?php endif; ?>
        </div><!-- .site-titoli -->

      </div><!-- .branding -->

      <div class="menu grid-center">

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'viburno' ); ?></button>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
            )
          );
          ?>
        </nav><!-- #site-navigation -->
      </div>
      <div class="search grid-center ">

        <?php get_search_form(); ?>

      </div><!-- .search-banner -->

      </div>
    </div>
  </header>


  <?php if ( get_header_image() ) : ?>

  <div class="header-image" style="background:url(<?php header_image(); ?>) no-repeat center center; background-size: cover">
  </div>

  <?php endif; ?>
