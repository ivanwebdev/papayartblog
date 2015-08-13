<?php
if (!function_exists('harrington_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function harrington_setup() {
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on harrington, use a find and replace
         * to change 'harrington' to the name of your theme in all the template files
         */
        load_theme_textdomain('harrington', get_template_directory() . '/languages');
        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');

        /**
         * This theme styles the visual editor with editor-style.css to match the theme style.
         */
        add_editor_style();
        /**
         * Enable support for Post Thumbnails
         */
		 /**
		* Page Title support
		*/
		add_theme_support( 'title-tag' );
        add_theme_support('post-thumbnails');
        add_image_size('post_thumbnail', 600, 250, true);
        //Load languages file
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if (is_readable($locale_file))
            require_once($locale_file);

        /**
         * Set the content width based on the theme's design and stylesheet.
         *
         * Used to set the width of images and content. Should be equal to the width the theme
         * is designed for, generally via the style.css stylesheet.
         */
        if (!isset($content_width))
            $content_width = 590;

        /**
         * Registering custom menu
         */
        register_nav_menu('custom_menu', __('Main Menu', 'harrington'));
    }

    add_action('after_setup_theme', 'harrington_setup');
endif;

/**
 * Adding class for navigation menu
 */
function harrington_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}
add_filter('wp_page_menu', 'harrington_add_menuclass');

/**
 * Navigation menu
 */
function harrington_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'harrington_nav_fallback'));
    else
        harrington_nav_fallback();
}

/**
 * Navigation menu fallback
 */
function harrington_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
            <?php
            wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
            ?>
        </ul>
    </div>
    <?php
}

/**
 * List pages filter for navigation menu
 */
function harrington_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . __('Home', 'harrington') . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . __('Home', 'harrington') . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'harrington_nav_menu_items');

/**
 * Breadcrumbs
 */
function harrington_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<p id="crumbs">';
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo PAGE . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</p>';
}

/**
 * This function thumbnail id and
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function harrington_get_thumbnail($iw, $ih) {
    $permalink = get_permalink();
    $thumb = get_post_thumbnail_id();
    if ($thumb) {
        $image = harrington_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
            print '<a href=' . esc_url($permalink) . '><img class="postimg" src="' . esc_url($image['url']) . '" width="' . $image['width'] . '" height="' . $image['height'] . '" /></a>';
        }
    }
}

/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function harrington_get_image($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $permalink = get_permalink();
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];

        $img_path = harrington_image_resize($img_source, $w, $h);
        if (!empty($img_path['url'])) {
            print '<a href=' . esc_url($permalink) . '><img class="postimg" src="' . esc_url($img_path['url']) . '" width="' . $img_path['width'] . '" height="' . $img_path['height'] . '" /></a>';
        }
    }
}

/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function harrington_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf($posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0'));
}

/**
 * Registering widgets
 */
function harrington_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

/** Register sidebars by running harrington_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'harrington_widgets_init');

/**
 * Pagination
 */
function harrington_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}

/**
 * Enqueueing styles/scripts
 */
function harrington_wp_enqueue_scripts() {
    /**
     * Enqueue styles
     */
    wp_enqueue_style('harrington-style', get_stylesheet_uri());
    wp_enqueue_style('harrington-pretty_photo', get_template_directory_uri() . "/css/prettyPhoto.css", '', '', 'all');
    $custom_css = htmlspecialchars_decode(harrington_get_option('inkthemes_customcss'));
    wp_add_inline_style('harrington-style', $custom_css);

    /**
     * Enqueue scripts
     */
    wp_enqueue_script('harrington-ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));
    wp_enqueue_script('harrington-slippy-js', get_template_directory_uri() . '/js/slippry.js', array('jquery'));
    wp_enqueue_script('harrington-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));
    wp_enqueue_script('harrington-responsive-menu-2', get_template_directory_uri() . '/js/menu/jquery.meanmenu.2.0.min.js', array('jquery'));
    wp_enqueue_script('harrington-responsive-menu-2-options', get_template_directory_uri() . '/js/menu/jquery.meanmenu.options.js', array('jquery'));
    wp_enqueue_script('harrington-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    wp_enqueue_script('harrington-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array('jquery'), '', true);
    if (is_singular() and get_site_option('thread_comments')) {
        wp_print_scripts('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'harrington_wp_enqueue_scripts');

/**
 * Retrive option value
 * @param type $name Option name
 */
function harrington_get_option($name) {
    $options = inkthemes_get_option($name);
    if (isset($options))
        return $options;
}

/**
 * Plugin recommedation notification
 */
require_once(get_template_directory() . '/functions/plugin-activation.php');
require_once(get_template_directory() . '/functions/plugin-notify.php');

/**
 * Defining constants
 */
require_once(get_template_directory() . '/functions/define_template.php');

/**
 * Option framework
 */
require_once(get_template_directory() . '/functions/admin-interface.php');

/**
 * Theme option
 */
require_once(get_template_directory() . '/functions/theme-options.php');

/**
 * Image resizing
 */
require_once(get_template_directory() . '/functions/dynamic-image.php');

/**
 * Customer header
 */
require_once(get_template_directory() . '/functions/custom-header.php' );

/**
 * Registering plugin notification class
 */
add_action('tgmpa_register', 'harrington_plugins_notify');
function inkthemes_get_option($name) {
    $options = get_option('inkthemes_options');
    if (isset($options[$name]))
        return $options[$name];
}

/**
 * Update option value 
 * @param type $name option name to update
 * @param type $value value to update
 */
function inkthemes_update_option($name, $value) {
    $options = get_option('inkthemes_options');
    $options[$name] = $value;
    return update_option('inkthemes_options', $options);
}

/**
 * Deleting option
 * @param type $name option name to delete
 */
function inkthemes_delete_option($name) {
    $options = get_option('inkthemes_options');
    unset($options[$name]);
    return update_option('inkthemes_options', $options);
}
