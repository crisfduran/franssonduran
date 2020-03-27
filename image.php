<?php
/**
 * The template for displaying all image attachements.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Humescores
 */

get_header(); ?>

<?php the_post_navigation(array('prev_text' => '<div class="nav-parent">'. __('Tillbaks till', 'franssonduran') .' %title</div>')); ?>

    <figure class="entry-attachment">

        <?php $image_size = apply_filters( 'wporg_attachment_size', 'full' );
        echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
        <?php if ( has_excerpt() ) : ?>

            <div class="entry-caption">
                <?php the_excerpt(); ?>
            </div><!-- .entry-caption -->
        <?php endif; ?>
    </figure><!-- .entry-attachment -->
<?php


get_footer();