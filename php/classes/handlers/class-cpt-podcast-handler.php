<?php

namespace SimplePodcasting\Handlers;

/**
 * SSP Custom Post Type Podcast Handler
 *
 * @package Simple Podcasting
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
			'name' => _x('Podcast', 'post type general name', 'simple-podcasting'),
			'singular_name' => _x('Podcast', 'post type singular name', 'simple-podcasting'),
			'add_new' => _x('Add New', SSP_CPT_PODCAST, 'simple-podcasting'),
			'add_new_item' => sprintf(__('Add New %s', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
			'edit_item' => sprintf(__('Edit %s', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
			'new_item' => sprintf(__('New %s', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
			'all_items' => sprintf(__('All %s', 'simple-podcasting'), __('Episodes', 'simple-podcasting')),
			'view_item' => sprintf(__('View %s', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
			'search_items' => sprintf(__('Search %s', 'simple-podcasting'), __('Episodes', 'simple-podcasting')),
			'not_found' => sprintf(__('No %s Found', 'simple-podcasting'), __('Episodes', 'simple-podcasting')),
			'not_found_in_trash' => sprintf(__('No %s Found In Trash', 'simple-podcasting'), __('Episodes', 'simple-podcasting')),
			'parent_item_colon' => '',
			'menu_name' => __('Podcast', 'simple-podcasting'),
			'filter_items_list' => sprintf(__('Filter %s list', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
			'items_list_navigation' => sprintf(__('%s list navigation', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
			'items_list' => sprintf(__('%s list', 'simple-podcasting'), __('Episode', 'simple-podcasting')),
		);
		$slug = apply_filters('ssp_archive_slug', __(SSP_CPT_PODCAST, 'simple-podcasting'));
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
			'name' => __('Tags', 'simple-podcasting'),
			'singular_name' => __('Tag', 'simple-podcasting'),
			'search_items' => __('Search Tags', 'simple-podcasting'),
			'popular_items' => __('Popular Tags', 'simple-podcasting'),
			'all_items' => __('All Tags', 'simple-podcasting'),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __('Edit Tag', 'simple-podcasting'),
			'update_item' => __('Update Tag', 'simple-podcasting'),
			'add_new_item' => __('Add New Tag', 'simple-podcasting'),
			'new_item_name' => __('New Tag Name', 'simple-podcasting'),
			'separate_items_with_commas' => __('Separate tags with commas', 'simple-podcasting'),
			'add_or_remove_items' => __('Add or remove tags', 'simple-podcasting'),
			'choose_from_most_used' => __('Choose from the most used tags', 'simple-podcasting'),
			'not_found' => __('No tags found.', 'simple-podcasting'),
			'menu_name' => __('Tags', 'simple-podcasting'),
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
			'name' => __('Podcast Series', 'simple-podcasting'),
			'singular_name' => __('Series', 'simple-podcasting'),
			'search_items' => __('Search Series', 'simple-podcasting'),
			'all_items' => __('All Series', 'simple-podcasting'),
			'parent_item' => __('Parent Series', 'simple-podcasting'),
			'parent_item_colon' => __('Parent Series:', 'simple-podcasting'),
			'edit_item' => __('Edit Series', 'simple-podcasting'),
			'update_item' => __('Update Series', 'simple-podcasting'),
			'add_new_item' => __('Add New Series', 'simple-podcasting'),
			'new_item_name' => __('New Series Name', 'simple-podcasting'),
			'menu_name' => __('Series', 'simple-podcasting'),
			'view_item' => __('View Series', 'simple-podcasting'),
			'popular_items' => __('Popular Series', 'simple-podcasting'),
			'separate_items_with_commas' => __('Separate series with commas', 'simple-podcasting'),
			'add_or_remove_items' => __('Add or remove Series', 'simple-podcasting'),
			'choose_from_most_used' => __('Choose from the most used Series', 'simple-podcasting'),
			'not_found' => __('No Series Found', 'simple-podcasting'),
			'items_list_navigation' => __('Series list navigation', 'simple-podcasting'),
			'items_list' => __('Series list', 'simple-podcasting'),
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
			'meta_description' => __('The raw file size of the podcast episode media file in bytes.', 'simple-podcasting'),
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
				'name' => __('Buzzsprout episode ID:', 'simple-podcasting'),
				'description' => __('The episode ID on Buzzsprout used to embed the player.', 'simple-podcasting'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The episode ID on Buzzsprout used to embed the player.', 'simple-podcasting'),
			);
			$fields['buzzsprout_slug'] = array(
				'name' => __('Buzzsprout episode slug:', 'simple-podcasting'),
				'description' => __('The episode slug on Buzzsprout used to embed the player.', 'simple-podcasting'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('the episode slug on Buzzsprout used to embed the player.', 'simple-podcasting'),
			);
			$fields['date_recorded'] = array(
				'name' => __('Date recorded:', 'simple-podcasting'),
				'description' => __('The date on which this episode was recorded.', 'simple-podcasting'),
				'type' => 'datepicker',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The date on which the podcast episode was recorded.', 'simple-podcasting'),
			);
		} else {
			$fields['episode_type'] = array(
				'name' => __('Episode type:', 'simple-podcasting'),
				'description' => '',
				'type' => 'radio',
				'default' => 'audio',
				'options' => array(
					'audio' => __('Audio', 'simple-podcasting'),
					'video' => __('Video', 'simple-podcasting')
				),
				'section' => 'info',
				'meta_description' => __('The type of podcast episode - either Audio or Video', 'simple-podcasting'),
			);

			// In v1.14+ the `audio_file` field can actually be either audio or video, but we're keeping the field name here for backwards compatibility
			$fields['audio_file'] = array(
				'name' => __('Episode file:', 'simple-podcasting'),
				'description' => __('Upload audio episode files as MP3 or M4A, video episodes as MP4, or paste the file URL.', 'simple-podcasting'),
				'type' => 'file',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The full URL for the podcast episode media file.', 'simple-podcasting'),
			);

			//
			if (ssp_is_connected_to_castos()) {
				$fields['podmotor_file_id'] = array(
					'type' => 'hidden',
					'default' => '',
					'section' => 'info',
					'meta_description' => __('Simple Hosting file id.', 'simple-podcasting'),
				);
			}

			$fields['cover_image'] = array(
				'name' => __('Episode Image:', 'simple-podcasting'),
				'description' => __('The episode image should be square to display properly in podcasting apps and directories, and should be at least 300x300px in size.', 'simple-podcasting'),
				'type' => 'image',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The full URL of image file used in HTML 5 player if available.', 'simple-podcasting'),
			);

			$fields['cover_image_id'] = array(
				'type' => 'hidden',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('Cover image id.', 'simple-podcasting'),
			);

			$fields['duration'] = array(
				'name' => __('Duration:', 'simple-podcasting'),
				'description' => __('Duration of podcast file for display (calculated automatically if possible).', 'simple-podcasting'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The duration of the file for display purposes.', 'simple-podcasting'),
			);

			$fields['filesize'] = array(
				'name' => __('File size:', 'simple-podcasting'),
				'description' => __('Size of the podcast file for display (calculated automatically if possible).', 'simple-podcasting'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The size of the podcast episode for display purposes.', 'simple-podcasting'),
			);

			if (ssp_is_connected_to_castos()) {
				$fields['filesize_raw'] = array(
					'type' => 'hidden',
					'default' => '',
					'section' => 'info',
					'meta_description' => __('Raw size of the podcast episode.', 'simple-podcasting'),
				);
			}

			$fields['date_recorded'] = array(
				'name' => __('Date recorded:', 'simple-podcasting'),
				'description' => __('The date on which this episode was recorded.', 'simple-podcasting'),
				'type' => 'datepicker',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The date on which the podcast episode was recorded.', 'simple-podcasting'),
			);

			$fields['explicit'] = array(
				'name' => __('Explicit:', 'simple-podcasting'),
				'description' => __('Mark this episode as explicit.', 'simple-podcasting'),
				'type' => 'checkbox',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('Indicates whether the episode is explicit.', 'simple-podcasting'),
			);

			$fields['block'] = array(
				'name' => __('Block:', 'simple-podcasting'),
				'description' => __('Block this episode from appearing in the iTunes & Google Play podcast libraries.', 'simple-podcasting'),
				'type' => 'checkbox',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('Indicates whether this specific episode should be blocked from the iTunes and Google Play Podcast libraries.', 'simple-podcasting'),
			);
		}
		if ($is_itunes_fields_enabled && $is_itunes_fields_enabled == 'on') {
			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_episode_number'] = array(
				'name' => __('iTunes Episode Number:', 'simple-podcasting'),
				'description' => __('The iTunes Episode Number. Leave Blank If None.', 'simple-podcasting'),
				'type' => 'number',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The iTunes Episode Number. Leave Blank If None.', 'simple-podcasting'),
			);

			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_title'] = array(
				'name' => __('iTunes Episode Title (Exclude Your Series / Show Number):', 'simple-podcasting'),
				'description' => __('The iTunes Episode Title. NO Series / Show Number Should Be Included.', 'simple-podcasting'),
				'type' => 'text',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The iTunes Episode Title. NO Series / Show Number Should Be Included', 'simple-podcasting'),
			);

			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_season_number'] = array(
				'name' => __('iTunes Season Number:', 'simple-podcasting'),
				'description' => __('The iTunes Season Number. Leave Blank If None.', 'simple-podcasting'),
				'type' => 'number',
				'default' => '',
				'section' => 'info',
				'meta_description' => __('The iTunes Season Number. Leave Blank If None.', 'simple-podcasting'),
			);

			/**
			 * New iTunes Tag Announced At WWDC 2017
			 */
			$fields['itunes_episode_type'] = array(
				'name' => __('iTunes Episode Type:', 'simple-podcasting'),
				'description' => '',
				'type' => 'select',
				'default' => '',
				'options' => array(
					'' => __('Please Select', 'simple-podcasting'),
					'full' => __('Full: For Normal Episodes', 'simple-podcasting'),
					'trailer' => __('Trailer: Promote an Upcoming Show', 'simple-podcasting'),
					'bonus' => __('Bonus: For Extra Content Related To a Show', 'simple-podcasting')
				),
				'section' => 'info',
				'meta_description' => __('The iTunes Episode Type', 'simple-podcasting'),
			);
		}

		return apply_filters('ssp_episode_fields', $fields);
	}
}
