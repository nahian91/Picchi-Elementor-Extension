<?php
/**
 * Elementor Bannar Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Bannar_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bannar widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bannar';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bannar widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Picchi Bannar', 'picchi-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bannar widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bannar widget belongs to.
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
	 * Register Bannar widget controls.
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

        // Sub Heading
		$this->add_control(
			'sub_heading',
			[
				'label' => __( 'Sub Heading', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Write Sub Heading Here', 'picchi-extension' ),
			]
        );
        
        // Heading
		$this->add_control(
			'heading',
			[
				'label' => __( 'Heading', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Heading Here', 'picchi-extension' ),
			]
        );
        
        // Description
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Description Here', 'picchi-extension' ),
			]
        );
        
        // Button 1 Title
		$this->add_control(
			'btn1_title',
			[
				'label' => __( 'Button 1 Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Button 1 Title Here ', 'picchi-extension' ),
			]
        );
        
        // Button 1 Link
		$this->add_control(
			'btn1_link',
			[
				'label' => __( 'Button 1 Link', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Write Button 1 Linke Here', 'picchi-extension' ),
			]
        );
        
        // Button 2 Title
		$this->add_control(
			'btn2_title',
			[
				'label' => __( 'Button 2 Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Button 2 Title Here ', 'picchi-extension' ),
			]
        );
        
        // Button 2 Link
		$this->add_control(
			'btn2_link',
			[
				'label' => __( 'Button 2 Link', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Write Button 2 Linke Here', 'picchi-extension' ),
			]
		);

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Styles', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        // Subtitle Options
		$this->add_control(
			'subtitle_heading',
			[
				'label' => __( 'Sub Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

        // Sub Title Color
        $this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bannar h4' => 'color: {{VALUE}}',
				],
			]
        );
        
        // Subtitle Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bannar h4',
			]
        );
        
        // Title Options
		$this->add_control(
			'title_heading',
			[
				'label' => __( 'Title', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

        // Title Color
        $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bannar h1' => 'color: {{VALUE}}',
				],
			]
        );
        
        // Title Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bannar h1',
			]
        );
        
        // Description Options
		$this->add_control(
			'desc_heading',
			[
				'label' => __( 'Description', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

        // Description Color
        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bannar p' => 'color: {{VALUE}}',
				],
			]
        );
        
        // Description Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bannar p',
			]
        );
        
        // Button 1 Options
		$this->add_control(
			'btn1_heading',
			[
				'label' => __( 'Button 1', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
        );
        
        $this->start_controls_tabs(
			'btn1_style_tabs'
        );
        
        // Normal Style Tab
        $this->start_controls_tab(
			'btn1_style_normal_tab',
			[
				'label' => __( 'Normal', 'picchi-extension' ),
			]
        );

        // Button 1 Color
        $this->add_control(
			'btn1_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .box-btn' => 'color: {{VALUE}}',
				],
			]
        );

        // Button 1 Background Color
        $this->add_control(
			'btn1_background',
			[
				'label' => __( 'Background Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => 'tomato',
				'selectors' => [
					'{{WRAPPER}} .box-btn' => 'background-color: {{VALUE}}',
				],
			]
        );
        
        // Button 1 Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn1_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .box-btn',
			]
        );

        // Button 1 Padding 
        $this->add_control(
			'btn1_padding',
			[
				'label' => __( 'Padding', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .box-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        // Button 1 Border Radius 
        $this->add_control(
			'btn1_border_radius',
			[
				'label' => __( 'Border Radius', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .box-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_tab();

        // Hover Style Tab
        $this->start_controls_tab(
			'btn1_style_hover_tab',
			[
				'label' => __( 'Hover', 'picchi-extension' ),
			]
        );

        // Button 1 Hover Color
        $this->add_control(
			'btn1_hover_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .box-btn:hover' => 'color: {{VALUE}}',
				],
			]
        );

        // Button 1 Hover Background Color
        $this->add_control(
			'btn1_hover_background',
			[
				'label' => __( 'Background Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => 'tomato',
				'selectors' => [
					'{{WRAPPER}} .box-btn:hover' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

         // Button 2 Options
		$this->add_control(
			'btn2_heading',
			[
				'label' => __( 'Button 2', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
        );
        
        $this->start_controls_tabs(
			'btn2_style_tabs'
        );
        
        // Normal Style Tab
        $this->start_controls_tab(
			'btn2_style_normal_tab',
			[
				'label' => __( 'Normal', 'picchi-extension' ),
			]
        );

        // Button 2 Color
        $this->add_control(
			'btn2_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .border-btn' => 'color: {{VALUE}}',
				],
			]
        );

        // Button 2 Border Color
        $this->add_control(
			'btn2_border',
			[
				'label' => __( 'Border Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => 'tomato',
				'selectors' => [
					'{{WRAPPER}} .border-btn' => 'border-color: {{VALUE}}',
				],
			]
        );
        
        // Button 2 Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn2_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .border-btn',
			]
        );

        // Button 2 Padding 
        $this->add_control(
			'btn2_padding',
			[
				'label' => __( 'Padding', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .border-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        // Button 2 Border Radius 
        $this->add_control(
			'btn2_border_radius',
			[
				'label' => __( 'Border Radius', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .border-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_tab();

        // Hover Style Tab
        $this->start_controls_tab(
			'btn2_style_hover_tab',
			[
				'label' => __( 'Hover', 'picchi-extension' ),
			]
        );

        // Button 2 Hover Color
        $this->add_control(
			'btn2_hover_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .border-btn:hover' => 'color: {{VALUE}}',
				],
			]
        );

        // Button 2 Hover BackgroundColor
        $this->add_control(
			'btn2_hover_background',
			[
				'label' => __( 'Background Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .border-btn:hover' => 'background-color: {{VALUE}}',
				],
			]
        );

        // Button 2 Hover Border Color
        $this->add_control(
			'btn2_hover_border',
			[
				'label' => __( 'Border Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => 'tomato',
				'selectors' => [
					'{{WRAPPER}} .border-btn:hover' => 'border-color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
	}

	/**
	 * Render Bannar widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $sub_heading = $settings['sub_heading'];
        $heading = $settings['heading'];
        $description = $settings['description'];
        $btn1_title = $settings['btn1_title'];
        $btn1_link = $settings['btn1_link']['url'];
        $btn2_title = $settings['btn2_title'];
        $btn2_link = $settings['btn2_link']['url'];
    ?>
    <div class="bannar">
        <h4><?php echo $sub_heading;?></h4>
        <h1><?php echo $heading;?></h1>
        <p><?php echo $description;?></p>
        <a class="box-btn" href="<?php echo $btn1_link;?>"><?php echo $btn1_title;?></a>
        <a class="border-btn" href="<?php echo $btn2_link;?>"><?php echo $btn2_title;?></a>
    </div>
<?php
	}

}