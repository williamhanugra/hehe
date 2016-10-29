<?php
/**
 * User Information
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
global $wp_query;

$tabs         = learn_press_user_profile_tabs( $user );
$current      = learn_press_get_current_profile_tab();
$profile_link = learn_press_get_page_link( 'profile' );
$cuser        = learn_press_get_current_user();
if ( !empty( $tabs ) && !empty( $tabs[$current] ) ) : ?>
	<div class="user-info" id="learn-press-user-info">
		<div class="user-basic-info">
			<span class="user-avatar"><?php echo $user->get_profile_picture( ); ?></span>
			<strong class="user-nicename"><?php echo learn_press_get_profile_display_name( $user ); ?></strong>
			<?php if ( $description = get_user_meta( $user->id, 'description', true ) ): ?>
				<p class="user-bio"><?php echo get_user_meta( $user->id, 'description', true ); ?></p>
			<?php endif; ?>
			<?php if ( $cuser->id == $user->ID ): ?>
				<p>
					<a href="<?php esc_attr_e( $profile_link . $user->user_login ); ?>/edit" class="button-secondary"><?php _e( 'Edit Profile', 'learnpress' ) ?></a>
				</p>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>