<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	global $wpdb;
	$table_name = $wpdb->prefix . 'social_networks';
	$sql_update = "UPDATE $table_name SET timeline_value='$class' WHERE timeline_option like 'class'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$dataWidgetId' WHERE timeline_option like 'data-widget-id'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$height' WHERE timeline_option like 'height'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$href' WHERE timeline_option like 'href'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$target' WHERE timeline_option like 'target'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$title' WHERE timeline_option like 'title'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$width' WHERE timeline_option like 'width'";
	$wpdb->query($sql_update);
	$sql_update = "UPDATE $table_name SET timeline_value='$linkTitle' WHERE timeline_option like 'link-title'";
	$wpdb->query($sql_update);
?>