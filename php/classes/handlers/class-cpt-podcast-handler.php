<?php

namespace PdSPodcast\Handlers;

/**
 * SSP Custom Post Type Podcast Handler
 *
 * @package PdS Podcasting
 * @since 2.6.3 Moved from the admin controller class
 */
class CPT_Podcast_Handler
{

	protected $roles_handler;

	/**
	 * CPT_Podcast_Handler constructor.
	 *
	 * @param Roles_Handler $roles_handler
	 */
	public function __construct($roles_handler)
	{
		$this->roles_handler = $roles_handler;
	}

	/**
	 * Register SSP_CPT_PODCAST post type
	 *
	 * @return void
	 */
	public function register_post_type()
	{
		register_post_type(SSP_CPT_PODCAST, $this->get_podcast_args());

		$this->register_taxonomies();
		$this->register_meta();
	}

	/**
	 * Register taxonomies
	 * @return void
	 */
	protected function register_taxonomies()
	{
		$podcast_post_types = ssp_post_types(true);

		$args = $this->get_series_args();
		register_taxonomy(apply_filters('ssp_series_taxonomy', 'series'), $podcast_post_types, $args);

		// Add Tags to podcast post type
		if (apply_filters('ssp_use_post_tags', true)) {
			register_taxonomy_for_object_type('post_tag', SSP_CPT_PODCAST);
		} else {
			/**
			 * Uses post tags by default. Alternative option added in as some users
			 * want to filter by podcast tags only
			 */
			$args = $this->get_podcast_tags_args();
			register_taxonomy(apply_filters('ssp_podcast_tags_taxonomy', 'podcast_tags'), $podcast_post_types, $args);
		}
	}

