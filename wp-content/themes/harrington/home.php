<?php
/**
 * The template for displaying front page pages.
 *
 * */
?>
<?php get_header(); ?> 
<div class="home_container">
    <div class="container_24">
        <div class="grid_24">

            <div class="slider_container">
                <div class="demo_block">
                    <ul id="demo1">
                        <!--First Slider Strat Here-->
                        <?php
                        //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring1 = harrington_get_option('inkthemes_slideimage1');
                        $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring1)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        ?>
                        <?php if ($check_img_ofset == 0 && harrington_get_option('inkthemes_slideimage1') != '') { ?>
                            <li class="video"><?php echo harrington_get_option('inkthemes_slideimage1'); ?></li>
                        <?php } else { ?>  
                            <li><?php if (harrington_get_option('inkthemes_slideimage1') != '') { ?>
                                    <a href="<?php
                                    if (harrington_get_option('inkthemes_Sliderlink1') != '') {
                                        echo harrington_get_option('inkthemes_Sliderlink1');
                                    } else {
                                        echo '#';
                                    }
                                    ?>"><img src="<?php echo harrington_get_option('inkthemes_slideimage1'); ?>" alt="<div class='slider_caption'><?php if (harrington_get_option('inkthemes_sliderheading1') != '') { ?>
                                               <h1><?php echo stripslashes(harrington_get_option('inkthemes_sliderheading1')); ?></h1><?php } else { ?><h1>Video chat with a friend, ping a colleague, or give someone a ring - all without leaving your inbox</h1><?php } ?> <?php if (harrington_get_option('inkthemes_slider_button1') != '') { ?>
                                               <a class='slider-readmore' href='<?php
                                               if (harrington_get_option('inkthemes_Sliderlink1') != '') {
                                                   echo harrington_get_option('inkthemes_Sliderlink1');
                                               }
                                               ?>'><?php echo stripslashes(harrington_get_option('inkthemes_slider_button1')); ?></a>
                                           <?php } else { ?>
                                               <a class='slider-readmore' href='<?php
                                               if (harrington_get_option('inkthemes_Sliderlink1') != '') {
                                                   echo harrington_get_option('inkthemes_Sliderlink1');
                                               }
                                               ?>'><?php echo READ_MORE ?></a>
                                           <?php } ?></div>"></a>	    
                                    <?php } else { ?>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/image-1.jpg" alt="<div class='slider_caption'><h1>Video chat with a friend, ping a colleague, or give someone a ring - all without leaving your inbox</h1>
                                                     <a href='#'>Read More</a></div>"></a>
                                    <?php } ?>		
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="clear"></div>
            <!-- Blog Section -->
            <div class="page-content">

                <div class="grid_17 alpha">
                    <div class="content-bar">   
                        <?php
                        $limit = get_option('posts_per_page');
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        query_posts('showposts=' . $limit . '&paged=' . $paged);
                        $wp_query->is_archive = true;
                        $wp_query->is_home = false;
                        ?>
                        <!--Start Post-->
                        <?php get_template_part('loop', 'blog'); ?>   
                        <div class="clear"></div>
                        <?php harrington_pagination(); ?> 
                    </div>
                </div>
                <div class="grid_7 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
            <!-- Blog Section -->
        </div>
        <div class="clear"></div>
    </div>
</div>	
<?php get_footer(); ?>