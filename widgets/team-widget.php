<?php
/**
 * Elementor Team Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Team_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Team widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Picchi Team', 'picchi-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Team widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-heading';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Team widget belongs to.
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
	 * Register Team widget controls.
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

		// Team Image
		$this->add_control(
			'team_image',
			[
				'label' => __( 'Choose Image', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Choose Team Image', 'picchi-extension' ),
			]
        );

        // Team Name
		$this->add_control(
			'team_name',
			[
				'label' => __( 'Name', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Write Name Here', 'picchi-extension' ),
			]
        );
        
        // Team Designation
		$this->add_control(
			'team_desg',
			[
				'label' => __( 'Designation', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Team Here', 'picchi-extension' ),
			]
        );

		$this->add_control(
			'show_social_icon',
			[
				'label' => __( 'Show Social Icon?', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'picchi-extension' ),
				'label_off' => __( 'Hide', 'picchi-extension' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'team_title', [
				'label' => __( 'Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Team Icon Title' , 'picchi-extension' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'team_icon',
			[
				'label' => __( 'Team Icon', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
        
        // Team Icon Link
		$repeater->add_control(
			'team_icon_link',
			[
				'label' => __( 'Team Icon Link', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Write Team Icon Link Here', 'picchi-extension' ),
			]
        );

		$this->add_control(
			'team_social_list',
			[
				'label' => __( 'Team Social List', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ team_title }}}',
				'condition' => [
					'show_social_icon' => 'yes'
				]
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

        // Title Options
		$this->add_control(
			'title_heading',
			[
				'label' => __( 'Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
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
					'{{WRAPPER}} .team-hover h4' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .team-hover h4',
			]
        );
        
        // Designation Options
		$this->add_control(
			'desge_heading',
			[
				'label' => __( 'Designation', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

        // Designation Color
        $this->add_control(
			'desg_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .team-hover p' => 'color: {{VALUE}}',
				]
			]
        );
        
        // Designation Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desg_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-hover p',
			]
        );
        
        // Social Options
		$this->add_control(
			'social_heading',
			[
				'label' => __( 'Social Icons', 'picchi-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
				'condition' => [
					'show_social_icon' => 'yes'
				]
			]
		);

        // Social Color
        $this->add_control(
			'social_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'show_social_icon' => 'yes'
				]
			]
        );

		// Social Size
		$this->add_control(
			'social_size',
			[
				'label' => __( 'Font Size', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 15,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_social_icon' => 'yes'
				]
			]
		);

        $this->end_controls_section();
	}

	/**
	 * Render Team widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $team_image = $settings['team_image']['url'];
        $team_name = $settings['team_name'];
        $team_desg = $settings['team_desg'];
        $show_social_icon = $settings['show_social_icon'];
    ?>
    <div class="single-team">
		<img src="<?php echo $team_image;?>" alt="<?php echo $team_name;?>">
		<div class="team-hover">
		<div class="team-hover-table">
			<div class="team-hover-cell">
				<h4><?php echo $team_name;?></h4>
				<p><?php echo $team_desg;?></p>

				<?php if($show_social_icon === 'yes') {
				?>
				<div class="team-social">
				<?php
					if ( $settings['team_social_list'] ) {
						foreach (  $settings['team_social_list'] as $item ) {
				?>
					<a href="<?php echo $item['team_icon_link']['url'];?>"><i class="<?php echo $item['team_icon']['value'];?>"></i></a>
				<?php } } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		</div>
	</div>
<?php
	}

}