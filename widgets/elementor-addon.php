<?php

class Elementor_Addon_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'widget_test';
	}

	public function get_title() {
		return esc_html__( 'Test Addon', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	// Category Id
	public function get_categories() {
		return [ 'category-addon' ];
	}

	public function get_keywords() {
		return [ 'keyword', 'keyword' ];
	}

    protected function register_controls() {

		// Start Section
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Add control or widget
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

		// End Section
		$this->end_controls_section();

		// Style Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);

		// End Section
		$this->end_controls_section();

	}

	// Display output
	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['title'] ) ) {
			return;
		}
		?>
		<h3>
			<?php echo $settings['title']; ?>
		</h3>
		<?php
	}

	// Display without Refresh
	protected function content_template() {
		?>
		<#
		if ( '' === settings.title ) {
			return;
		}
		#>
		<h3>
			{{{ settings.title }}}
		</h3>
		<?php
	}

}