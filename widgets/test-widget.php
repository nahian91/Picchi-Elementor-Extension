<?php
class Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test';
	}

	public function get_title() {
		return __( 'Test', 'picchi-extension' );
	}

	public function get_icon() {
		return 'fa fa-facebook';
	}

	public function get_categories() {
		return [ 'general' ];
    }
    
    protected function _register_controls() {

        $this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'picchi-extension' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Write Title Here!', 'picchi-extension' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'descriptione_section',
			[
				'label' => __( 'Description', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'description',
			[
				'label' => __( 'Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'before',
				'placeholder' => __( 'Write Description Here!', 'picchi-extension' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'link_section',
			[
				'label' => __( 'Link', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'link_url',
			[
				'label' => __( 'Link URL', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'before',
				'placeholder' => __( 'Write Link URL Here!', 'picchi-extension' ),
			]
		);
		$this->add_control(
			'link_text',
			[
				'label' => __( 'Link Text', 'picchi-extension' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Write Link Text Here!', 'picchi-extension' ),
			]
		);
		$this->end_controls_section();
		
		// Style Tab
		$this->start_controls_section(
			'styles_section',
			[
				'label' => __( 'Style', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_style',
			[
				'label' => __( 'Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .heading',
			]
		);


		$this->add_control(
			'description_style',
			[
				'label' => __( 'Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .description' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => __( 'Typography', 'picchi-extension' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .description',
			]
		);
		$this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $title  = $settings['title'];
        $description  = $settings['description'];
        $link_url  = $settings['link_url']['url'];
        $link_text  = $settings['link_text'];
    ?>
        <h1 class="heading"><?php echo $title;?></h1>
		<p class="description"><?php echo $description;?></p>
		<a href="<?php echo $link_url;?>"><?php echo $link_text;?></a>
    <?php
    }

}