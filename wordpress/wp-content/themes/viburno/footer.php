<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viburno
 */

?>

<footer id="site-footer" role="contentinfo" class="footer container pxy-1">
  <div class="grid-top">
    <div class="col-33">
       <a class="animate" href="<?php echo esc_url_raw(home_url()); ?>" title="<?php esc_attr_e( 'Home', 'viburno' ); ?>">    
       <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
         if ( has_custom_logo() ) {
            echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        }
        ?>
        </a>

      <p>&copy; Copyright
        <?php
        echo date_i18n( 'Y' );
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      </p><!-- .footer-copyright -->

    </div>
    <div class="col-33">
      <div class="social">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'social',
            'menu_id'        => 'social-menu',
          )
        );
        ?>
      </div>
    </div>
    <div class="col-33">
      <!-- Menu -->

      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer',
          'menu_id'        => 'footer-menu',
        )
      );
      ?>

    </div>

  </div><!-- end grid-top -->
  <div class="site-info small aligncenter">

    <span class="footer-copyright">
      <?php
      printf(
        /* translators: %s: WordPress. */
        esc_html__( 'Proudly powered by %s', 'viburno' ),
        '<a href="' . esc_url( __( 'https://wordpress.org/', 'viburno' ) ) . '">WordPress</a>'
      );
      ?>
      -
      <?php
      /* Translators: $s = name of the theme */
      printf( esc_html_x( 'Theme %s', 'Translators: $s = name of the theme developer', 'viburno' ), '<a href="' . esc_url( __( 'url viburno', 'viburno' ) ) . '">' . esc_html__( 'viburno', 'viburno' ) . '</a>' ); ?>
    </span>
  </div><!-- .site-info -->

</footer>
<?php wp_footer(); ?>
</body>
</html>
