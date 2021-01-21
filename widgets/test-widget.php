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
		
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style Section', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' => __( 'Additional Options', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);


		$this->add_control(
			'link_text1',
			[
				'label' => __( 'Link Text 1', 'picchi-extension' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Write Link Text Here!', 'picchi-extension' ),
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);

		$this->add_control(
			'link_text2',
			[
				'label' => __( 'Link Text 2', 'picchi-extension' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Write Link Text Here!', 'picchi-extension' ),
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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