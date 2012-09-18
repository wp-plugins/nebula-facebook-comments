<?php
/**
 * The template for displaying Facebook Comments.
 *
 * @package Nebula
 * @subpackage Facebook_Comments
 * @since Facebook Comments 1.0
 */

if( !defined('NBFC_SLUG') )
	define( 'NBFC_SLUG', 'nebula-facebook-comments' );
 
$nbfc_lang = 'en_US';

if( defined('WPLANG') && WPLANG )
	$nbfc_lang = WPLANG;
?>

<?php if( comments_open() ) : ?>
		
	<div id="comments">
	
	<?php if( post_password_required() ) : ?>
		
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', NBFC_SLUG ); ?></p>
	</div>
	
	<?php
		return;
	endif;?>
	
		<?php global $nbfc_defaults; ?>
		<?php $nbfc_options = get_option( NBFC_SLUG, $nbfc_defaults ) ?>
		<?php $nbfc_scheme = ('dark'==$nbfc_options['scheme']) ? ' data-colorscheme="dark"' : ''; ?>
	
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="<?php echo $nbfc_options['rows']; ?>" data-width="<?php echo $nbfc_options['width']; ?>"<?php echo $nbfc_scheme; ?>></div>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/<?php echo $nbfc_lang; ?>/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	
	</div>
	
<?php else : ?>
	
	<div id="comments">
		<p><?php _e('Comments are closed.', NBFC_SLUG); ?></p>
	</div>
	
<?php endif; ?>
	