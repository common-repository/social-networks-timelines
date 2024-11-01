<?php
	class Twitter_Timeline_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$description = __('Twitter timeline with your new post','social-networks');
			$widget_ops = array( 
				'classname' => 'twitter_timeline_widget',
				'description' => $description,
			);
			parent::__construct( 'twitter_timeline_widget', 'Twitter Timeline', $widget_ops );
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			include('get-config.php');
			echo '<div class="widget">';
			echo '<h2>'. esc_html( $title->timeline_value) .'</h2>';
			echo '<a class="'. esc_attr( $class->timeline_value) .'"
					href="'. esc_attr( $href->timeline_value) .'" 
					target="'. esc_attr( $target->timeline_value) .'" 
					data-widget-id="'. esc_attr( $dataWidgetId->timeline_value) .'"  
					width="'. esc_attr( $width->timeline_value) .'"
					height="'. esc_attr( $height->timeline_value) .'"
					title="'. esc_html( $linkTitle->timeline_value) .'" >
				</a>';
			echo '</div>';
		}
	}
		
	function register_twitter_timeline_widget() {
		register_widget( 'Twitter_Timeline_Widget' );
	}
	
	add_action( 'widgets_init', 'register_twitter_timeline_widget' );