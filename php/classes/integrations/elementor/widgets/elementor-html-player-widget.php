<?php

namespace PdSPodcast\Integrations\Elementor\Widgets;

use PdSPodcast\Controllers\Players_Controller;

class Elementor_Html_Player_Widget extends \Elementor\Widget_Base {

	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		$this->register_scripts_and_styles();
	}

	/**
	 * Register any scripts and styles for this widget
	 */
	public function register_scripts_and_styles() {
		if ( wp_script_is( 'ssp-castos-player', 'registered' ) && ! wp_script_is( 'ssp-castos-player', 'enqueued' ) ) {
			wp_enqueue_script( 'ssp-castos-player' );
		}
		if ( wp_style_is( 'ssp-castos-player', 'registered' ) && ! wp_style_is( 'ssp-castos-player', 'enqueued' ) ) {
			wp_enqueue_style( 'ssp-castos-player' );
		}
	}

	public function get_name() {
		return 'Castos Player';
	}

	public function get_title() {
		return __( 'Castos Player', 'pds-podcast' );
	}

	public function get_icon() {
		return 'fa fa-html5';
	}

	public function get_categories() {
		return [ 'podcasting' ];
	}

	public function get_episodes() {
		$args = array(
			'fields'         => array( 'post_title, id' ),
			'posts_per_page' => get_option('posts_per_page', 10),
			'post_type'      => ssp_post_types( true ),
			'post_status'    => array( 'publish', 'draft', 'future' ),
		);

		$episodes       = get_posts( $args );
		$episode_options = [
			'-1' => 'Current Epsiode',
			'0'   => 'Latest Epsiode',
		];
		foreach ( $episodes as $episode ) {
			$episode_options[ (string) $episode->ID ] = $episode->post_title;
		}

		return $episode_options;
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'pds-podcast' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$episode_options = $this->get_episodes();

		$this->add_control(
			'show_elements',
			[
				'label'   => __( 'Select Episode', 'pds-podcast' ),
				'type'    => \Elementor\Controls_Manager::SELECT2,
				'options' => $episode_options,
				'default' => '-1'
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$players_controller = new Players_Controller( __FILE__, SSP_VERSION );
		$settings           = $this->get_settings_for_display();
		$episode_id         = $settings['show_elements'];
		if ( '-1' === $episode_id ) {
			$episode_id = get_post()->ID;
		}
		if ( empty( $episode_id ) ) {
			$episode_id = $players_controller->get_latest_episode_id();
		}
		$html_player = $players_controller->render_html_player( $episode_id );
		echo $html_player;
	}

	protected function _content_template() {
		?>
        <# _.each( settings.show_elements, function( element ) { #>
        <div>{{{ element }}}</div>
        <# } ) #>
		<?php
	}
}