	protected function get_podcast_args()
	{
		$labels = array(
			'name' => _x('Podcast', 'post type general name', 'pds-podcast'),
			'singular_name' => _x('Podcast', 'post type singular name', 'pds-podcast'),
			'add_new' => _x('Add New', SSP_CPT_PODCAST, 'pds-podcast'),
			'add_new_item' => sprintf(__('Add New %s', 'pds-podcast'), __('Episode', 'pds-podcast')),
			'edit_item' => sprintf(__('Edit %s', 'pds-podcast'), __('Episode', 'pds-podcast')),
			'new_item' => sprintf(__('New %s', 'pds-podcast'), __('Episode', 'pds-podcast')),
			'all_items' => sprintf(__('All %s', 'pds-podcast'), __('Episodes', 'pds-podcast')),
			'view_item' => sprintf(__('View %s', 'pds-podcast'), __('Episode', 'pds-podcast')),
			'search_items' => sprintf(__('Search %s', 'pds-podcast'), __('Episodes', 'pds-podcast')),
			'not_found' => sprintf(__('No %s Found', 'pds-podcast'), __('Episodes', 'pds-podcast')),
			'not_found_in_trash' => sprintf(__('No %s Found In Trash', 'pds-podcast'), __('Episodes', 'pds-podcast')),
			'parent_item_colon' => '',
			'menu_name' => __('Podcast', 'pds-podcast'),
			'filter_items_list' => sprintf(__('Filter %s list', 'pds-podcast'), __('Episode', 'pds-podcast')),
			'items_list_navigation' => sprintf(__('%s list navigation', 'pds-podcast'), __('Episode', 'pds-podcast')),
			'items_list' => sprintf(__('%s list', 'pds-podcast'), __('Episode', 'pds-podcast')),
		);
		$slug = apply_filters('ssp_archive_slug', __(SSP_CPT_PODCAST, 'pds-podcast'));
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => array('slug' => $slug, 'feeds' => true),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes',
				'comments',
				'author',
				'custom-fields',
				'publicize',
			),
			'menu_position' => 5,
			'menu_icon' => 'dashicons-microphone',
			'show_in_rest' => true,
			'capabilities' => $this->roles_handler->get_podcast_capabilities(),
		);

		return apply_filters('ssp_register_post_type_args', $args, SSP_CPT_PODCAST);
	}

	protected function get_podcast_tags_args()
	{
		$labels = array(
			'name' => __('Tags', 'pds-podcast'),
			'singular_name' => __('Tag', 'pds-podcast'),
			'search_items' => __('Search Tags', 'pds-podcast'),
			'popular_items' => __('Popular Tags', 'pds-podcast'),
			'all_items' => __('All Tags', 'pds-podcast'),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __('Edit Tag', 'pds-podcast'),
			'update_item' => __('Update Tag', 'pds-podcast'),
			'add_new_item' => __('Add New Tag', 'pds-podcast'),
			'new_item_name' => __('New Tag Name', 'pds-podcast'),
			'separate_items_with_commas' => __('Separate tags with commas', 'pds-podcast'),
			'add_or_remove_items' => __('Add or remove tags', 'pds-podcast'),
			'choose_from_most_used' => __('Choose from the most used tags', 'pds-podcast'),
			'not_found' => __('No tags found.', 'pds-podcast'),
			'menu_name' => __('Tags', 'pds-podcast'),
		);

		$args = array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array('slug' => 'podcast_tags'),
			'capabilities' => $this->roles_handler->get_podcast_tax_capabilities(),
		);

		return apply_filters('ssp_register_taxonomy_args', $args, 'podcast_tags');
	}

	protected function get_series_args()
	{
		$series_labels = array(
			'name' => __('Podcast Series', 'pds-podcast'),
			'singular_name' => __('Series', 'pds-podcast'),
			'search_items' => __('Search Series', 'pds-podcast'),
			'all_items' => __('All Series', 'pds-podcast'),
			'parent_item' => __('Parent Series', 'pds-podcast'),
			'parent_item_colon' => __('Parent Series:', 'pds-podcast'),
			'edit_item' => __('Edit Series', 'pds-podcast'),
			'update_item' => __('Update Series', 'pds-podcast'),
			'add_new_item' => __('Add New Series', 'pds-podcast'),
			'new_item_name' => __('New Series Name', 'pds-podcast'),
			'menu_name' => __('Series', 'pds-podcast'),
			'view_item' => __('View Series', 'pds-podcast'),
			'popular_items' => __('Popular Series', 'pds-podcast'),
			'separate_items_with_commas' => __('Separate series with commas', 'pds-podcast'),
			'add_or_remove_items' => __('Add or remove Series', 'pds-podcast'),
			'choose_from_most_used' => __('Choose from the most used Series', 'pds-podcast'),
			'not_found' => __('No Series Found', 'pds-podcast'),
			'items_list_navigation' => __('Series list navigation', 'pds-podcast'),
			'items_list' => __('Series list', 'pds-podcast'),
		);

		$series_args = array(
			'public' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => apply_filters('ssp_series_slug', 'series')),
			'labels' => $series_labels,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'capabilities' => $this->roles_handler->get_podcast_tax_capabilities(),
		);

		return apply_filters('ssp_register_taxonomy_args', $series_args, 'series');
	}

	/**
	 * Registers podcast meta fields
	 * */
	protected function register_meta()
	{
		global $wp_version;

		// The enhanced register_meta function is only available for WordPress 4.6+
		if (version_compare($wp_version, '4.6', '<')) {
			return;
		}

		// Get all displayed custom fields
		$fields = $this->custom_fields();

		// Add 'filesize_raw' as this is not included in the displayed field options
		$fields['filesize_raw'] = array(
			'meta_description' => __('The raw file size of the podcast episode media file in bytes.', 'pds-podcast'),
		);

		foreach ($fields as $key => $data) {

			$args = array(
				'type' => 'string',
				'description' => isset($data['meta_description']) ? $data['meta_description'] : "",
				'single' => true,
				'show_in_rest' => true,
			);

			register_meta('post', $key, $args);
		}
	}


	/**
	 * Setup custom fields for episodes
	 * @return array Custom fields
	 */
	public function custom_fields()
	{
		$is_itunes_fields_enabled = get_option('ss_podcasting_itunes_fields_enabled');
		$is_buzzsprout_enabled = get_option('ss_podcasting_buzzsprout_enabled');
		$fields = array();
		if ($is_buzzsprout_enabled && $is_buzzsprout_enabled == 'on') {
			$fields['buzzsprout_id'] = array(
				'name' => __('Buzzsprout episode ID:', 'pds-podcast'),
				'description' => __('The episode ID on Buzzsprout used to embed the player.', 'pds-podcast'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The episode ID on Buzzsprout used to embed the player.', 'pds-podcast'),
			);
			$fields['buzzsprout_slug'] = array(
				'name' => __('Buzzsprout episode slug:', 'pds-podcast'),
				'description' => __('The episode slug on Buzzsprout used to embed the player.', 'pds-podcast'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('the episode slug on Buzzsprout used to embed the player.', 'pds-podcast'),
			);
			$fields['date_recorded'] = array(
				'name' => __('Date recorded:', 'pds-podcast'),
				'description' => __('The date on which this episode was recorded.', 'pds-podcast'),
				'type' => 'datepicker',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The date on which the podcast episode was recorded.', 'pds-podcast'),
			);
		} else {
			$fields['episode_type'] = array(
				'name' => __('Episode type:', 'pds-podcast'),
				'description' => '',
				'type' => 'radio',
				'default' => 'audio',
				'options' => array(
					'audio' => __('Audio', 'pds-podcast'),
					'video' => __('Video', 'pds-podcast')
				),
				'section' => 'info',
				'meta_description' => __('The type of podcast episode - either Audio or Video', 'pds-podcast'),
			);

			// In v1.14+ the `audio_file` field can actually be either audio or video, but we're keeping the field name here for backwards compatibility
			$fields['audio_file'] = array(
				'name' => __('Episode file:', 'pds-podcast'),
				'description' => __('Upload audio episode files as MP3 or M4A, video episodes as MP4, or paste the file URL.', 'pds-podcast'),
				'type' => 'file',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The full URL for the podcast episode media file.', 'pds-podcast'),
			);

			//
			if (ssp_is_connected_to_castos()) {
				$fields['podmotor_file_id'] = array(
					'type' => 'hidden',
					'default' => '',
					'section' => 'info',
					'meta_description' => __('Simple Hosting file id.', 'pds-podcast'),
				);
			}

			$fields['cover_image'] = array(
				'name' => __('Episode Image:', 'pds-podcast'),
				'description' => __('The episode image should be square to display properly in podcasting apps and directories, and should be at least 300x300px in size.', 'pds-podcast'),
				'type' => 'image',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The full URL of image file used in HTML 5 player if available.', 'pds-podcast'),
			);

			$fields['cover_image_id'] = array(
				'type' => 'hidden',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('Cover image id.', 'pds-podcast'),
			);

			$fields['duration'] = array(
				'name' => __('Duration:', 'pds-podcast'),
				'description' => __('Duration of podcast file for display (calculated automatically if possible).', 'pds-podcast'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The duration of the file for display purposes.', 'pds-podcast'),
			);

			$fields['filesize'] = array(
				'name' => __('File size:', 'pds-podcast'),
				'description' => __('Size of the podcast file for display (calculated automatically if possible).', 'pds-podcast'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The size of the podcast episode for display purposes.', 'pds-podcast'),
			);

			if (ssp_is_connected_to_castos()) {
				$fields['filesize_raw'] = array(
					'type' => 'hidden',
					'default' => '',
					'section' => 'info',
					'meta_description' => __('Raw size of the podcast episode.', 'pds-podcast'),
				);
			}

			$fields['date_recorded'] = array(
				'name' => __('Date recorded:', 'pds-podcast'),
				'description' => __('The date on which this episode was recorded.', 'pds-podcast'),
				'type' => 'datepicker',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The date on which the podcast episode was recorded.', 'pds-podcast'),
			);

			$fields['explicit'] = array(
				'name' => __('Explicit:', 'pds-podcast'),
				'description' => __('Mark this episode as explicit.', 'pds-podcast'),
				'type' => 'checkbox',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('Indicates whether the episode is explicit.', 'pds-podcast'),
			);

			$fields['block'] = array(
				'name' => __('Block:', 'pds-podcast'),
				'description' => __('Block this episode from appearing in the iTunes & Google Play podcast libraries.', 'pds-podcast'),
				'type' => 'checkbox',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('Indicates whether this specific episode should be blocked from the iTunes and Google Play Podcast libraries.', 'pds-podcast'),
			);
		}
		if ($is_itunes_fields_enabled && $is_itunes_fields_enabled == 'on') {
			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_episode_number'] = array(
				'name' => __('iTunes Episode Number:', 'pds-podcast'),
				'description' => __('The iTunes Episode Number. Leave Blank If None.', 'pds-podcast'),
				'type' => 'number',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The iTunes Episode Number. Leave Blank If None.', 'pds-podcast'),
			);

			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_title'] = array(
				'name' => __('iTunes Episode Title (Exclude Your Series / Show Number):', 'pds-podcast'),
				'description' => __('The iTunes Episode Title. NO Series / Show Number Should Be Included.', 'pds-podcast'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The iTunes Episode Title. NO Series / Show Number Should Be Included', 'pds-podcast'),
			);

			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_season_number'] = array(
				'name' => __('iTunes Season Number:', 'pds-podcast'),
				'description' => __('The iTunes Season Number. Leave Blank If None.', 'pds-podcast'),
				'type' => 'number',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The iTunes Season Number. Leave Blank If None.', 'pds-podcast'),
			);

			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_episode_type'] = array(
				'name' => __('iTunes Episode Type:', 'pds-podcast'),
				'description' => '',
				'type' => 'select',
				'default' => '',
				'options' => array(
					'' => __('Please Select', 'pds-podcast'),
					'full' => __('Full: For Normal Episodes', 'pds-podcast'),
					'trailer' => __('Trailer: Promote an Upcoming Show', 'pds-podcast'),
					'bonus' => __('Bonus: For Extra Content Related To a Show', 'pds-podcast')
				),
				'section' => 'info',
				'meta_description' => __('The iTunes Episode Type', 'pds-podcast'),
			);
		}

		return apply_filters('ssp_episode_fields', $fields);
	}
}
