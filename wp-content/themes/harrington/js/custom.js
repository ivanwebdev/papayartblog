//Menu Init
ddsmoothmenu.init({
	mainmenuid: "menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
//Slippry Init	
				jQuery(document).ready(function(){
				jQuery("#demo1").slippry({				
					// transitions
					transition: 'kenburns',
					kenZoom: 140,
					useCSS: true,
					speed: 1000,					
					auto: true,
					preload: 'visible',
					controls: true,
					pause: Number(jQuery("#txt_slidespeed").val())
				});					
			});
//BxSlider Init
			jQuery(document).ready(function(){
			jQuery('.bxslider').bxSlider({
			  mode: 'vertical',
			  slideMargin: 5,
			  autoControls: true
			});
			});