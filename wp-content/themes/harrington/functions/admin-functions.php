<?php

/**
 * Retrive option value
 * @param type $name Option name
 */


/* ----------------------------------------------------------------------------------- */
/* Add default options after activation */
/* ----------------------------------------------------------------------------------- */
if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php") {
    //Call action that sets
    add_action('after_switch_theme', 'inkthemes_option_setup');
}

/**
 * Theme option setup
 */
function inkthemes_option_setup() {
    //Update EMPTY options
    $of_array = array();
    add_option('inkthemes_options', $of_array);
    $template = inkthemes_get_option('inkthemes_template');
    $saved_options = inkthemes_get_option('inkthemes_options');
    $std = '';
    foreach ($template as $option) {
        if ($option['type'] != 'heading') {
            $id = isset($option['id']) ? $option['id'] : null;
            if (isset($option['std'])) {
                $std = $option['std'];
            }
            $db_option = inkthemes_get_option($id);
            if (empty($db_option)) {
                if (is_array($option['type'])) {
                    foreach ($option['type'] as $child) {
                        $c_id = $child['id'];
                        $c_std = $child['std'];
                        inkthemes_update_option($c_id, $c_std);
                        $of_array[$c_id] = $c_std;
                    }
                } else {
                    inkthemes_update_option($id, $std);
                    $of_array[$id] = $std;
                }
            } else { //So just store the old values over again.
                $of_array[$id] = $db_option;
            }
        }
    }
    inkthemes_update_option('inkthemes_options', $of_array);
}
