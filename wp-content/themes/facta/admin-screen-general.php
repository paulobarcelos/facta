<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


add_action( 'admin_menu', 'facta_admin_menu' );


function facta_admin_menu() {
	add_menu_page( __( 'Configuration', 'facta' ), _x( 'Configuration', 'admin', 'facta' ), 'manage_options', 'facta', 'facta_admin_screen_general' );

	add_submenu_page( 'facta', _x( 'General', 'admin', 'facta' ), _x( 'General', 'admin', 'facta' ), 'manage_options', 'facta', 'facta_admin_screen_general' );
}

function facta_admin_screen_general() {

	if ( isset( $_POST['submit'] ) && check_admin_referer( 'facta-general-settings' ) ) {
		update_option( 'facta_home_redirect', @$_POST['facta_home_redirect'] );
		update_option( 'facta_redirect_only_once', @$_POST['facta_redirect_only_once'] );
		
	}

	?>
	
	<div class="wrap">
		<div id="icon-plugins" class="icon32"><br></div>
		<h2><?php _e( 'General Configuration', 'facta' ); ?></h2>
		<form action="" method="post">
			<?php wp_nonce_field( 'facta-general-settings' ); ?>

			<h3><?php echo _x( 'Settings', 'admin', 'facta' ); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th><?php echo _x( 'Home Redirect', 'admin', 'facta' ); ?></th>
					<td>
						<input type="text" name="facta_home_redirect" class="large-text code" rows="2" value="<?php echo stripslashes( get_option( 'facta_home_redirect' ) ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th><?php echo _x( 'Redirect only on the first visit', 'admin', 'facta' ); ?></th>
					<td>
						<label>
							<?php echo _x( 'No', 'admin', 'facta' ); ?>
							<input type="radio" name="facta_redirect_only_once" value="0" <?php checked( get_option( 'facta_redirect_only_once' ) == 0); ?> />
						</label><br>
						<label>
							<?php echo _x( 'Yes', 'admin', 'facta' ); ?>
							<input type="radio" name="facta_redirect_only_once" value="1" <?php checked( get_option( 'facta_redirect_only_once' ) == 1); ?> />
						</label>
					</td>
				</tr>
			</table>

			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'facta' ); ?>"></p>
		</form>
	</div>

<?php 
}
?>