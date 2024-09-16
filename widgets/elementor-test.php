<?php

class Elementor_Test_Widget extends \Elementor\Widget_Base {

  public function get_name() {
		return 'Test Widget';
	}

	public function get_title() {
		return esc_html__( 'Test Widget', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'keyword', 'keyword' ];
	}

	public function get_custom_help_url() {
		return 'https://example.com/widget-name';
	}

	protected function get_upsale_data() {
		return [];
	}
}