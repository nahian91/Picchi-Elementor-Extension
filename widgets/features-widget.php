<?php
/**
 * Elementor Features Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Features_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Features widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'features';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Features widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Features', 'picchi-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Features widget icon.
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
	 * Retrieve the list of categories the Features widget belongs to.
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
	 * Register Features widget controls.
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

		// Features Style
		$this->add_control(
			'features_style',
			[
				'label' => __( 'Features Style', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'features1',
				'options' => [
					'features1'  => __( 'Feature Style 1', 'picchi-extension' ),
					'features2' => __( 'Feature Style 2', 'picchi-extension' ),
				],
			]
		);

        // Features Sub Title
		$this->add_control(
			'features_sub_title',
			[
				'label' => __( 'Features Sub Title', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Write Features Sub Title Here', 'picchi-extension' ),
                'separator'=> 'before',
			]
        );
        
        // Features Title
		$this->add_control(
			'features_title',
			[
				'label' => __( 'Features Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Write Features Title Here', 'picchi-extension' ),
			]
        );

		$repeater = new \Elementor\Repeater();

		// Feature Box Icon
		$repeater->add_control(
			'feature_box_icon',
			[
				'label' => __( 'Feature Box Icon', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		// Feature Box Title
		$repeater->add_control(
			'feature_box_title', [
				'label' => __( 'Feature Box Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Feature Box Title' , 'picchi-extension' ),
				'label_block' => true,
			]
		);

		// Feature Box Description
		$repeater->add_control(
			'feature_box_desc', [
				'label' => __( 'Feature Box Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Feature Box Description' , 'picchi-extension' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_list',
			[
				'label' => __( 'Features List', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ feature_box_title }}}',
			]
		);

		// Feature Image
		$this->add_control(
			'feature_image',
			[
				'label' => __( 'Choose Feature Image', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Choose Feature Image', 'picchi-extension' ),
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
				'name' => 'subtitle_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title h4',
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
                'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
			]
        );
        
        // Title Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title h2',
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
                'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
			]
        );
        
        // Description Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title p',
			]
        );

		// Border Options
		$this->add_control(
			'border_heading',
			[
				'label' => __( 'Border', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

		// Border 1 Background Color
        $this->add_control(
			'border1_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#777',
				'selectors' => [
					'{{WRAPPER}} .section-title h2::before' => 'background-color: {{VALUE}}',
				],
			]
        );

		// Border 2 Background Color
        $this->add_control(
			'border2_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#e16038',
				'selectors' => [
					'{{WRAPPER}} .section-title h2::after' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_section();
	}

	/**
	 * Render Features widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $features_style = $settings['features_style'];
        $features_sub_title = $settings['features_sub_title'];
        $features_title = $settings['features_title'];
        $feature_image = $settings['feature_image']['url'];

		if($features_style == 'features1'){
			$feature_class = 'features-1';
			$margin_left = '';
			
		}else{
			$feature_class = 'features-2';
			$margin_left = 'ml-auto';
		}
    ?>
	<style>
		.features-1::before, .features-2::before{
			background-image:url('<?php echo $feature_image; ?>');
		}
	</style>
    <div class="features <?php echo $feature_class; ?>">
		<div class="col-xl-6 <?php echo $margin_left; ?>">
			<div class="single-feature text-center">
				<h6><?php echo $features_sub_title; ?></h6>
				<h4><?php echo $features_title; ?></h4>
				<div class="row">
					<?php
						if ( $settings['features_list'] ) {
							foreach (  $settings['features_list'] as $item ) {
					?>
					<div class="col-xl-6">
						<div class="feature-box">
							<i class="<?php echo $item['feature_box_icon']['value']; ?>"></i>
							<h5><?php echo $item['feature_box_title']; ?></h5>
							<p><?php echo $item['feature_box_desc']; ?></p>
						</div>
					</div>
					<?php
							}
						}
					?>
				</div>
			</div>
		</div>
	  </div>
<?php
	}

}