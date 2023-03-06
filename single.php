<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _displayfly
 */

get_header();
// echo is_page('single.php');
get_template_part('template-parts/section-info');
?>

    <main id="primary" class="site-main">
        <div class="left-side">
            <div class="left-side__title">
                <?php echo the_title();?>
            </div>
            <div class="left-side__details">
                <p>
                    by <span>
                    <?php 
                    $x = get_post(); 
                    echo the_author_meta('display_name', $x->post_author);
                    ?>
                    </span>
                    on <?php echo get_the_date();?>
                </p>
                <p class="left-side__p">
                    <span> <?php echo get_comments_number($x->ID)."  ";?>comments</span>
                </p>
            </div>

            <div class="left-side__excerpt">
                <?php echo the_excerpt();?>
            </div>

            <div class="left-side__thumbnail">
                <?php the_post_thumbnail('large');?>
            </div>

            <div class="left-side__content">
                <p>
                    <?php echo the_content();?>
                </p>
                <p>
                    TAGS: <?php
					$type = $x->post_type.'_tag';
					$x = get_the_terms($x->ID,$type);
					if(is_array($x) && sizeof($x)>=1){
						for($i=0;$i<sizeof($x);$i++){
							?>
							<span class='left-side__tags' >
								<?php echo ' '.$x[$i]->name.' ,';?>
							</span>
							<?php
						}
					}
                    ?>
                </p>
            </div>

            <div class="left-side__comment">
				<p class="left-side__commhead">Comments</p>
                <?php comments_template();?>
            </div>

        </div>

        <div class="right-side">
             <?php get_sidebar();?>
        </div>

    </main><!-- #main -->
<?php

get_footer();
