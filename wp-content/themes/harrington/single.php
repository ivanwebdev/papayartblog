<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<div class="page-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-content">
                <div class="page_heading_wrapper">
                    <div class="page_heading single"><?php harrington_breadcrumbs(); ?></div>
                </div>
                <div class="grid_17 alpha">
                    <div class="content-bar">            
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <!--Start post-->
                                <div class="post">			
                                    <h1 class="post_title"><?php the_title(); ?></h1>
                                    <ul class="post_meta">
                                        <li class="posted_on"><span></span><?php echo get_the_time('M, d, Y') ?></li>
                                        <li class="posted_by"><span></span><?php the_author_posts_link(); ?></li>
                                        <li class="posted_in"><span></span><?php the_category(', '); ?></li>
                                        <li class="post_comment"><?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></li>
                                    </ul>
                                    <div class="post_content"> 
                                        <?php the_content(); ?>
                                    </div>				
                                    <?php if (has_tag()) { ?>
                                        <div class="tag">
                                            <?php the_tags(POST_TAGGED_WITH, ','); ?>
                                        </div>
                                    <?php } ?>				
                                </div>
                                <?php
                            endwhile;
                        else:
                            ?>
                            <div class="post">
                                <p>
                                    <?php echo SORRY_NO_POST_MATCHED; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <!--End post-->
                        <!--End Post-->	
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_post_link('%link', '<span class="meta-nav">' . PREV_POST . '</span>'); ?>
                            </span> <span class="nav-next">
                                <?php next_post_link('%link', '<span class="meta-nav">' . NEXT_POST . '</span>'); ?>
                            </span> </nav>
                        <!--Start Comment box-->
                        <?php comments_template(); ?>
                        <!--End Comment box-->			
                    </div>
                </div>
                <div class="grid_7 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>