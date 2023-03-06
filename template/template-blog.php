<?php
/**
 * Template Name: Blog Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage designfly
*/
get_header();
get_template_part('template-parts/section-info');
// important function
echo get_option('posts_per_page');
?>

<main id="primary" class="site-main">
        <div class="left-side">
            <div class="left-side__title">
                LET'S BLOG
            </div>

            <div class="left-side__blogs">
                <!-- here while loop will come  -->
                <?php 
                $portfolioquery = new WP_Query(array(
                    'post_type'=>array('portfolio','post'),
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                ));
                while ($portfolioquery->have_posts()) {
                    $portfolioquery->the_post();
                    ?>
                    <div class="left-side_posttitle">
                        <?php echo the_title();
                        // echo get_the_ID();
                        ?>
                    </div>

                    <div class="left-side__content">
                        <div class="left-side__img">
                            <?php get_the_post_thumbnail()?>
                        </div>
                        <div class="left-side__info">

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

        <div class="right-side">
             <?php get_sidebar();?>
        </div>

</main><!-- #main -->
<?php
designfly_pagination();
get_footer();