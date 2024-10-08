<?php


class Elementor_Practice_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'Practice Widget';
	}

	public function get_title()
	{
		return esc_html__('Practice Widget', 'elementor-addon');
	}

	public function get_icon()
	{
		return 'eicon-text';
	}

	public function get_categories()
	{
		return ['elementor-addon-category'];
	}

	public function get_keywords()
	{
		return ['Practice', 'heading'];
	}

	public function get_custom_help_url()
	{
		return 'https://example.com/widget-name';
	}

	protected function get_upsale_data()
	{
		return [];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_align',
			[
				'label' => esc_html__('Alignment', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor-addon'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor-addon'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor-addon'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'text-align: {{VALUE}};',
				],
			]
		);
		//Hidden Controls
		$this->add_control(
			'show_title',
			[
				'label' => esc_html__('Show Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elementor-addon'),
				'label_off' => esc_html__('Hide', 'elementor-addon'),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Enter your title', 'elementor-addon'),

			]
		);
		$this->add_control(
			'hidden',
			[
				'label' => esc_html__('View', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		//Select
		$this->add_control(
			'color',
			[
				'label' => esc_html__('Color', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'red',
				'options' => [
					'yellow' => esc_html__('Yellow', 'elementor-addon'),
					'red' => esc_html__('Red', 'elementor-addon'),
					'green'  => esc_html__('Green', 'elementor-addon'),
					'blue' => esc_html__('Blue', 'elementor-addon'),
					'none' => esc_html__('None', 'elementor-addon'),
				],
			]
		);

		$this->add_control(
			'show_elements',
			[
				'label' => esc_html__('Show Elements', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => [
					'title'  => esc_html__('Title', 'elementor-addon'),
					'description' => esc_html__('Description', 'elementor-addon'),
					'button' => esc_html__('Button', 'elementor-addon'),
				],
				'default' => ['title', 'description'],
			]
		);

		$this->add_control(
			'number',
			[
				'label' => esc_html__('Number', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 5,
				'default' => 20,
				'separator' => 'default',
			]
		);

		$this->add_control(
			'item_description',
			[
				'label' => esc_html__('Description', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__('Default description', 'elementor-addon'),
				'placeholder' => esc_html__('Type your description here', 'elementor-addon'),
			]
		);

		$this->add_control(
			'rich_description',
			[
				'label' => esc_html__('Rich Description', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__('Default description', 'elementor-addon'),
				'placeholder' => esc_html__('Type your description here', 'elementor-addon'),
			]
		);

		$this->add_control(
			'custom_html',
			[
				'label' => esc_html__('Custom HTML', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
			]
		);

		$this->end_controls_section();
	}
	protected function render()
	{

		$settings = $this->get_settings_for_display();
?>
		<?php
		if ($settings['show_title'] == 'yes') {
			echo 'Hello World';
		}
		?>
		<h4 style="Color:<?php echo $settings['color']; ?>">Title: <?php echo $settings['title']; ?></h4>
		<h4>Number: <?php echo $settings['number']; ?></h4>
		<h4>Description: <?php echo $settings['item_description']; ?></h4>
		<h4>Rich description: <?php echo $settings['rich_description']; ?></h4>
		<code>
			<?php echo $settings['custom_html']; ?>
		</code>
<?php

	}
}
