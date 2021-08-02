<?php
/**
 * Template used for AR Video Posts
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>

<section id="content" <?php Avada()->layout->add_style( 'content_style' ); ?>>
	<?php $post_pagination = get_post_meta( $post->ID, 'pyre_post_pagination', true ); ?>
	<?php if ( ( Avada()->settings->get( 'blog_pn_nav' ) && 'no' !== $post_pagination ) || ( ! Avada()->settings->get( 'blog_pn_nav' ) && 'yes' === $post_pagination ) ) : ?>
		<div class="single-navigation clearfix">
			<?php previous_post_link( '%link', esc_attr__( 'Previous', 'Avada' ) ); ?>
			<?php next_post_link( '%link', esc_attr__( 'Next', 'Avada' ) ); ?>
		</div>
	<?php endif; ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
			<?php $full_image = ''; ?>
			<?php if ( 'above' === Avada()->settings->get( 'blog_post_title' ) ) : ?>
				<?php if ( 'below_title' === Avada()->settings->get( 'blog_post_meta_position' ) ) : ?>
					<div class="fusion-post-title-meta-wrap">
				<?php endif; ?>
				<?php $title_size = ( false === avada_is_page_title_bar_enabled( $post->ID ) ? '1' : '2' ); ?>
				<?php echo avada_render_post_title( $post->ID, false, '', $title_size ); // WPCS: XSS ok. ?>
				<?php if ( 'below_title' === Avada()->settings->get( 'blog_post_meta_position' ) ) : ?>
					<?php echo avada_render_post_metadata( 'single' ); // WPCS: XSS ok. ?>
					</div>
				<?php endif; ?>
			<?php elseif ( 'disabled' === Avada()->settings->get( 'blog_post_title' ) && Avada()->settings->get( 'disable_date_rich_snippet_pages' ) && Avada()->settings->get( 'disable_rich_snippet_title' ) ) : ?>
				<span class="entry-title" style="display: none;"><?php the_title(); ?></span>
			<?php endif; ?>

			<?php if ( ! post_password_required( $post->ID ) ) :
				$ar_video = '';
				$ar_type = get_field('type');
				if($ar_type == 'youtube') {
					$ar_vid = get_field('youtube_vid');
					$ar_video = do_shortcode('[ar_video_embed type="'.$ar_type.'" vid="'.$ar_vid.'" autoplay="false" class="" id=""]');
				}elseif($ar_type == 'vimeo') {
					$ar_vid = get_field('vimeo_vid');
					$ar_video = do_shortcode('[ar_video_embed type="'.$ar_type.'" vid="'.$ar_vid.'" autoplay="false" class="" id=""]');
				}else {
					if(have_rows('self_files')) :
						while(have_rows('self_files')) : the_row();
							$ar_poster = get_sub_field('poster');
							$ar_srcs = array();
							if(get_sub_field('mp4')) :
								$ar_srcs['mp4'] = get_sub_field('mp4');
							endif;
							if(get_sub_field('ogv')):
								$ar_srcs['ogv'] = get_sub_field('ogv');
							endif;
							if(get_sub_field('webm')):
								$ar_srcs['webm'] = get_sub_field('webm');
							endif;
							$ar_src = '';
							if(count($ar_srcs == 1)) {
								$ar_src = 'src="'.$ar_srcs[0].'"';
							}else {
								foreach($ar_srcs as $key => $value) {
									$ar_src .= $key.'="'.$value.'" ';
								}
							}
						endwhile;
						$ar_video = do_shortcode('[video '.$ar_src.' poster="'.$ar_poster.'"]');
					else :
						$video = '';
					endif;
				} ?>
						<div class="fusion-post-slideshow">
							<div class="full-video">
								<?php echo $ar_video; // WPCS: XSS ok. ?>
							</div>
						</div>
			<?php endif; ?>

			<?php if ( 'below' === Avada()->settings->get( 'blog_post_title' ) ) : ?>
				<?php if ( 'below_title' === Avada()->settings->get( 'blog_post_meta_position' ) ) : ?>
					<div class="fusion-post-title-meta-wrap">
				<?php endif; ?>
				<?php $title_size = ( false === avada_is_page_title_bar_enabled( $post->ID ) ? '1' : '2' ); ?>
				<?php echo avada_render_post_title( $post->ID, false, '', $title_size ); // WPCS: XSS ok. ?>
				<?php if ( 'below_title' === Avada()->settings->get( 'blog_post_meta_position' ) ) : ?>
					<?php echo avada_render_post_metadata( 'single' ); // WPCS: XSS ok. ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="post-content">
				<?php the_content(); ?>
				<?php fusion_link_pages(); ?>
			</div>

			<?php if ( ! post_password_required( $post->ID ) ) : ?>
				<?php if ( '' === Avada()->settings->get( 'blog_post_meta_position' ) || 'below_article' === Avada()->settings->get( 'blog_post_meta_position' ) || 'disabled' === Avada()->settings->get( 'blog_post_title' ) ) : ?>
					<?php echo avada_render_post_metadata( 'single' ); // WPCS: XSS ok. ?>
				<?php endif; ?>
				<?php do_action( 'avada_before_additional_post_content' ); ?>
				<?php avada_render_social_sharing(); ?>
				<?php $author_info = get_post_meta( $post->ID, 'pyre_author_info', true ); ?>
				<?php if ( ( Avada()->settings->get( 'author_info' ) && 'no' !== $author_info ) || ( ! Avada()->settings->get( 'author_info' ) && 'yes' === $author_info ) ) : ?>
					<?php if(!get_field('ar_author_replace','option')) : ?>
						<section class="about-author">
							<?php ob_start(); ?>
							<?php the_author_posts_link(); ?>
							<?php /* translators: The link. */ ?>
							<?php $title = sprintf( __( 'About the Author: %s', 'Avada' ), ob_get_clean() ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
							<?php $title_size = ( false === avada_is_page_title_bar_enabled( $post->ID ) ? '2' : '3' ); ?>
							<?php Avada()->template->title_template( $title, $title_size ); ?>
							<div class="about-author-container">
								<div class="avatar">
									<?php echo get_avatar( get_the_author_meta( 'email' ), '72' ); ?>
								</div>
								<div class="description">
									<?php the_author_meta( 'description' ); ?>
								</div>
							</div>
						</section>
					<?php else : ?>
						<section class="about-author ar-author">
							<?php echo do_shortcode('[ar_author]'); ?>
						</section>
					<?php endif; ?>
				<?php endif; ?>
				<?php avada_render_related_posts( get_post_type() ); // Render Related Posts. ?>

				<?php $post_comments = get_post_meta( $post->ID, 'pyre_post_comments', true ); ?>
				<?php if ( ( Avada()->settings->get( 'blog_comments' ) && 'no' !== $post_comments ) || ( ! Avada()->settings->get( 'blog_comments' ) && 'yes' === $post_comments ) ) : ?>
					<?php wp_reset_postdata(); ?>
					<?php comments_template(); ?>
				<?php endif; ?>
				<?php do_action( 'avada_after_additional_post_content' ); ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</section>
<?php do_action( 'avada_after_content' ); ?>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
