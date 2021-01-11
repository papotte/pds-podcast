<?php

namespace PdSPodcast\Controllers;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class
 *
 * @author      Jonathan Bossenger
 * @category    Class
 * @package     PdSPodcast/Controllers
 * @since       1.0
 */
class Extensions_Controller extends Controller {

	public function render_simple_sidebar() {
		$image_dir = $this->assets_url . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
		ob_start();
		include $this->template_path . DIRECTORY_SEPARATOR . 'settings-sidebar.php';

		return ob_get_clean();
	}

	public function render_simple_extensions() {
		add_thickbox();

		$image_dir  = $this->assets_url . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

		$extensions = array(
			'connect'     => array(
				'title'       => __( 'NEW - Castos Podcast Hosting', 'pds-podcast' ),
				'image'       => $image_dir . 'castos-icon-extension.jpg',
				'url'         => SSP_CASTOS_APP_URL,
				'description' => __( 'Host your podcast media files safely and securely in a CDN-powered cloud platform designed specifically to connect beautifully with PdS Podcast.  Faster downloads, better live streaming, and take back security for your web server with Castos.', 'pds-podcast' ),
				'button_text' => __( 'Get Castos Hosting', 'pds-podcast' ),
				'new_window'  => true,
			),
			'stats'       => array(
				'title'       => __( 'PdS Podcast Stats', 'pds-podcast' ),
				'image'       => $image_dir . 'ssp-stats.jpg',
				'url'         => add_query_arg(
					array(
						'tab'       => 'plugin-information',
						'plugin'    => 'simple-stats',
						'TB_iframe' => 'true',
						'width'     => '772',
						'height'    => '859',
					),
					admin_url(
						'plugin-install.php'
					)
				),
				'description' => __( 'Simple Simple Stats offers integrated analytics for your podcast, giving you access to incredibly useful information about who is listening to your podcast and how they are accessing it.', 'pds-podcast' ),
			),
			'transcripts' => array(
				'title'       => __( 'PdS Podcast Transcripts', 'pds-podcast' ),
				'image'       => $image_dir . 'ssp-transcripts.jpg',
				'url'         => add_query_arg(
					array(
						'tab'       => 'plugin-information',
						'plugin'    => 'simple--transcripts',
						'TB_iframe' => 'true',
						'width'     => '772',
						'height'    => '859',
					),
					admin_url(
						'plugin-install.php'
					)
				),
				'description' => __( 'Simple Simple Transcripts gives you a simple and automated way for you to add downloadable transcripts to your podcast episodes. It’s an easy way for you to provide episode transcripts to your listeners without taking up valuable space in your episode content.', 'pds-podcast' ),
			),
			'speakers'    => array(
				'title'       => __( 'Simple PdS Podcast Speakers', 'pds-podcast' ),
				'image'       => $image_dir . 'ssp-speakers.jpg',
				'url'         => add_query_arg(
					array(
						'tab'       => 'plugin-information',
						'plugin'    => 'simple--speakers',
						'TB_iframe' => 'true',
						'width'     => '772',
						'height'    => '859',
					),
					admin_url(
						'plugin-install.php'
					)
				),
				'description' => __( 'Does your podcast have a number of different speakers? Or maybe a different guest each week? Perhaps you have unique hosts for each episode? If any of those options describe your podcast then Simple Simple Speakers is the add-on for you!', 'pds-podcast' ),
			),
			'genesis'     => array(
				'title'       => __( 'Simple PdS Podcast Genesis Support ', 'pds-podcast' ),
				'image'       => $image_dir . 'ssp-genesis.jpg',
				'url'         => add_query_arg(
					array(
						'tab'       => 'plugin-information',
						'plugin'    => 'pds-podcast-genesis-support',
						'TB_iframe' => 'true',
						'width'     => '772',
						'height'    => '859',
					),
					admin_url(
						'plugin-install.php'
					)
				),
				'description' => __( 'The Genesis compatibility add-on for Simple PdS Podcast gives you full support for the Genesis theme framework. It adds support to the podcast post type for the features that Genesis requires. If you are using Genesis and Simple PdS Podcast together then this plugin will make your website look and work much more smoothly.', 'pds-podcast' ),
			),
			'second-line' => array(
				'title'       => __( 'Second Line Themes', 'pds-podcast' ),
				'image'       => $image_dir . 'second-line-themes.png',
				'url'         => 'https://secondlinethemes.com/?utm_source=ssp-settings',
				'description' => __( 'Looking for a dedicated podcast theme to use with Simple PdS Podcast? Check out SecondLineThemes!', 'pds-podcast' ),
				'new_window'  => true,
				'button_text' => __( 'Get Second Line Themes', 'pds-podcast' ),
			),
		);

		if ( ssp_is_elementor_ok() ) {
			$elementor_templates = array(
				'title'       => __( 'Elementor Templates', 'pds-podcast' ),
				'image'       => $image_dir . 'elementor.jpg',
				'url'         => wp_nonce_url( admin_url( 'edit.php?post_type=podcast&page=podcast_settings&tab=extensions&elementor_import_templates=true' ), '', 'import_template_nonce' ),
				'description' => __( 'Looking for a custom elementor template to use with Simple PdS Podcast? Click here to import all of them righ now!', 'pds-podcast' ),
				'button_text' => __( 'Import Templates', 'pds-podcast' ),
				'new_window'  => 'redirect'
			);
			$extensions = array_slice($extensions, 0, 1, true) + array("elementor-templates" =>  $elementor_templates) + array_slice($extensions, 1, count($extensions)-1, true);

		}

		$html = '<div id="ssp-extensions">';
		foreach ( $extensions as $extension ) {
			$html .= '<div class="ssp-extension"><h3 class="ssp-extension-title">' . $extension['title'] . '</h3>';
			if ( ! empty( $extension['new_window'] ) ) {
				if ( isset( $extensions['elementor-templates'] ) && 'redirect' === $extensions['elementor-templates']['new_window'] ) {
					$html .= '<a href="' . $extension['url'] . '" title="' . $extension['title'] . '"><img width="880" height="440" src="' . $extension['image'] . '" class="attachment-showcase size-showcase wp-post-image" alt="" title="' . $extension['title'] . '"></a>';
				} else {
					$html .= '<a href="' . $extension['url'] . '" title="' . $extension['title'] . '" target="_blank"><img width="880" height="440" src="' . $extension['image'] . '" class="attachment-showcase size-showcase wp-post-image" alt="" title="' . $extension['title'] . '"></a>';
				}
			} else {
				$html .= '<a href="' . $extension['url'] . '" title="' . $extension['title'] . '" class="thickbox"><img width="880" height="440" src="' . $extension['image'] . '" class="attachment-showcase size-showcase wp-post-image" alt="" title="' . $extension['title'] . '"></a>';
			}
			$html       .= '<p></p>';
			$html       .= '<p>' . $extension['description'] . '</p>';
			$html       .= '<p></p>';
			$button_text = 'Get this Extension';
			if ( ! empty( $extension['button_text'] ) ) {
				$button_text = $extension['button_text'];
			}
			if ( ! empty( $extension['new_window'] ) ) {
				if ( isset( $extensions['elementor-templates'] ) && 'redirect' === $extensions['elementor-templates']['new_window'] ) {
					$html .= '<a href="' . $extension['url'] . '" title="' . $extension['title'] . '" class="button-secondary">' . $button_text . '</a>';
				} else {
					$html .= '<a href="' . $extension['url'] . '" title="' . $extension['title'] . '" target="_blank" class="button-secondary">' . $button_text . '</a>';
				}
			} else {
				$html .= '<a href="' . $extension['url'] . '" title="' . $extension['title'] . '" class="thickbox button-secondary">' . $button_text . '</a>';
			}
			$html .= '</div>';
		}
		$html .= '</div>';

		return $html;
	}
}
