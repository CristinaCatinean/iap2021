<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package viburno
*/

get_header();
?>

<div class="container">

  <main id="site-content" role="main" class="col-70 grid-top mxy-1 pxy-1">
    <div class="grid-top">
    <?php if ( is_search() ) { /* if is search  */ ?>
      <h1 class="mb-3 mt-2"><?php esc_html_e('Result for:', 'viburno'); ?> <strong><i><?php echo $s ?></i></strong></h1>
      <?php } else if ( is_category() || is_tag() ) {  /* if is tag or category */ ?>
        <h1 class="mb-3 mt-2"><?php echo single_cat_title() ?></h1>
      <?php } else if ( is_home() ){  /* if is home */  ?>
        <h1 class="mb-3 mt-2"><?php bloginfo('name'); ?></h1>
      <?php } else if ( is_date() ){ /* if is date */ ?>
        <h1 class="mb-3 mt-2"><?php single_month_title(' '); ?></h1>
      <?php } else if ( is_archive() ){ /* if archive */?>
        <h1 class="mb-3 mt-2"><?php post_type_archive_title(); ?></h1>
      <?php } ?>




        <?php if (have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>


            <article <?php post_class(); ?>>

              <h3>
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </h3>

              <a href="<?php the_permalink(); ?>">

                <?php the_post_thumbnail('large', array('class' => 'img-res','alt' => get_the_title())); /* insert image with title */ ?>

              </a>

              <div class="content-blog">

                <?php the_excerpt(); ?>

                <span class="small">
                  <?php the_time(get_option('date_format')); ?> &nbsp; <?php the_category(', '); ?>
                </span>

              </div>

            </article>

          <?php endwhile; ?>

          <div class="pagination clearfix">

            <?php
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $wp_query->max_num_pages
            ) );
            ?>

          </div>

        <?php else : ?>

          <h3><?php esc_html_e('Sorry, no posts matched your criteria.', 'viburno'); ?></h3>
          <p><?php esc_html_e('Try to make a search...', 'viburno'); ?></p>

          <?php get_search_form(); ?>

        <?php endif; ?>

      </div>

    </main>

    <aside id="site-complementary" role="complementary" class="mxy-1 pxy-1 grid-between">

      <?php get_sidebar(); ?>

    </aside>

  </div>
  <?php get_footer(); ?>
