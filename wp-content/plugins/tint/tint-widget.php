<?php
/*
 * Plugin Name: Tint Widget
 * Plugin URI: http://www.tintup.com
 * Description: Add a Tint to your site. Add and edit in the widgets tab of WordPress or using shortcode.
 * Version: 1.0.4
 * Author: Ryo Chiba
 * Author URI: http://www.ryochiba.com
 *License: GPLv2 or later
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("tint_widget");' ) );

/**
 * Create the widget class and extend from the WP_Widget
 */
 class Tint_Widget extends WP_Widget {

	/**
	 * Set the widget defaults
	 */
	private $widget_title = "Tint Widget";
	private $site_name = "tint";

	private $width = "";
	private $height = "1500";
	private $fitToEdge = "1";
	private $cols = "1";

	private $skip = array();

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {

		parent::__construct(
			'Tint_Widget',// Base ID
			'Tint ',// Name
			array(
				'classname'		=>	'Tint_Widget',
				'description'	=>	__('A widget to add a Tint to your site.', 'framework')
			)
		);

	} // end constructor

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = isset($instance['title']) ? $instance['title'] : '';
		$this->widget_title = apply_filters('widget_title', $title );

		$show_stream = isset($instance['show_stream']) ? $instance['show_stream'] : "1";
		$this->show_stream = ($instance['show_stream'] == "1" ?  True : False);
		$this->site_name = $instance['site_name'];
		$this->height = $instance['height'];
		$this->width = $instance['width'];
		$this->fitToEdge = $instance['fitToEdge'] == "1" ?  True : False;
		$this->autoExtend = $instance['autoExtend'] == "1" ?  True : False;
		$this->cols = $instance['cols'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $this->widget_title )
			echo $before_title . $this->widget_title . $after_title;

		/* Tint Render*/
        $this->render( array('site_name' => $this->site_name,
                             'width' => $this->width,
                             'height' => $this->height,
                             'fitToEdge' => $this->fitToEdge,
                             'autoExtend' => $this->autoExtend,
                             'cols' => $this->cols) );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

    public function render( $args ) {
        $r = wp_parse_args( $args
                            , array('site_name' => 'tint'
                                    ,'width'=> ''
                                    ,'height' => '0'
                                    ,'fitToEdge' => true
                                    ,'autoExtend' => false
                                    ,'cols' => '1'
                                    ) );

        if ( empty( $r['height'] ) )
            $r['height'] = '1500px';
        else
            $r['height'] .= 'px';

        if ( empty( $r['width'] ) )
            $r['width'] = '100%';
        else
            $r['width'] .= 'px';

        $params = '';

        if($r['fitToEdge']){
        	$params .= 'data-fitToEdge="true" ';
        }

        if($r['autoExtend']){
        	$params .= 'data-expand="true" ';
        }

        if($r['cols']){
        	$params .='data-columns="'.$r['cols'].'" ';
        }

        ?>

        <?php
        if  ( true ){

        	// accept both a url site_name and a regular site_name
        	if( strrpos($r['site_name'], "/") !== FALSE ){
        		$site_name_tmp = explode("/", $r['site_name']);
        		$r['site_name'] = $site_name_tmp[count($site_name_tmp) - 1];
        	}

        	$params .= 'data-id="'.$r['site_name'].'" ';

        	wp_enqueue_script( 
			     'tintembed'
			    ,'https://d36hc0p18k1aoc.cloudfront.net/public/js/modules/tintembed.js'
			);
            ?>
            <div class="tintup" style="height:<?php echo $r['height']; ?>; width:<?php echo $r['width']; ?>;" <?php echo $params;?> >
            <a href="https://www.tintup.com" style="width:118px;height:31px;background-image:url(//d33w9bm0n1egwm.cloudfront.net/assets/logos/poweredbytintsmall.png);position:absolute;bottom:0;right: 20px;text-indent: -9999px;z-index:9;">powered by Tint</a>
            </div>
            <?php
        }
    }

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['site_name'] = strip_tags( $new_instance['site_name'] );

		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		$instance['fitToEdge'] = strip_tags( $new_instance['fitToEdge'] );
		$instance['autoExtend'] = strip_tags( $new_instance['autoExtend'] );
		$instance['cols'] = strip_tags( $new_instance['cols'] );

		return $instance;
	}

	/**
	 * Create the form for the Widget admin
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'site_name' => $this->site_name,
			'width' => $this->width,
			'height' => $this->height,
			'fitToEdge' => $this->fitToEdge,
			'autoExtend' => $this->autoExtend,
			'cols' => $this->cols
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <h4 style="border-bottom: solid 1px #CCC;">Tint Settings</h4>

		<!-- Page name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'site_name' ); ?>"><?php _e('Site name', 'framework') ?>: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'site_name' ); ?>" name="<?php echo $this->get_field_name( 'site_name' ); ?>" value="<?php echo $instance['site_name']; ?>" />
            <br><small>http://www.tintup.com/[site_name]</small>
		</p>

		<!-- Height: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height', 'framework') ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" size="5" />px
			<br><small>(recommended 1500 pixels height)</small>
		</p>

  
		<!-- Width: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width', 'framework') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" size="5" />px
			<br><small>(default: 100%)</small>
		</p>

		<!-- fitToEdge: Checkbox Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'fitToEdge' ); ?>"><?php _e('Fit To Edge', 'framework') ?>: </label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'fitToEdge' ); ?>" name="<?php echo $this->get_field_name( 'fitToEdge' ); ?>" value="1" <?php echo ($instance['fitToEdge'] == "1" ? "checked='checked'" : ""); ?> />
		</p>

		<!-- autoExtend: Checkbox Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoExtend' ); ?>"><?php _e('Auto Extend', 'framework') ?>: </label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'autoExtend' ); ?>" name="<?php echo $this->get_field_name( 'autoExtend' ); ?>" value="1" <?php echo ($instance['autoExtend'] == "1" ? "checked='checked'" : ""); ?> />
		</p>

		<!-- cols: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cols' ); ?>"><?php _e('cols', 'framework') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'cols' ); ?>" name="<?php echo $this->get_field_name( 'cols' ); ?>" value="<?php echo $instance['cols']; ?>" size="5" />
			<br><small>(default: 1 column)</small>
		</p>
  

	<?php
	}
 }


/**
 * Display the Tint embed
 *
 * The list of arguments is below:
 *     'site_name' (string) - You tint site name
 *     'height' (int) - height of the iframe
 *
 * @param string|array $args Optional. Override the defaults.
 */ 
function tint_embed( $args ) {
    $rm_widget = new Tint_Widget();
    $rm_widget->render( $args );
}

/**
 * Shortcode to diplay Tint in your site.
 * 
 * The list of arguments is below:
 *     'site_name' (string) - You tint site name
 *                    Default: tint
 *     'height' (int) - height of the iframe
 *                    Default: 1500
 * 
 * Usage: 
 * [tint site_name="tint"]
 */
function tint_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'site_name' => 'tint',
        'height' => '1500',
        'width'=> '',
        'fitToEdge' => true,
        'autoExtend' => true,
        'cols'	=> '1'
    ), $atts ) );

    $rm_widget = new Tint_Widget();
    
    $rm_widget->render( array(
        'site_name' => $site_name,
        'height' => $height,
        'width' => $width,
        'fitToEdge' => $fitToEdge,
        'autoExtend' => $autoExtend,
        'cols'	=> $cols
    ) );
}
add_shortcode( 'tint', 'tint_shortcode' );

?>
