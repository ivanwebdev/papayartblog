<?php function thb_share( $atts, $content = null ) {
    $a = shortcode_atts(array(
       	'text' => 'Share',
       	'facebook'	=> false,
       	'twitter'	=> false,
       	'pinterest'	=> false
    ), $atts);
  $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
  $out = '<a href="#product_share" class="btn large" id="share-post-link" data-fb="'.($a["facebook"] == "true" ? "true" : "false").'" data-tw="'.($a["twitter"] == "true" ? "true" : "false").'" data-pi="'.($a["pinterest"] == "true" ? "true" : "false").'">'.$a["text"].'</a>
  <div class="share_container">
  	<div class="spacer"></div>
  	<div class="vcenter">
  		<aside id="product_share">
  			<h6>'. __('SHARE', THB_THEME_NAME).'</h6>
  			<div class="placeholder" data-url="'.get_the_permalink().'" data-text="'. get_the_title().'" data-media="'. $image[0].'"></div>
  		</aside>
  	</div>
  </div>';
  return $out;
}
add_shortcode('thb_share', 'thb_share');
