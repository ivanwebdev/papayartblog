<div class="grid_6 alpha">
    <div class="footer_widget first">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
            <h4>Footer Widgets</h4>
            <p>Footer is widgetized. To setup the footer, drag the required Widgets in Appearance -> Widgets Tab in the First, Second, Third and Fourth Footer Widget Areas.</p>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6">
    <div class="footer_widget">
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
            <h4>Latest Posts</h4>
            <ul>
                <li><a href="#">Entertainment</a></li>
                <li><a href="#">Following problems</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Music And Sports</a></li>
            </ul>
        <?php endif; ?> 
    </div>
</div>
<div class="grid_6">
    <div class="footer_widget">
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
            <h4>Search Anything</h4>
            Address: Magnet Brains 10 No. Arera Colony, Bhopal India<br/>
            Contact No : +91-9926465653<br/>     
            Email : support@inkthemes.com
        <?php endif; ?> 
    </div>
</div>
<div class="grid_6 omega">
    <div class="footer_widget last">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <h4>Social Icons</h4>
            <ul class="tt-wrapper">
                <?php if (inkthemes_get_option('inkthemes_dribbble') != '') { ?>
                    <li><a class="db" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_dribbble'); ?>"><span>Dribbble</span></a></li>
                <?php } ?>				
                <?php if (inkthemes_get_option('inkthemes_facebook') != '') { ?>
                    <li><a class="fb" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_facebook'); ?>"><span>Facebook</span></a></li>
                <?php } ?>    
                <?php if (inkthemes_get_option('inkthemes_intagram') != '') { ?>
                    <li><a class="ins" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_intagram'); ?>"><span>Instagram</span></a></li>
                <?php } ?>
                <?php if (inkthemes_get_option('inkthemes_google') != '') { ?>
                    <li><a class="gp" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_google'); ?>"><span>Google Plus</span></a></li>
                <?php } ?>
                <?php if (inkthemes_get_option('inkthemes_pinterest') != '') { ?>
                    <li><a class="pn" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_pinterest'); ?>"><span>Pinterest</span></a></li>
                <?php } ?>
                <?php if (inkthemes_get_option('inkthemes_twitter') != '') { ?>
                    <li><a class="tw" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_twitter'); ?>"><span>Twitter</span></a></li>
                <?php } ?>  
                <?php if (inkthemes_get_option('inkthemes_rss') != '') { ?>
                    <li><a class="rss" target="_blank" href="<?php echo inkthemes_get_option('inkthemes_rss'); ?>"><span>Rss</span></a></li>
                <?php } ?> 
            </ul>
            <form class="searchform" action="#" method="get">
                <input onfocus="if (this.value == 'Search') {
                                this.value = '';
                            }" onblur="if (this.value == '') {
                                        this.value = 'Search';
                                    }"  value="Search" type="text" name="s" id="s" />
                <input type="submit" value="" name="submit"/>
            </form>
        <?php endif; ?> 
    </div>
</div>