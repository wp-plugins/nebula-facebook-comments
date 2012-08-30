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
	
	<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="10" data-width="699"></div>
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
	