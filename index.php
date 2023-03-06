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
 * @package _displayfly
 */

get_header();
get_template_part('template-parts/section-info');
// echo get_page_template();
?>

<main id="primary" class="site-main">
		<div class="left-side">
		<div class="blog-page-title">
				<p>LET'S BLOG</p>
			</div>
		<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();
			?>
				<div class="blog-element">
					<a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php the_title(); ?></h2></a>
					<div class="blog-content">
						<div class="blog-item">
							<?php the_post_thumbnail(array(220, 153)); ?>
						</div>
						<div class="blog-content-des">
							<div class="single-post-info">
								<p>by <span class="author-name"><?php the_author(); ?></span> on <?php echo get_the_date(); ?></p>
								<p><span class="comment-count"><?php comments_number('No comment', '1 comment', '% comments'); ?></span></p>
							</div>
							<p class="post-short-des"><?php the_excerpt(); ?></p>
							<a class="post-content-ind" href="<?php the_permalink(); ?>" target="_blank">Read More</a>
						</div>
					</div>
				</div>
			<?php
			endwhile;
			?>
			<?php aquila_pagination(); ?>
		</div> <!-- left -side -->

        <div class="right-side">
             <?php get_sidebar();?>
        </div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
