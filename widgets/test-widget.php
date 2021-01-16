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
			'content_section',
			[
				'label' => __( 'Content', 'picchi-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Write Title Here!', 'picchi-extension' ),
			]
        );
        $this->add_control(
			'description',
			[
				'label' => __( 'Description', 'picchi-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Write Description Here!', 'picchi-extension' ),
			]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $title  = $settings['title'];
        $description  = $settings['description'];
    ?>
        <h1><?php echo $title;?></h1>
        <p><?php echo $description;?></p>
    <?php
    }

}