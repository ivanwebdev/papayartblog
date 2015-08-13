<div class="clear"></div>
<div class="footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer">
                <?php
                /* A sidebar in the footer? Yep. You can can customize
                 * your footer with four columns of widgets.
                 */
                get_sidebar('footer');
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="bottom_footer_content">
                <div class="grid_12 alpha">         
                    <div class="call_us">
                        <?php if (harrington_get_option('inkthemes_topright') != '') { ?>
                            <p> <?php echo stripslashes(harrington_get_option('inkthemes_topright')); ?></p>
                        <?php } else {
                            ?>
                            <p> Call : 1.888.222.5847</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="grid_12 omega">
                    <div class="copyrightinfo">
                        <p class="copyright"><a href="http://wordpress.org/" rel="generator"><?php _e('Powered by WordPress', 'harrington');
                        ?></a>
                            <span class="sep">&nbsp;|&nbsp;</span>
                            <?php
                            printf(__('%1$s by %2$s.', 'harrington'), 'Harrington', '<a href="http://inkthemes.com/" rel="designer">InkThemes</a>');
                            ?></p>
                    </div>	
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>