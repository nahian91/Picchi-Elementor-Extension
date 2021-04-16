<?php
/**
 * Elementor About Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class About_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve About widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'about';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve About widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'About', 'picchi-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve About widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the About widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register About widget controls.
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

        // About Heading
		$this->add_control(
			'about_heading',
			[
				'label' => __( 'About Heading', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Write About Heading Here', 'picchi-extension' ),
			]
        );
        
        // About Description
		$this->add_control(
			'about_desc',
			[
				'label' => __( 'About Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write About Description Here', 'picchi-extension' ),
			]
        );
        
        // About Button Title
		$this->add_control(
			'about_btn_title',
			[
				'label' => __( 'Button Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Button Title Here ', 'picchi-extension' ),
			]
        );
        
        // About Button Link
		$this->add_control(
			'about_btn_link',
			[
				'label' => __( 'Button Link', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Write Button Linke Here', 'picchi-extension' ),
			]
        );

		// About Image
		$this->add_control(
			'about_image',
			[
				'label' => __( 'Choose Image', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Choose About Image', 'picchi-extension' ),
			]
        );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'about_feature_title', [
				'label' => __( 'About Feature Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'About Feature Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'about_feature_desc', [
				'label' => __( 'About Feature Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'About Feature Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		// About Feature Button Title
		$repeater->add_control(
			'about_feature_btn_title',
			[
				'label' => __( 'About Feature Button Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Button Title Here ', 'picchi-extension' ),
			]
        );
        
        // About  Feature Button Link
		$repeater->add_control(
			'about_feature_btn_link',
			[
				'label' => __( 'About Feature Button Link', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Write Button Linke Here', 'picchi-extension' ),
			]
        );

		$this->add_control(
			'about_features_list',
			[
				'label' => __( 'About Features List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ about_feature_title }}}',
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
	 * Render About widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $about_heading = $settings['about_heading'];
        $about_desc = $settings['about_desc'];
        $about_btn_title = $settings['about_btn_title'];
        $about_btn_link = $settings['about_btn_link']['url'];
        $about_image = $settings['about_image']['url'];
    ?>
    <div class="row">
		<div class="col-xl-6">
			<div class="about-text">
				<h4><?php echo $about_heading; ?></h4>
				<?php echo $about_desc; ?>
				<a href="<?php echo $about_btn_link; ?>" class="box-btn"><?php echo $about_btn_title; ?></a>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="about-img">
				<img src="<?php echo $about_image; ?>" alt="" />
			</div>
		</div>
	</div>
	<div class="row pt-100">

		<?php
			if ( $settings['about_features_list'] ) {
				foreach (  $settings['about_features_list'] as $item ) {
		?>
		<div class="col-xl-4">
			<div class="single-about">
				<h4><?php echo $item['about_feature_title']; ?></h4>
				<p><?php echo $item['about_feature_desc']; ?></p>
				<a href="<?php echo $item['about_feature_btn_link']; ?>"><?php echo $item['about_feature_btn_title']; ?></a>
			</div>
		</div>
		<?php
				}
			}
		?>
	</div>
<?php
	}

}