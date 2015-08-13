<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!--Start post-->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post_thumbnil">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <?php harrington_get_thumbnail(760, 320); ?>
                <?php } else { ?>
                    <?php harrington_get_image(760, 320); ?> 
                    <?php
                }
                ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span class="image_link"></span></a>
            </div>
            <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <ul class="post_meta">
                <li class="posted_on"><span></span><?php echo get_the_time('M, d, Y') ?></li>
                <li class="posted_by"><span></span><?php the_author_posts_link(); ?></li>
                <li class="posted_in"><span></span><?php the_category(', '); ?></li>
                <li class="post_comment"><?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></li>
            </ul>
            <div class="post_content"><?php the_excerpt(); ?><a class="read_more" href="<?php the_permalink() ?>"><?php echo CONTINUE_READING_DOTS; ?></a>
            </div>				 
        </div>
        <?php
    endwhile;
else:
    ?>
    <div class="post">
        <p>
            <?php echo SORRY_NO_POSTS_MATCHED_YOUR_CRITERIA; ?>
        </p>
    </div>
<?php endif; ?>
<div class="clear"></div>
<!--End post-->