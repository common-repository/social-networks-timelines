<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	global $wpdb;
	$table_name = $wpdb->prefix . 'social_networks';
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'class'";
	$class = $wpdb->get_row($sql_select);
	if($class == null){
		$class = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'data-widget-id'";
	$dataWidgetId = $wpdb->get_row($sql_select);
	if($dataWidgetId == null){
		$dataWidgetId = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'height'";
	$height = $wpdb->get_row($sql_select);
	if($height == null){
		$height = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'href'";
	$href = $wpdb->get_row($sql_select);
	if($href == null){
		$href = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'target'";
	$target = $wpdb->get_row($sql_select);
	if($target == null){
		$target = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'title'";
	$title = $wpdb->get_row($sql_select);
	if($title == null){
		$title = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'width'";
	$width = $wpdb->get_row($sql_select);
	if($width == null){
		$width = (object) array('timeline_value' => '');
	}
	
	$sql_select = "SELECT timeline_value FROM $table_name WHERE timeline_option like 'link-title'";
	$linkTitle = $wpdb->get_row($sql_select);
	if($linkTitle == null){
		$linkTitle = (object) array('timeline_value' => 'Enlace a https://twitter.com/twitterdev');
	}
?>