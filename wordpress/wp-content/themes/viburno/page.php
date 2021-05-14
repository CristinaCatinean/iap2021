<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package viburno
*/

get_header();
?>

<div class="container">

<main id="site-content" role="main" class="col-70 mxy-1 pxy-1">

  <?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

    <!-- loop content -->

    <article <?php post_class(); ?>>

      <?php if ( has_post_thumbnail() ) { ?>

        <?php the_post_thumbnail('large', array('class' => 'img-res','alt' => get_the_title())); ?>

      <?php } ?>

      <div class="mb-3 mt-2"><h1 class="aligncenter"><?php the_title(); ?></h1></div>

       <div class="entry-content"><?php the_content(esc_html__('Read More...', 'viburno'));?></div>

    </article>

  <?php endwhile; ?>

<?php else : ?>
  <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'viburno'); ?></p>
<?php endif; ?>

</main>

  <aside  id="site-complementary" role="complementary" class="mxy-1 pxy-1 grid-between">

    <?php get_sidebar(); ?>

  </aside>

</div>
<?php get_footer(); ?>
