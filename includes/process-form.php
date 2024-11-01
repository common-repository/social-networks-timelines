<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	if( isset($_POST['submit']) ){
		if( isset($_POST['class']) ) {
			$class = sanitize_text_field( $_POST['class'] );
			if ( strlen( $class ) > 255 ) {
				$class = substr( $class, 0, 255 );
			}
		}
		if( isset($_POST['data-widget-id']) ){
			$dataWidgetId = sanitize_text_field( $_POST['data-widget-id'] );
			if ( strlen( $dataWidgetId ) > 255 ) {
				$dataWidgetId = substr( $dataWidgetId, 0, 255 );
			}
		}
		if( isset($_POST['height']) ){
			$height = sanitize_text_field( $_POST['height'] );
			if ( strlen( $height ) > 255 ) {
				$height = substr( $height, 0, 255 );
			}
				
		}
		if( isset($_POST['href']) ) {
			$href = sanitize_text_field( $_POST['href'] );
			if ( strlen( $href ) > 255 ) {
				$href = substr( $href, 0, 255 );
			}
		}
		if( isset($_POST['target']) ){
			$target = sanitize_text_field( $_POST['target'] );
			if ( strlen( $target ) > 255 ) {
				$target = substr( $target, 0, 255 );
			}
		}
		if( isset($_POST['title']) ){
			$title = sanitize_text_field( $_POST['title'] );
			if ( strlen( $title ) > 255 ) {
				$title = substr( $title, 0, 255 );
			}
		}
		if( isset($_POST['width']) ){
			$width = sanitize_text_field( $_POST['width'] );
			if ( strlen( $width ) > 255 ) {
				$width = substr( $width, 0, 255 );
			}
		}
		if( isset($_POST['link-title']) ){
			$linkTitle = sanitize_text_field( $_POST['link-title'] );
			if ( strlen( $width ) > 255 ) {
				$linkTitle = substr( $linkTitle, 0, 255 );
			}
		}		
		include_once('set-config.php');
	}
?>