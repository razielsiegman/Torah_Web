<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_CornerAd_Widget extends Widget_Base
{
	public function get_name()
	{
		return 'search-in-place';
	} // End get_name

	public function get_title()
	{
		return 'Search in Place';
	} // End get_title

	public function get_icon()
	{
		return 'fa fa-search ';
	} // End get_icon

	public function get_categories()
	{
		return array( 'search-in-place-cat' );
	} // End get_categories

	public function is_reload_preview_required()
	{
		return false;
	} // End is_reload_preview_required

	protected function _register_controls()
	{
		$this->start_controls_section(
			'search_in_place_section',
			array(
				'label' => __( 'Search in Place', 'search-in-place' )
			)
		);

		$this->add_control(
			'search_in_page',
			array(
				'label' =>  __('Search in current page only', 'search-in-place'),
				'type' => Controls_Manager::SWITCHER
			)
		);

		$this->end_controls_section();
	} // End _register_controls

	private function _get_shortcode()
	{
		$attrs = '';
		$settings = $this->get_settings_for_display();
		$settings['search_in_page'];

		if($settings['search_in_page'] == 'yes') $attrs = ' in_current_page="1"';
		return '[search-in-place-form'.$attrs.']';
	} // End _get_shortcode

	protected function render()
	{
		print do_shortcode(shortcode_unautop($this->_get_shortcode()));
	} // End render

	public function render_plain_content()
	{
		echo $this->_get_shortcode();
	} // End render_plain_content

	protected function _content_template() {} // End _content_template
} // End Elementor_CornerAd_Widget

// Register the widgets
Plugin::instance()->widgets_manager->register_widget_type( new Elementor_CornerAd_Widget );
