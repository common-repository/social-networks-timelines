<?php
/*
	Plugin Name: Social Networks Timelines
	Plugin URI: 
	Description: This plugin add social network timelines to the template. These timeline are configurated from the tab "edit" the plugin itself.
	Version: 1.0.1
	Author: Miguel Ignacio Garcia 
	Author URI: http://www.piensaenbinario.es
	License: GPL2
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
	Domain Path /languages/
	Text Domain social-networks
*/
if ( !defined('SNT_PLUGIN_DIR') ){
	define( 'SNT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

require_once(SNT_PLUGIN_DIR . 'includes/widget.php');

global $sntl_db_version;
$sntl_db_version = '1.0.1';
$installed_ver = get_option('sntl_db_version');

include (SNT_PLUGIN_DIR . 'includes/get-config.php');
global $originalData;
$originalData[0] = $class->timeline_value;
$originalData[1] = $dataWidgetId->timeline_value;
$originalData[2] = $height->timeline_value;
$originalData[3] = $href->timeline_value;
$originalData[4] = $target->timeline_value;
$originalData[5] = $title->timeline_value;
$originalData[6] = $width->timeline_value;
$originalData[7] = $linkTitle->timeline_value;

if($installed_ver == null || $installed_ver != $sntl_db_version){
	register_activation_hook( __FILE__, 'sntl_install' );
}

function sntl_include_scripts(){
    wp_register_script( 'twitter-timeline-script', plugins_url( '/js/twitter-timeline.js', __FILE__ ) );
	wp_enqueue_script( 'twitter-timeline-script' );
}

function sntl_install(){
	global $sntl_db_version;
	
	if ( $installed_ver !== false){
		sntl_drop_table();
		sntl_create_table();
		sntl_update_data();
		update_option('sntl_db_version', $sntl_db_version);
	}else{
		sntl_create_table();
		sntl_insert_data();
		add_option('sntl_db_version', $sntl_db_version);
	}	
}

function sntl_drop_table(){
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'social_networks';
	$sql_create = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql_create);
}

function sntl_create_table(){
	global $wpdb;
	
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'social_networks';
	$sql_create = "CREATE TABLE $table_name (
						id int(11) NOT NULL AUTO_INCREMENT,
						timeline_option varchar(70) DEFAULT null,
						timeline_value varchar(255) DEFAULT null,
						UNIQUE KEY id(id)
						)$charset_collate;";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql_create);
}

function sntl_insert_data() {
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'social_networks';
	$sql_insert = "INSERT INTO $table_name VALUES (1,'class','twitter-timeline'),
													(2,'data-widget-id','507301828308922368'),
													(3,'height','430'),
													(4,'href','https://twitter.com/twitterdev'),
													(5,'target','_blank'),
													(6,'title','Tweets'),
													(7,'width','269'),
													(8,'link-title','Enlace a https://twitter.com/twitterdev');";
	$wpdb->query($sql_insert);
}

function sntl_update_data(){
	global $wpdb;
	global $originalData;
	
	$table_name = $wpdb->prefix . 'social_networks';
	$sql_insert = "INSERT INTO $table_name VALUES (1,'class', '$originalData[0]'),
													(2,'data-widget-id','$originalData[1]'),
													(3,'height','$originalData[2]'),
													(4,'href','$originalData[3]'),
													(5,'target','$originalData[4]'),
													(6,'title','$originalData[5]'),
													(7,'width','$originalData[6]'),
													(8,'link-title','$originalData[7]');";
	$wpdb->query($sql_insert);
}

function sntl_load_textdomain() {
	load_plugin_textdomain( 'social-networks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function sntl_add_menu() {
	$title = __('Social Networks','social-networks');
    add_menu_page($title, $title, 'manage_options', 'view-config-twitter-timeline', 'sntl_view_config_twitter_timeline', 'dashicons-twitter', 97);
}

function sntl_view_config_twitter_timeline(){
	global $wpdb;
	include_once (SNT_PLUGIN_DIR . 'includes/process-form.php');
	include (SNT_PLUGIN_DIR . 'includes/get-config.php');
?>
	<h2><?php echo esc_html( __( 'Settings', 'social-networks' ) ); ?></h2>
	<div class="form">
		<form name="fm" action="<?php echo esc_url( $_SERVER["REQUEST_URI"] );?>" method="POST">
			<div class="field">
				<label><?php echo esc_html( __( 'Css class', 'social-networks' ) ); ?><label>
				<input type="text" name="class" value="<?php echo esc_attr( $class->timeline_value ) ?>"/>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Data widget id', 'social-networks' ) ); ?><label>
				<input type="text" name="data-widget-id" value="<?php echo esc_attr( $dataWidgetId->timeline_value ) ?>"/>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Height', 'social-networks' ) ); ?><label>
				<input type="text" name="height" value="<?php echo esc_attr( $height->timeline_value ) ?>"/>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Href', 'social-networks' ) ); ?><label>
				<input type="text" name="href" value="<?php echo esc_attr( $href->timeline_value ) ?>"/>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Target', 'social-networks' ) ); ?><label>
				<input type="text" name="target" value="<?php echo esc_attr( $target->timeline_value ) ?>"/>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Title', 'social-networks' ) ); ?><label>
				<input type="text" name="title" value="<?php echo esc_attr( $title->timeline_value ) ?>"/>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Width', 'social-networks' ) ); ?><label>
				<input type="text" name="width" value="<?php echo esc_attr( $width->timeline_value ) ?>"//>
			</div>
			<div class="field">
				<label><?php echo esc_html( __( 'Link title', 'social-networks' ) ); ?><label>
				<input type="text" name="link-title" value="<?php echo esc_attr( $linkTitle->timeline_value ) ?>"//>
			</div>
			<button class="button" name="submit" type="submit"><?php echo esc_html( __( 'Save', 'social-networks' ) ); ?></button>
		</form>
	</div>
<?php
}

/* Actions */
add_action('admin_menu', 'sntl_add_menu');
add_action('plugins_loaded', 'sntl_load_textdomain');
add_action('wp_enqueue_scripts', 'sntl_include_scripts' );