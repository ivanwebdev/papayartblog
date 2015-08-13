<?php
	$site_bars = (isset($_GET['site_bars']) ? htmlspecialchars($_GET['site_bars']) : ot_get_option('site_bars', 'on'));
	$header_style = (isset($_GET['header_style']) ? htmlspecialchars($_GET['header_style']) : ot_get_option('header_style', 'style1'));
	$footer_style = (isset($_GET['footer_style']) ? htmlspecialchars($_GET['footer_style']) : ot_get_option('footer_style', 'footer-standard'));
	$footer_content = (isset($_GET['footer_content']) ? htmlspecialchars($_GET['footer_content']) : ot_get_option('footer_content', 'footer-icons'));
?>
<div class="f-menu">
<div class="f-first" style="float:left;">
<li><a href="http://papayaart.com/art">ABOUT US</a></li>
<li><a href="http://papayaart.com/whsle" target="_self">WHOLESALE</a></li>
<li><a href="http://papayaart.com/contact-us">CONTACT US</a></li>
</ul>
</div>
<div class="f-second" style="float:left;">
<li><a href="http://papayaart.com/gift-cards.html">GIFT CARDS</a></li>
<li><a href="http://www.papayablog.com" target="_blank">BLOG</a></li>
<li><a href="https://papayaart.com/wishlist">WISH LIST</a></li>
</ul>
</div>
<div class="f-third" style="float:left;">
<li><a href="https://papayaart.com/customer-service">CUSTOMER SERVICE</a></li>
<li><a href="https://papayaart.com/sales/order/history" target="_self">ORDER STATUS</a></li>
</ul>
</div>
<div class="f-fourth" style="float:left;">
<li><a href="http://papayaart.com/shipping-returns">SHIPPING &amp; RETURNS</a></li>
<li><a href="http://papayaart.com/privacy-policy">PRIVACY POLICY</a></li>
</ul>
</div>
</div>
		</div><!-- End role["main"] -->

		
	<?php if (ot_get_option('footer') != 'off') { ?>
	<!-- Start Footer -->
	<footer id="footer" role="contentinfo">
		<div class="row full-width-row">	
			<!-- <div class="small-12 columns social-links">
				<?php if($footer_content == 'footer-icons') {  ?>
					<?php do_action( 'thb_social' ); ?>

				<?php } else if ($footer_content == 'footer-text') { ?>
					<p><?php echo do_shortcode(ot_get_option('footer_text')); ?></p>
				<?php } else if ($footer_content == 'footer-menu') { ?>
					<?php wp_nav_menu( array( 'menu' => ot_get_option('footer_menu'), 'depth' => 1, 'container' => false  ) ); ?>
				<?php } ?>
			</div> -->
		</div>
	</footer>
	<!-- End Footer -->
	<?php } ?>
	<?php if (ot_get_option('scroll_totop') != 'off') { ?>
		<a href="#" id="scroll_totop"></a>
	<?php } ?>
</div> <!-- End #wrapper -->

<?php echo ot_get_option('ga'); ?>

<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
</body>
</html>