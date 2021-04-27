<?php
/**
 * Elementor Services Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Services_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Services widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'services';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Services widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Picchi Services', 'picchi-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Services widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-editor-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Services widget belongs to.
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
	 * Register Services widget controls.
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

		$this->add_control(
			'services_column',
			[
				'label' => __( 'Select Services Column', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'columnThree',
				'options' => [
					'columnFour'  => __( '4 Column', 'picchi-extension' ),
					'columnThree' => __( '3 Column', 'picchi-extension' ),
					'columnTwo' => __( '2 Column', 'picchi-extension' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'feature_media_type',
			[
				'label' => __( 'Media Type', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'feature_icon' => [
						'title' => __( 'Icon', 'plugin-domain' ),
						'icon' => 'eicon-call-to-action',
					],
					'feature_image' => [
						'title' => __( 'Image', 'plugin-domain' ),
						'icon' => 'eicon-image-box',
					],
					'feature_number' => [
						'title' => __( 'Number', 'plugin-domain' ),
						'icon' => 'eicon-number-field',
					],
				],
				'default' => 'feature_icon',
				'toggle' => true,
			]
		);

		$repeater->add_control(
			'feature_icon', [
				'label' => __( 'Icon', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'label_block' => true,
				'condition' => [
					'feature_media_type' => 'feature_icon'
				]
			]
		);

		$repeater->add_control(
			'feature_image', [
				'label' => __( 'Image', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'feature_media_type' => 'feature_image'
				]
			]
		);
		

		$repeater->add_control(
			'feature_number', [
				'label' => __( 'Number', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'condition' => [
					'feature_media_type' => 'feature_number'
				]
			]
		);

		$repeater->add_control(
			'service_title', [
				'label' => __( 'Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'picchi-extension' ),
				'label_block' => true,
                'separator' => 'before'
			]
		);

		$repeater->add_control(
			'service_desc',
			[
				'label' => __( 'Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Description' , 'picchi-extension' ),
				'label_block' => true,
                'separator' => 'before'
			]
		);

		$this->add_control(
			'services_list',
			[
				'label' => __( 'Services List', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ service_title }}}',
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
	 * Render Services widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $services_column = $settings['services_column'];

		if($services_column == 'columnThree'){
			$services_column_class = 'col-lg-4';
		} elseif ($services_column == 'columnFour') {
			$services_column_class = 'col-lg-3';
		} else {
			$services_column_class = 'col-lg-6';
		}
    ?>
    <div class="row">

		<?php
			if ( $settings['services_list'] ) {
				foreach (  $settings['services_list'] as $item ) {
		?>
		<div class="<?php echo $services_column_class; ?>">
			<div class="single-service">
				<?php
					if(!empty($item['feature_icon']['value'])){
				?>
					<i class="<?php echo $item['feature_icon']['value'];?>"></i>
				<?php
					} elseif (!empty($item['feature_image']['url'])){
				?>
					<img src="<?php echo $item['feature_image']['url']; ?>" alt="">
				<?php
					} elseif ($item['feature_number']){
				?>
					<span><?php echo $item['feature_number']; ?></span>
				<?php
					}
				?>
				<h4><?php echo $item['service_title'];?></h4>
				<p><?php echo $item['service_desc'];?></p>
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