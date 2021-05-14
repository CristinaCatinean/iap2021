<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package viburno
 */

get_header();
?>

<div class="container">

  <main id="site-content" role="main"  class="col-70 mxy-1 pxy-1">


    <?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

      <!-- loop content -->

      <article <?php post_class(); ?>>

        <h1 class="mb-3 mt-2 aligncenter"><?php the_title(); ?></h1>

        <p class="small aligncenter"> <?php the_time(get_option('date_format')); ?> by <?php the_author_posts_link(); ?> - <?php the_category(', ');?></p>

        <?php
        if(has_post_thumbnail()) {
          the_post_thumbnail('large', array( 'class' => 'img-res', 'alt' => get_the_title() ));
        }
        ?>
        <div class="entry-content">
          <?php
          the_content(
            sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'viburno' ),
                array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
              get_the_title()
              )
            );
            ?>

            <?php wp_link_pages('pagelink=Page %'); ?>

            <?php the_tags(); ?>

            <hr>

            <?php
            the_post_navigation(
              array(
                'prev_text' => '<span class="nav-title"> %title</span>',
                'next_text' => '<span class="nav-title">%title </span>',
              )
            );
            ?>

            <hr>

            <div class="comments">

              <?php comments_template(); ?>

            </div>
        </div>

      </article>

      <?php endwhile; ?>

    <?php else : ?>
      <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'viburno'); ?></p>
    <?php endif; ?>

  </main>

  <aside id="site-complementary" role="complementary" class="mxy-1 pxy-1 grid-between">

    <?php get_sidebar(); ?>

  </aside>

</div>
<?php get_footer(); ?>
