<script>
function foo() {
//document.getElementById('gadget_url').value = '';
   //alert("Submit button clicked!");
   
   var email = document.getElementById('subscribe-email').value;
   document.getElementById('input_8_1').value = email;
   document.getElementById('gform_8').submit();
   //alert(email);
   //return true;
}
</script>
<?php
if ( ( is_single() || is_page() ) && 'et_full_width_page' === get_post_meta( get_queried_object_id(), '_et_pb_page_layout', true ) )
	return;

if ( is_active_sidebar( 'sidebar-news' ) ) : ?>
	<div id="sidebar">
		<h4 style="color:#000; margin-left: 28px;">Subscribe to the News</h4>
		<div class="search">
		<div class="search-form2">
		<div class="form-group ">
		
			<input type="text" id="subscribe-email"class="form-control search-field" placeholder="subscribe …" value="" name="subscribe-email" title="Search for:" vk_180de="subscribed">

		<button type="submit" onclick="return foo();" class="search-submit"><span id="et_subscribe"></span></button>
		</div>
		</div>
		</div>
		<?php dynamic_sidebar( 'sidebar-news' ); ?>
		
		<div class="search">
			<form role="search" method="get" class="search-form2" action="<?php echo esc_url( home_url( '/' ) ); ?>"><div class="form-group ">
		
			<input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />

		<button type="submit" class="search-submit"><span id="et_search_icon"></span></button>
		</div>
	</form>
	</div>
	</div> <!-- end #sidebar -->
<?php endif; ?>