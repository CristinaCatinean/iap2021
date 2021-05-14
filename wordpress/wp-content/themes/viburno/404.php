<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package viburno
 */

get_header();
?>
<div class="grid-top container">

  <main id="site-content" role="main"  class="col-70 mxy-1 pxy-1">

    <article <?php post_class(); ?>>

      <h1 class="error mb-3 mt-2"><?php esc_html_e( '404 Error', 'viburno' ); ?></h1>

      <h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'viburno' ); ?></h2>

      <p><?php esc_html_e( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'viburno' ); ?></p>

      <?php get_search_form(); ?>

    </article>

  </main>

  <aside id="site-complementary" role="complementary" class="mxy-1 pxy-1 grid-between">

    <?php get_sidebar(); ?>

  </aside>

</div>
<?php get_footer(); ?>
