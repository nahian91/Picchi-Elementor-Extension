<?php
/**
 * Elementor Process Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Process_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Process widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'process';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Process widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Picchi Process', 'picchi-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Process widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-globe';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Process widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'picchi-category' ];
	}

	/**
	 * Register Process widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // Process Title
		$this->add_control(
			'process_title',
			[
				'label' => __( 'Process Title', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Write Process Title Here', 'picchi-extension' ),
			]
        );
        
        // Process Number
		$this->add_control(
			'process_number',
			[
				'label' => __( 'Process Number', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Process Number Here', 'picchi-extension' ),
			]
        );
        
        // Process Description
		$this->add_control(
			'process_description',
			[
				'label' => __( 'Process Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Description Here', 'picchi-extension' ),
			]
        );

		$this->add_control(
			'process_align',
			[
				'label' => __( 'Alignment', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'picchi-extension' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'picchi-extension' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'picchi-extension' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .single-process' => 'text-align: {{VALUE}};',
				],
			]
		);
       
        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
			'process_title_section',
			[
				'label' => __( 'Title', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        // Sub Title Color
        $this->add_control(
			'process_title_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#777',
				'selectors' => [
					'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
				],
			]
        );
        
        // Subtitle Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'process_title_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title h4',
			]
        );
	}

	/**
	 * Render Process widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $process_title = $settings['process_title'];
        $process_number = $settings['process_number'];
        $process_description = $settings['process_description'];
    ?>
    <div class="single-process">
		<h6><?php echo $process_title; ?> <span><?php echo $process_number; ?></span></h6>
		<p><?php echo $process_description; ?></p>
	</div>
<?php
	}

}