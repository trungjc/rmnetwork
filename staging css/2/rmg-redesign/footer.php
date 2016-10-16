<div class="et_pb_section homepage-footer footer-main et_pb_section_7 et_pb_with_background et_section_regular">

	<div class="social-networks et_pb_row et_pb_row_9 et_pb_row_fullwidth et_pb_row_1-4_3-4">
		<div class="et_pb_column et_pb_column_1_4  et_pb_column_15">
			<div class="et_pb_module et-waypoint et_pb_image et_pb_animation_fade_in et_pb_image_3 et_always_center_on_mobile et-animated">
				<?php dynamic_sidebar( "et_pb_widget_area_4" ); ?> 
			</div>
		</div>
		<div class="et_pb_column et_pb_column_3_4  et_pb_column_16">
			<?php dynamic_sidebar( "et_pb_widget_area_5" ); ?>
		</div> 
	</div> 

	<div class="contact et_pb_row et_pb_row_10 et_pb_row_fullwidth et_pb_row_4col">
		<div class="et_pb_column et_pb_column_1_4  et_pb_column_17">
			<div class="et_pb_widget_area et_pb_widget_area_left clearfix et_pb_module et_pb_bg_layout_light  et_pb_sidebar_0">
				<?php dynamic_sidebar( "sidebar-2" ); ?>
			</div>
		</div>

		<div class="et_pb_column et_pb_column_1_4  et_pb_column_18">
			<div class="et_pb_widget_area et_pb_widget_area_left clearfix et_pb_module et_pb_bg_layout_light  et_pb_sidebar_1">
				<?php dynamic_sidebar( "sidebar-3" ); ?>
			</div>
		</div>
		<div class="et_pb_column et_pb_column_1_4  et_pb_column_19">
			<?php dynamic_sidebar( "sidebar-4" ); ?>
		</div> 
		<div class="et_pb_column et_pb_column_1_4  et_pb_column_20 et_pb_column_empty"></div>
	</div> 

	<div class="quick-links et_pb_row et_pb_row_11 et_pb_row_fullwidth et_pb_row_3-4_1-4">
		<div class="et_pb_column et_pb_column_3_4  et_pb_column_21">
			<div class="et_pb_widget_area et_pb_widget_area_left clearfix et_pb_module et_pb_bg_layout_light  et_pb_sidebar_3">
				<?php dynamic_sidebar( "et_pb_widget_area_3" ); ?>
			</div>
		</div>
		<div class="et_pb_column et_pb_column_1_4  et_pb_column_22">
			<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_8 clearfix container-copyright">
				<?php dynamic_sidebar( "et_pb_widget_area_6" ); ?>
			</div> 
		</div>
	</div>
</div>


<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

<footer id="main-footer">



<!---Customize end-->

<?php get_sidebar( 'footer' ); ?>


<?php
if ( has_nav_menu( 'footer-menu' ) ) : ?>

<div id="et-footer-nav">
	<div class="container">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'footer-menu',
			'depth'          => '1',
			'menu_class'     => 'bottom-nav',
			'container'      => '',
			'fallback_cb'    => '',
			) );
			?>
		</div>
	</div> <!-- #et-footer-nav -->

<?php endif; ?>

<div id="footer-bottom">
	<div class="container clearfix">
		<?php
		if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
			get_template_part( 'includes/social_icons', 'footer' );
		}
		?>

		<p id="footer-info"><?php echo Divichild_footer_credits_generator(); ?></p>
	</div>	<!-- .container -->
</div>
</footer> <!-- #main-footer -->
</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

</div> <!-- #page-container -->

<?php wp_footer(); ?>
<a class="requestdemo btn-custom" href="http://info.rmgnetworks.com/request-a-free-demo"><span>Request Free Demo</span></a>
<a class="support-bubble" href="http://rmgnetworks.com/contact/"><span>Contact Us</span><i class="icon-icon-moon-talk-bubble"></i></a>
<!-- Start of Async HubSpot Analytics Code -->
  <script type="text/javascript">
    (function(d,s,i,r) {
      if (d.getElementById(i)){return;}
      var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
      n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/205582.js';
      e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
  </script>
<!-- End of Async HubSpot Analytics Code -->
</body>
</html>