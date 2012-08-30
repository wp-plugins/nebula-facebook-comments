<?php
/**
 * The template for displaying Facebook Comments.
 *
 * @package Nebula
 * @subpackage Facebook_Comments
 * @since Facebook Comments 1.0
 */
?>

	<div id="comments">
	
	<?php if( !post_password_required() ) : ?>
		
		<?php global $nbfc_defaults; ?>
		<?php $nbfc_options = get_option( NBFC_SLUG, $nbfc_defaults ) ?>
	
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="<?php echo $nbfc_options['rows']; ?>" data-width="<?php echo $nbfc_options['width']; ?>"></div>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/<?php echo WPLANG; ?>/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

	<?php endif; ?>
	
	</div>
	