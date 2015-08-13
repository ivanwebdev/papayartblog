<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Harrington
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses harrington_header_style()
 * @uses harrington_admin_header_style()
 * @uses harrington_admin_header_image()
 *
 * @package Forefront
 */
function harrington_custom_header_setup() {
    $args = array(
        'default-image' => '',
        'default-text-color' => '050705',
        'width' => 330,
        'height' => 72,
        'flex-height' => true,
        'flex-width' => true,
        'wp-head-callback' => 'harrington_header_style',
        'admin-head-callback' => 'harrington_admin_header_style',
        'admin-preview-callback' => 'harrington_admin_header_image',
    );

    $args = apply_filters('harrington_custom_header_args', $args);

    if (function_exists('wp_get_theme')) {
        add_theme_support('custom-header', $args);
    } else {
        // Compat: Versions of WordPress prior to 3.4.
        define('HEADER_TEXTCOLOR', $args['default-text-color']);
        define('HEADER_IMAGE', $args['default-image']);
        define('HEADER_IMAGE_WIDTH', $args['width']);
        define('HEADER_IMAGE_HEIGHT', $args['height']);
    }
}

add_action('after_setup_theme', 'harrington_custom_header_setup');

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @todo Remove this function when WordPress 3.6 is released.
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package Forefront
 */
if (!function_exists('get_custom_header')) {

    function get_custom_header() {
        return (object) array(
                    'url' => get_header_image(),
                    'thumbnail_url' => get_header_image(),
                    'width' => HEADER_IMAGE_WIDTH,
                    'height' => HEADER_IMAGE_HEIGHT,
        );
    }

}

if (!function_exists('harrington_header_style')) :

    /**
     * Styles the header image and text displayed on the blog
     *
     * @see harrington_custom_header_setup().
     */
    function harrington_header_style() {

        // If no custom options for text are set, let's bail
        // get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
        if (HEADER_TEXTCOLOR == get_header_textcolor())
            return;
        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
        <?php
// Has the text been hidden?
        if (!display_header_text()) :
            ?>
                .site-title,
                .site-description {
                    position: absolute;
                    clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
                    clip: rect(1px, 1px, 1px, 1px);
                }
            <?php
// If the user has set a custom color for the text use that
        else :
            ?>
                .site-title a,
                .site-description {
                    color: #<?php echo get_header_textcolor(); ?>;
                }
        <?php endif; ?>
        </style>
        <?php
    }

endif; // harrington_header_style

if (!function_exists('harrington_admin_header_style')) :

    /**
     * Styles the header image displayed on the Appearance > Header admin panel.
     *
     * @see harrington_custom_header_setup().
     */
    function harrington_admin_header_style() {
        ?>
        <style type="text/css">
            .appearance_page_custom-header #headimg {
                border: none;
                min-height: 30px;
            }
            <?php if (!display_header_text()) : ?>
                #headimg h1 {
                    font-family: "Open Sans", Helvetica, Arial, sans-serif;
                    position: absolute !important;
                    clip: rect(1px 1px 1px 1px); /* IE7 */
                    clip: rect(1px, 1px, 1px, 1px);
                }
            <?php endif; ?>
            #headimg h1 {
                font-size: 22px;
                font-weight: 700;
                letter-spacing: -0.025em;
                line-height: 1.0909090909;
                margin: 0;
            }
            #headimg h1 a {
                text-decoration: none;
            }
            #headimg img {
                height: auto;
                margin-bottom: 12px;
                max-width: 330px;
                vertical-align: middle;
            }
        </style>
        <?php
    }

endif; // harrington_admin_header_style

if (!function_exists('harrington_admin_header_image')) :

    /**
     * Custom header image markup displayed on the Appearance > Header admin panel.
     *
     * @see harrington_custom_header_setup().
     */
    function harrington_admin_header_image() {
        ?>
        <div id="headimg">
            <?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
            <?php
            $header_image = get_header_image();
            if (!empty($header_image)) :
                ?>
                <img src="<?php echo esc_url($header_image); ?>" alt="" />
            <?php endif; ?>
            <h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        </div>
        </div>
        <?php
    }
endif; // harrington_admin_header_image