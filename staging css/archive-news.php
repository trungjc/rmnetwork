<?php /* Template Name: RMG Blog Post Page */ ?>


<?php get_header(); ?>

<div id="main-content" class"<?php the_ID(); ?>">
<div class="blog-banner-herro border-bottom-blue et_pb_section_first  et_pb_fullwidth_header et_pb_module et_pb_bg_layout_dark et_pb_text_align_left flex-content et_pb_fullwidth_header_0">
	<div class="et_pb_fullwidth_header_container left">
	<div class="header-content-container center">
	<div class="header-content" style="margin-top: 200px;">
						
						
						
						
<h1 class="the-title black" style="color: black !important; ">BEYOND TACTICS<br>
<strong>AND CHANGES</strong></h1>
<h4 class="the-title black" style="color: black !important;"> SHARING INDUSTRY NEWS, IDEAS, AND SOLUTIONS FROM EXPERTS</h4>
						
					</div>
		     
	</div>
	</div>
</div>
	<div class="container">
		<div id="content-area" class="clearfix">
			
			<div id="left-area">
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$post_format = et_pb_post_format(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?> style="margin-bottom:100px;">
					
					<div id="thumb">
					
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 350 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 350 );
					$classtext = 'et_pb_post_main_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					et_divi_post_format_content();
				
					if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) {
						if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) :
							printf(
								'<div class="et_main_video_container">
									%1$s
								</div>',
								$first_video
							);
						elseif ( ! in_array( $post_format, array( 'gallery' ) ) && 'on' === et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb ) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
							</a>
					<?php
						elseif ( 'gallery' === $post_format ) :
							et_pb_gallery_images();
						endif;
					} ?>

				<?php if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) : ?>
					<?php if ( ! in_array( $post_format, array( 'link', 'audio' ) ) ) : ?> </div>
						<h2 class="entry-title" style="font-size: 25px !important"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php endif; ?>

					<div class="post-excerpt">
					<?php
						et_divi_post_meta();

						if ( 'on' !== et_get_option( 'divi_blog_style', 'false' ) || ( is_search() && ( 'on' === get_post_meta( get_the_ID(), '_et_pb_use_builder', true ) ) ) ) {
							truncate_post( 270 );
						} else {
							the_content();
						}
					?>
				<?php endif; ?>
					</div>
					</article> <!-- .et_pb_post -->
			<?php
					endwhile;

					if ( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
			?>
			</div> <!-- #left-area -->

			<?php get_sidebar(news); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>