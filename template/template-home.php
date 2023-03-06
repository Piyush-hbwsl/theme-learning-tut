<?php
/**
 * Template Name: Home Template
 * Template Post Type: page
 *
 * @package    WordPress
 * @subpackage designfly
 */
get_header();
$url = get_template_directory_uri();
// echo basename(get_page_template( ));
?>

<div class="slider">
    <div class="slider__arrows">
        <img id="prev" src=<?php echo $url."/assets/prev.png" ?> alt="this is right arrow">
    </div>

    <div class="slider__box">

        <div class="slider__slides">
            <div class="slider__img">
                <img src=<?php echo $url."/assets/slider-image.png"?> alt="this us slider image">
            </div>
            <div class="slider__head">
                Gearing up the ideas
            </div>
            <div class="slider__content">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis ut odio expedita ea dignissimos. Officia, ad!
            </div>
        </div>

        <div class="slider__slides">
            <div class="slider__img">
                <img src=<?php echo $url."/assets/slider-image.png"?> alt="this us slider image">
            </div>
            <div class="slider__head">
                Tearing up the ideas
            </div>
            <div class="slider__content">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis ut odio expedita ea dignissimos. Officia, ad!
            </div>
        </div>

        <div class="slider__slides">
            <div class="slider__img">
                <img src=<?php echo $url."/assets/slider-image.png"?> alt="this us slider image">
            </div>
            <div class="slider__head">
                Cheering up for the ideas
            </div>
            <div class="slider__content">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis ut odio expedita ea dignissimos. Officia, ad!
            </div>
        </div>
    </div>


    <div class="slider__arrows ">
        <img id="next" src=<?php echo $url."/assets/next.png" ?> alt="this is right arrow">
    </div>
</div>

<?php 
get_template_part('template-parts/section-info')
// this section will bring us top 6 newly published post related to portfolio and display
// on the front end on home page
?>
<div class="section-getposts">

    <div class="section-getposts__head">
        D'SIGN IS THE SOUL
    </div>
    <hr>

    <div class="section-getposts__posts">
        <?php
        $wpportfolio    = array(
            'post_type'   => 'Portfolio',
            'post_status' => 'publish',
            'posts_per_page'=>6,
        );
        $portfolioquery = new Wp_Query($wpportfolio);
        while ($portfolioquery->have_posts()) {
            $portfolioquery->the_post();
            $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        ?>
        <div class="section-getposts__child">
            <a href="<?php echo $imagepath[0]; ?>" data-lightbox="image-1">
                <img class="hover__image" src="<?php echo $imagepath[0]; ?>" alt="gallery">
                <!-- <?php $actual__img__path = $imagepath[0]; ?> -->

                <!-- <script>console.log("yo")</script> -->
            </a>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- <hr id="posts_hr"> -->
</div>

<?php get_footer();?>