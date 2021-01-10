<?php

namespace SimplePodcasting\Handlers;

/**
 * SSP Settings Handler
 *
 * @package Simple Podcasting
 */

class Settings_Handler {

	/**
	 * Build settings fields
	 *
	 * @return array Fields to be displayed on settings page.
	 */
	public function settings_fields() {
		global $wp_post_types;

		$post_type_options = array();

		// Set options for post type selection.
		foreach ( $wp_post_types as $post_type => $data ) {

			$disallowed_post_types = array(
				'page',
				'attachment',
				'revision',
				'nav_menu_item',
				'wooframework',
				'podcast',
			);
			if ( in_array( $post_type, $disallowed_post_types, true ) ) {
				continue;
			}

			$post_type_options[ $post_type ] = $data->labels->name;
		}

		// Set up available category options.
		$category_options = array(
			''                        => __( '-- None --', 'simple-podcasting' ),
			'Arts'                    => __( 'Arts', 'simple-podcasting' ),
			'Business'                => __( 'Business', 'simple-podcasting' ),
			'Comedy'                  => __( 'Comedy', 'simple-podcasting' ),
			'Education'               => __( 'Education', 'simple-podcasting' ),
			'Fiction'                 => __( 'Fiction', 'simple-podcasting' ),
			'Government'              => __( 'Government', 'simple-podcasting' ),
			'History'                 => __( 'History', 'simple-podcasting' ),
			'Health & Fitness'        => __( 'Health & Fitness', 'simple-podcasting' ),
			'Kids & Family'           => __( 'Kids & Family', 'simple-podcasting' ),
			'Leisure'                 => __( 'Leisure', 'simple-podcasting' ),
			'Music'                   => __( 'Music', 'simple-podcasting' ),
			'News'                    => __( 'News', 'simple-podcasting' ),
			'Religion & Spirituality' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			'Science'                 => __( 'Science', 'simple-podcasting' ),
			'Society & Culture'       => __( 'Society & Culture', 'simple-podcasting' ),
			'Sports'                  => __( 'Sports', 'simple-podcasting' ),
			'Technology'              => __( 'Technology', 'simple-podcasting' ),
			'True Crime'              => __( 'True Crime', 'simple-podcasting' ),
			'TV & Film'               => __( 'TV & Film', 'simple-podcasting' ),
		);

		// Set up available sub-category options.
		$subcategory_options = array(
			''                   => __( '-- None --', 'simple-podcasting' ),
			'Books'              => array(
				'label' => __( 'Books', 'simple-podcasting' ),
				'group' => __( 'Arts', 'simple-podcasting' ),
			),
			'Design'             => array(
				'label' => __( 'Design', 'simple-podcasting' ),
				'group' => __( 'Arts', 'simple-podcasting' ),
			),
			'Fashion & Beauty'   => array(
				'label' => __( 'Fashion & Beauty', 'simple-podcasting' ),
				'group' => __( 'Arts', 'simple-podcasting' ),
			),
			'Food'               => array(
				'label' => __( 'Food', 'simple-podcasting' ),
				'group' => __( 'Arts', 'simple-podcasting' ),
			),
			'Performing Arts'    => array(
				'label' => __( 'Performing Arts', 'simple-podcasting' ),
				'group' => __( 'Arts', 'simple-podcasting' ),
			),
			'Visual Arts'        => array(
				'label' => __( 'Visual Arts', 'simple-podcasting' ),
				'group' => __( 'Arts', 'simple-podcasting' ),
			),
			'Careers'            => array(
				'label' => __( 'Careers', 'simple-podcasting' ),
				'group' => __( 'Business', 'simple-podcasting' ),
			),
			'Entrepreneurship'   => array(
				'label' => __( 'Entrepreneurship', 'simple-podcasting' ),
				'group' => __( 'Business', 'simple-podcasting' ),
			),
			'Investing'          => array(
				'label' => __( 'Investing', 'simple-podcasting' ),
				'group' => __( 'Business', 'simple-podcasting' ),
			),
			'Management'         => array(
				'label' => __( 'Management', 'simple-podcasting' ),
				'group' => __( 'Business', 'simple-podcasting' ),
			),
			'Marketing'          => array(
				'label' => __( 'Marketing', 'simple-podcasting' ),
				'group' => __( 'Business', 'simple-podcasting' ),
			),
			'Non-profit'         => array(
				'label' => __( 'Non-profit', 'simple-podcasting' ),
				'group' => __( 'Business', 'simple-podcasting' ),
			),
			'Comedy Interviews'  => array(
				'label' => __( 'Comedy Interviews', 'simple-podcasting' ),
				'group' => __( 'Comedy', 'simple-podcasting' ),
			),
			'Improv'             => array(
				'label' => __( 'Improv', 'simple-podcasting' ),
				'group' => __( 'Comedy', 'simple-podcasting' ),
			),
			'Standup'            => array(
				'label' => __( 'Standup', 'simple-podcasting' ),
				'group' => __( 'Comedy', 'simple-podcasting' ),
			),
			'Courses'            => array(
				'label' => __( 'Courses', 'simple-podcasting' ),
				'group' => __( 'Education', 'simple-podcasting' ),
			),
			'How to'             => array(
				'label' => __( 'How to', 'simple-podcasting' ),
				'group' => __( 'Education', 'simple-podcasting' ),
			),
			'Language Learning'  => array(
				'label' => __( 'Language Learning', 'simple-podcasting' ),
				'group' => __( 'Education', 'simple-podcasting' ),
			),
			'Self Improvement'   => array(
				'label' => __( 'Self Improvement', 'simple-podcasting' ),
				'group' => __( 'Education', 'simple-podcasting' ),
			),
			'Comedy Fiction'     => array(
				'label' => __( 'Comedy Fiction', 'simple-podcasting' ),
				'group' => __( 'Fiction', 'simple-podcasting' ),
			),
			'Drama'              => array(
				'label' => __( 'Drama', 'simple-podcasting' ),
				'group' => __( 'Fiction', 'simple-podcasting' ),
			),
			'Science Fiction'    => array(
				'label' => __( 'Science Fiction', 'simple-podcasting' ),
				'group' => __( 'Fiction', 'simple-podcasting' ),
			),
			'Alternative Health' => array(
				'label' => __( 'Alternative Health', 'simple-podcasting' ),
				'group' => __( 'Health & Fitness', 'simple-podcasting' ),
			),
			'Fitness'            => array(
				'label' => __( 'Fitness', 'simple-podcasting' ),
				'group' => __( 'Health & Fitness', 'simple-podcasting' ),
			),
			'Medicine'           => array(
				'label' => __( 'Medicine', 'simple-podcasting' ),
				'group' => __( 'Health & Fitness', 'simple-podcasting' ),
			),
			'Mental Health'      => array(
				'label' => __( 'Mental Health', 'simple-podcasting' ),
				'group' => __( 'Health & Fitness', 'simple-podcasting' ),
			),
			'Nutrition'          => array(
				'label' => __( 'Nutrition', 'simple-podcasting' ),
				'group' => __( 'Health & Fitness', 'simple-podcasting' ),
			),
			'Sexuality'          => array(
				'label' => __( 'Sexuality', 'simple-podcasting' ),
				'group' => __( 'Health & Fitness', 'simple-podcasting' ),
			),
			'Education for Kids' => array(
				'label' => __( 'Education for Kids', 'simple-podcasting' ),
				'group' => __( 'Kids & Family', 'simple-podcasting' ),
			),
			'Parenting'          => array(
				'label' => __( 'Parenting', 'simple-podcasting' ),
				'group' => __( 'Kids & Family', 'simple-podcasting' ),
			),
			'Pets & Animals'     => array(
				'label' => __( 'Pets & Animals', 'simple-podcasting' ),
				'group' => __( 'Kids & Family', 'simple-podcasting' ),
			),
			'Stories for Kids'   => array(
				'label' => __( 'Stories for Kids', 'simple-podcasting' ),
				'group' => __( 'Kids & Family', 'simple-podcasting' ),
			),
			'Animation & Manga'  => array(
				'label' => __( 'Animation & Manga', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Automotive'         => array(
				'label' => __( 'Automotive', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Aviation'           => array(
				'label' => __( 'Aviation', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Crafts'             => array(
				'label' => __( 'Crafts', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Games'              => array(
				'label' => __( 'Games', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Hobbies'            => array(
				'label' => __( 'Hobbies', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Home & Garden'      => array(
				'label' => __( 'Home & Garden', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Video Games'        => array(
				'label' => __( 'Video Games', 'simple-podcasting' ),
				'group' => __( 'Leisure', 'simple-podcasting' ),
			),
			'Music Commentary'  => array(
				'label' => __( 'Music Commentary', 'simple-podcasting' ),
				'group' => __( 'Music', 'simple-podcasting' ),
			),
			'Music History'      => array(
				'label' => __( 'Music History', 'simple-podcasting' ),
				'group' => __( 'Music', 'simple-podcasting' ),
			),
			'Music Interviews'   => array(
				'label' => __( 'Music Interviews', 'simple-podcasting' ),
				'group' => __( 'Music', 'simple-podcasting' ),
			),
			'Business News'      => array(
				'label' => __( 'Business News', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'Daily News'         => array(
				'label' => __( 'Daily News', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'Entertainment News' => array(
				'label' => __( 'Entertainment News', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'News Commentary'    => array(
				'label' => __( 'News Commentary', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'Politics'           => array(
				'label' => __( 'Politics', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'Sports News'       => array(
				'label' => __( 'Sports News ', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'Tech News'          => array(
				'label' => __( 'Tech News', 'simple-podcasting' ),
				'group' => __( 'News', 'simple-podcasting' ),
			),
			'Buddhism'           => array(
				'label' => __( 'Buddhism', 'simple-podcasting' ),
				'group' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			),
			'Christianity'       => array(
				'label' => __( 'Christianity', 'simple-podcasting' ),
				'group' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			),
			'Hinduism'           => array(
				'label' => __( 'Hinduism', 'simple-podcasting' ),
				'group' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			),
			'Islam'              => array(
				'label' => __( 'Islam', 'simple-podcasting' ),
				'group' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			),
			'Judaism'            => array(
				'label' => __( 'Judaism', 'simple-podcasting' ),
				'group' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			),
			'Spirituality'       => array(
				'label' => __( 'Spirituality', 'simple-podcasting' ),
				'group' => __( 'Religion & Spirituality', 'simple-podcasting' ),
			),
			'Astronomy'          => array(
				'label' => __( 'Astronomy', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Chemistry'          => array(
				'label' => __( 'Chemistry', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Earth Sciences'     => array(
				'label' => __( 'Earth Sciences', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Life Sciences'      => array(
				'label' => __( 'Life Sciences', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Mathematics'        => array(
				'label' => __( 'Mathematics', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Natural Sciences'   => array(
				'label' => __( 'Natural Sciences', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Nature'             => array(
				'label' => __( 'Nature', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Physics'            => array(
				'label' => __( 'Physics', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Social Sciences'    => array(
				'label' => __( 'Social Sciences', 'simple-podcasting' ),
				'group' => __( 'Science', 'simple-podcasting' ),
			),
			'Documentary'        => array(
				'label' => __( 'Documentary', 'simple-podcasting' ),
				'group' => __( 'Society & Culture', 'simple-podcasting' ),
			),
			'Personal Journals'  => array(
				'label' => __( 'Personal Journals', 'simple-podcasting' ),
				'group' => __( 'Society & Culture', 'simple-podcasting' ),
			),
			'Philosophy'         => array(
				'label' => __( 'Philosophy', 'simple-podcasting' ),
				'group' => __( 'Society & Culture', 'simple-podcasting' ),
			),
			'Places & Travel'    => array(
				'label' => __( 'Places & Travel', 'simple-podcasting' ),
				'group' => __( 'Society & Culture', 'simple-podcasting' ),
			),
			'Relationships'      => array(
				'label' => __( 'Relationships', 'simple-podcasting' ),
				'group' => __( 'Society & Culture', 'simple-podcasting' ),
			),
			'Baseball'           => array(
				'label' => __( 'Baseball', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Basketball'         => array(
				'label' => __( 'Basketball', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Cricket'            => array(
				'label' => __( 'Cricket', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Fantasy Sports'    => array(
				'label' => __( 'Fantasy Sports ', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Football'           => array(
				'label' => __( 'Football', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Golf'               => array(
				'label' => __( 'Golf', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Hockey'             => array(
				'label' => __( 'Hockey', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Rugby'              => array(
				'label' => __( 'Rugby', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Running'            => array(
				'label' => __( 'Running', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Soccer'             => array(
				'label' => __( 'Soccer', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Swimming'           => array(
				'label' => __( 'Swimming', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Tennis'             => array(
				'label' => __( 'Tennis', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Volleyball'         => array(
				'label' => __( 'Volleyball', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Wilderness'         => array(
				'label' => __( 'Wilderness', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'Wrestling'          => array(
				'label' => __( 'Wrestling', 'simple-podcasting' ),
				'group' => __( 'Sports', 'simple-podcasting' ),
			),
			'After Shows'        => array(
				'label' => __( 'After Shows', 'simple-podcasting' ),
				'group' => __( 'TV & Film', 'simple-podcasting' ),
			),
			'Film History'       => array(
				'label' => __( 'Film History', 'simple-podcasting' ),
				'group' => __( 'TV & Film', 'simple-podcasting' ),
			),
			'Film Interviews'    => array(
				'label' => __( 'Film Interviews', 'simple-podcasting' ),
				'group' => __( 'TV & Film', 'simple-podcasting' ),
			),
			'Film Reviews'       => array(
				'label' => __( 'Film Reviews', 'simple-podcasting' ),
				'group' => __( 'TV & Film', 'simple-podcasting' ),
			),
			'TV Reviews'         => array(
				'label' => __( 'TV Reviews', 'simple-podcasting' ),
				'group' => __( 'TV & Film', 'simple-podcasting' ),
			),
		);

		$settings = array();

		$settings['general'] = array(
			'title'       => __( 'General', 'simple-podcasting' ),
			'description' => __( 'General Settings', 'simple-podcasting' ),
			'fields'      => array(
				array(
					'id'          => 'use_post_types',
					'label'       => __( 'Podcast post types', 'simple-podcasting' ),
					'description' => __( 'Use this setting to enable podcast functions on any post type - this will add all podcast posts from the specified types to your podcast feed.', 'simple-podcasting' ),
					'type'        => 'checkbox_multi',
					'options'     => $post_type_options,
					'default'     => array(),
				),
				array(
					'id'          => 'include_in_main_query',
					'label'       => __( 'Include podcast in main blog', 'simple-podcasting' ),
					'description' => __( 'This setting may behave differently in each theme, so test it carefully after activation - it will add the \'podcast\' post type to your site\'s main query so that your podcast episodes appear on your home page along with your blog posts.', 'simple-podcasting' ),
					'type'        => 'checkbox',
					'default'     => '',
				),
				array(
					'id'          => 'itunes_fields_enabled',
					'label'       => __( 'Enable iTunes fields ', 'simple-podcasting' ),
					'description' => __( 'Turn this on to enable the iTunes iOS11 specific fields on each episode.', 'simple-podcasting' ),
					'type'        => 'checkbox',
					'default'     => '',
				),
			),
		);

		$settings['player-settings'] = array(
			'title'       => __( 'Player', 'simple-podcasting' ),
			'description' => __( 'Player Settings', 'simple-podcasting' ),
			'fields'      => array(
				array(
					'id'          => 'player_locations',
					'label'       => __( 'Media player locations', 'simple-podcasting' ),
					'description' => __( 'Select where to show the podcast media player along with the episode data (download link, duration and file size)', 'simple-podcasting' ),
					'type'        => 'checkbox_multi',
					'options'     => array(
						'content'       => __( 'Full content', 'simple-podcasting' ),
						'excerpt'       => __( 'Excerpt', 'simple-podcasting' ),
						'excerpt_embed' => __( 'oEmbed Excerpt', 'simple-podcasting' ),
					),
					'default'     => 'content',
				),
				array(
					'id'          => 'player_content_location',
					'label'       => __( 'Media player position', 'simple-podcasting' ),
					'description' => __( 'Select whether to display the media player above or below the full post content.', 'simple-podcasting' ),
					'type'        => 'radio',
					'options'     => array(
						'above' => __( 'Above content', 'simple-podcasting' ),
						'below' => __( 'Below content', 'simple-podcasting' ),
					),
					'default'     => 'above',
				),
				array(
					'id'          => 'player_content_visibility',
					'label'       => __( 'Media player visibility', 'simple-podcasting' ),
					'description' => __( 'Select whether to display the media player to everybody or only logged in users.', 'simple-podcasting' ),
					'type'        => 'radio',
					'options'     => array(
						'all'         => __( 'Everybody', 'simple-podcasting' ),
						'membersonly' => __( 'Only logged in users', 'simple-podcasting' ),
					),
					'default'     => 'all',
				),
				array(
					'id'          => 'player_meta_data_enabled',
					'label'       => __( 'Enable Player meta data ', 'simple-podcasting' ),
					'description' => __( 'Turn this on to enable player meta data underneath the player. (download link, episode duration and date recorded).', 'simple-podcasting' ),
					'type'        => 'checkbox',
					'default'     => 'on',
				),
				array(
					'id'          => 'player_style',
					'label'       => __( 'Media player style', 'simple-podcasting' ),
					'description' => __( 'Select the style of media player you wish to display on your site.', 'simple-podcasting' ),
					'type'        => 'radio',
					'options'     => array(
						'standard' => __( 'Standard Compact Player', 'simple-podcasting' ),
						'larger'   => __( 'HTML5 Player With Album Art', 'simple-podcasting' ),
					),
					'default'     => 'standard',
				),
			),
		);

		$ss_podcasting_player_style = get_option( 'ss_podcasting_player_style', 'standard' );
		if ( 'standard' !== $ss_podcasting_player_style ) {
			$html_5_player_settings = array(
				array(
					'id'          => 'player_mode',
					'label'       => __( 'Player mode', 'simple-podcasting' ),
					'description' => __( 'Choose between Dark or Light mode, depending on your theme', 'simple-podcasting' ),
					'type'        => 'radio',
					'options'     => array(
						'dark'  => __( 'Dark Mode', 'simple-podcasting' ),
						'light' => __( 'Light Mode', 'simple-podcasting' ),
					),
					'default'     => 'dark',
				),
			);

			$settings['player-settings']['fields'] = array_merge( $settings['player-settings']['fields'], $html_5_player_settings );
		}

		$settings['feed-details'] = array(
			'title'       => __( 'Feed details', 'simple-podcasting' ),
			// translators: placeholders are simply html tags to break up the content
			'description' => sprintf( __( 'This data will be used in the feed for your podcast so your listeners will know more about it before they subscribe.%1$sAll of these fields are optional, but it is recommended that you fill in as many of them as possible. Blank fields will use the assigned defaults in the feed.%2$s', 'simple-podcasting' ), '<br/><em>', '</em>' ),
		);

		$feed_details_fields = array(
			array(
				'id'          => 'data_title',
				'label'       => __( 'Title', 'simple-podcasting' ),
				'description' => __( 'Your podcast title.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => get_bloginfo( 'name' ),
				'placeholder' => get_bloginfo( 'name' ),
				'class'       => 'large-text',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_subtitle',
				'label'       => __( 'Subtitle', 'simple-podcasting' ),
				'description' => __( 'Your podcast subtitle.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => get_bloginfo( 'description' ),
				'placeholder' => get_bloginfo( 'description' ),
				'class'       => 'large-text',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_author',
				'label'       => __( 'Author', 'simple-podcasting' ),
				'description' => __( 'Your podcast author.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => get_bloginfo( 'name' ),
				'placeholder' => get_bloginfo( 'name' ),
				'class'       => 'large-text',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_category',
				'label'       => __( 'Primary Category', 'simple-podcasting' ),
				'description' => __( 'Your podcast\'s primary category.', 'simple-podcasting' ),
				'type'        => 'select',
				'options'     => $category_options,
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_subcategory',
				'label'       => __( 'Primary Sub-Category', 'simple-podcasting' ),
				'description' => __( 'Your podcast\'s primary sub-category (if available) - must be a sub-category of the primary category selected above.', 'simple-podcasting' ),
				'type'        => 'select',
				'options'     => $subcategory_options,
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_category2',
				'label'       => __( 'Secondary Category', 'simple-podcasting' ),
				'description' => __( 'Your podcast\'s secondary category.', 'simple-podcasting' ),
				'type'        => 'select',
				'options'     => $category_options,
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_subcategory2',
				'label'       => __( 'Secondary Sub-Category', 'simple-podcasting' ),
				'description' => __( 'Your podcast\'s secondary sub-category (if available) - must be a sub-category of the secondary category selected above.', 'simple-podcasting' ),
				'type'        => 'select',
				'options'     => $subcategory_options,
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_category3',
				'label'       => __( 'Tertiary Category', 'simple-podcasting' ),
				'description' => __( 'Your podcast\'s tertiary category.', 'simple-podcasting' ),
				'type'        => 'select',
				'options'     => $category_options,
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_subcategory3',
				'label'       => __( 'Tertiary Sub-Category', 'simple-podcasting' ),
				'description' => __( 'Your podcast\'s tertiary sub-category (if available) - must be a sub-category of the tertiary category selected above.', 'simple-podcasting' ),
				'type'        => 'select',
				'options'     => $subcategory_options,
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_description',
				'label'       => __( 'Description/Summary', 'simple-podcasting' ),
				'description' => __( 'A description/summary of your podcast - no HTML allowed.', 'simple-podcasting' ),
				'type'        => 'textarea',
				'default'     => get_bloginfo( 'description' ),
				'placeholder' => get_bloginfo( 'description' ),
				'callback'    => 'wp_strip_all_tags',
				'class'       => 'large-text',
			),
			array(
				'id'          => 'data_image',
				'label'       => __( 'Cover Image', 'simple-podcasting' ),
				'description' => __( 'Your podcast cover image - must have a minimum size of 1400x1400 px.', 'simple-podcasting' ),
				'type'        => 'image',
				'default'     => '',
				'placeholder' => '',
				'callback'    => 'esc_url_raw',
			),
			array(
				'id'          => 'data_owner_name',
				'label'       => __( 'Owner name', 'simple-podcasting' ),
				'description' => __( 'Podcast owner\'s name.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => get_bloginfo( 'name' ),
				'placeholder' => get_bloginfo( 'name' ),
				'class'       => 'large-text',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_owner_email',
				'label'       => __( 'Owner email address', 'simple-podcasting' ),
				'description' => __( 'Podcast owner\'s email address.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => get_bloginfo( 'admin_email' ),
				'placeholder' => get_bloginfo( 'admin_email' ),
				'class'       => 'large-text',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_language',
				'label'       => __( 'Language', 'simple-podcasting' ),
				// translators: placeholders are for a link to the ISO standards
				'description' => sprintf( __( 'Your podcast\'s language in %1$sISO-639-1 format%2$s.', 'simple-podcasting' ), '<a href="' . esc_url( 'http://www.loc.gov/standards/iso639-2/php/code_list.php' ) . '" target="' . wp_strip_all_tags( '_blank' ) . '">', '</a>' ),
				'type'        => 'text',
				'default'     => get_bloginfo( 'language' ),
				'placeholder' => get_bloginfo( 'language' ),
				'class'       => 'all-options',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'data_copyright',
				'label'       => __( 'Copyright', 'simple-podcasting' ),
				'description' => __( 'Copyright line for your podcast.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => '&#xA9; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ),
				'placeholder' => '&#xA9; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ),
				'class'       => 'large-text',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'explicit',
				'label'       => __( 'Explicit', 'simple-podcasting' ),
				// translators: placeholders are for an Apple help document link
				'description' => sprintf( __( 'To mark this podcast as an explicit podcast, check this box. Explicit content rules can be found %s.', 'simple-podcasting' ), '<a href="https://discussions.apple.com/thread/1079151">here</a>' ),
				'type'        => 'checkbox',
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'complete',
				'label'       => __( 'Complete', 'simple-podcasting' ),
				'description' => __( 'Mark if this podcast is complete or not. Only do this if no more episodes are going to be added to this feed.', 'simple-podcasting' ),
				'type'        => 'checkbox',
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'publish_date',
				'label'       => __( 'Source for publish date', 'simple-podcasting' ),
				'description' => __( 'Use the "Published date" of the post or use "Date recorded" from the Podcast episode details.', 'simple-podcasting' ),
				'type'        => 'radio',
				'options'     => array(
					'published' => __( 'Published date', 'simple-podcasting' ),
					'recorded'  => __( 'Recorded date', 'simple-podcasting' ),
				),
				'default'     => 'published',
			),
			array(
				'id'          => 'consume_order',
				'label'       => __( 'Show Type', 'simple-podcasting' ),
				// translators: placeholders are for help document link
				'description' => sprintf( __( 'The order your podcast episodes will be listed. %1$sMore details here.%2$s', 'simple-podcasting' ), '<a href="' . esc_url( 'https://www.simplepodcasting.com/ios-11-podcast-tags/' ) . '" target="' . wp_strip_all_tags( '_blank' ) . '">', '</a>' ),
				'type'        => 'select',
				'options'     => array(
					''         => __( 'Please Select', 'simple-podcasting' ),
					'episodic' => __( 'Episodic', 'simple-podcasting' ),
					'serial'   => __( 'Serial', 'simple-podcasting' ),
				),
				'default'     => '',
			),
			array(
				'id'          => 'media_prefix',
				'label'       => __( 'Media File Prefix', 'simple-podcasting' ),
				// translators: placeholders are for help document link
				'description' => sprintf( __( 'Enter your Podtrac, Chartable, or other media file prefix here. %1$sMore details here.%2$s', 'simple-podcasting' ), '<a href="' . esc_url( 'https://support.castos.com/article/95-adding-a-media-file-prefix-for-podtrac-chartable-and-other-tracking-services' ) . '" target="' . wp_strip_all_tags( '_blank' ) . '">', '</a>' ),
				'type'        => 'text',
				'default'     => '',
				'placeholder' => __( 'https://dts.podtrac.com/redirect/mp3/', 'simple-podcasting' ),
				'callback'    => 'esc_url_raw',
				'class'       => 'regular-text',
			),
			array(
				'id'          => 'episode_description',
				'label'       => __( 'Episode description', 'simple-podcasting' ),
				'description' => __( 'Use the excerpt or the post content in the description tag for episodes', 'simple-podcasting' ),
				'type'        => 'radio',
				'options'     => array(
					'excerpt' => __( 'Post Excerpt', 'simple-podcasting' ),
					'content' => __( 'Post Content', 'simple-podcasting' ),
				),
				'default'     => 'excerpt',
			),
			array(
				'id'          => 'exclude_feed',
				'label'       => __( 'Exclude series from default feed', 'simple-podcasting' ),
				// translators: placeholders are html anchor tags to support document
				'description' => sprintf( __( 'When enabled, this will exclude any episodes in this series feed from the default feed. %1$sMore details here.%2$s', 'simple-podcasting' ), '<a href="' . esc_url( 'https://support.castos.com/article/114-excluding-series-episodes-from-the-default-feed' ) . '" target="' . wp_strip_all_tags( '_blank' ) . '">', '</a>' ),
				'type'        => 'checkbox',
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'turbocharge_feed',
				'label'       => __( 'Turbocharge podcast feed', 'simple-podcasting' ),
				// translators: placeholders are html anchor tags to support document
				'description' => sprintf( __( 'When enabled, this setting will speed up your feed loading time. %1$sMore details here.%2$s', 'simple-podcasting' ), '<a href="' . esc_url( 'https://support.castos.com/article/89-turbocharging-your-feed-to-maximize-available-episodes' ) . '" target="' . wp_strip_all_tags( '_blank' ) . '">', '</a>' ),
				'type'        => 'checkbox',
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'redirect_feed',
				'label'       => __( 'Redirect this feed to new URL', 'simple-podcasting' ),
				'description' => sprintf( __( 'Redirect your feed to a new URL (specified below).', 'simple-podcasting' ), '<br/>' ),
				'type'        => 'checkbox',
				'default'     => '',
				'callback'    => 'wp_strip_all_tags',
			),
			array(
				'id'          => 'new_feed_url',
				'label'       => __( 'New podcast feed URL', 'simple-podcasting' ),
				'description' => __( 'Your podcast feed\'s new URL.', 'simple-podcasting' ),
				'type'        => 'text',
				'default'     => '',
				'placeholder' => __( 'New feed URL', 'simple-podcasting' ),
				'callback'    => 'esc_url_raw',
				'class'       => 'regular-text',
			),
			array(
				'id'          => '',
				'label'       => __( 'Subscribe button links', 'simple-podcasting' ),
				'description' => __( 'To create Subscribe Buttons for your site visitors, enter the Distribution URL to your show in the directories below.', 'simple-podcasting' ),
				'type'        => '',
				'placeholder' => __( 'Subscribe button links', 'simple-podcasting' ),
			),
		);

		$subscribe_options_array            = $this->get_subscribe_field_options();
		$settings['feed-details']['fields'] = array_merge( $feed_details_fields, $subscribe_options_array );

		$settings['security'] = array(
			'title'       => __( 'Security', 'simple-podcasting' ),
			'description' => __( 'Change these settings to ensure that your podcast feed remains private. This will block feed readers (including iTunes) from accessing your feed.', 'simple-podcasting' ),
			'fields'      => array(
				array(
					'id'          => 'protect',
					'label'       => __( 'Password protect your podcast feed', 'simple-podcasting' ),
					'description' => __( 'Mark if you would like to password protect your podcast feed - you can set the username and password below. This will block all feed readers (including iTunes) from accessing your feed.', 'simple-podcasting' ),
					'type'        => 'checkbox',
					'default'     => '',
					'callback'    => 'wp_strip_all_tags',
				),
				array(
					'id'          => 'protection_username',
					'label'       => __( 'Username', 'simple-podcasting' ),
					'description' => __( 'Username for your podcast feed.', 'simple-podcasting' ),
					'type'        => 'text',
					'default'     => '',
					'placeholder' => __( 'Feed username', 'simple-podcasting' ),
					'class'       => 'regular-text',
					'callback'    => 'wp_strip_all_tags',
				),
				array(
					'id'          => 'protection_password',
					'label'       => __( 'Password', 'simple-podcasting' ),
					'description' => __( 'Password for your podcast feed. Once saved, the password is encoded and secured so it will not be visible on this page again.', 'simple-podcasting' ),
					'type'        => 'text_secret',
					'default'     => '',
					'placeholder' => __( 'Feed password', 'simple-podcasting' ),
					'callback'    => array( $this, 'encode_password' ),
					'class'       => 'regular-text',
				),
				array(
					'id'          => 'protection_no_access_message',
					'label'       => __( 'No access message', 'simple-podcasting' ),
					'description' => __( 'This message will be displayed to people who are not allowed access to your podcast feed. Limited HTML allowed.', 'simple-podcasting' ),
					'type'        => 'textarea',
					'default'     => __( 'You are not permitted to view this podcast feed.', 'simple-podcasting' ),
					'placeholder' => __( 'Message displayed to users who do not have access to the podcast feed', 'simple-podcasting' ),
					'callback'    => array( $this, 'validate_message' ),
					'class'       => 'large-text',
				),
			),
		);

		$settings['redirection'] = array(
			'title'       => __( 'Redirection', 'simple-podcasting' ),
			'description' => __( 'Use these settings to safely move your podcast to a different location. Only do this once your new podcast is setup and active.', 'simple-podcasting' ),
			'fields'      => array(
				array(
					'id'          => 'redirect_feed',
					'label'       => __( 'Redirect podcast feed to new URL', 'simple-podcasting' ),
					'description' => sprintf( __( 'Redirect your feed to a new URL (specified below).%1$sThis will inform all podcasting services that your podcast has moved and 48 hours after you have saved this option it will permanently redirect your feed to the new URL.', 'simple-podcasting' ), '<br/>' ),
					'type'        => 'checkbox',
					'default'     => '',
					'callback'    => 'wp_strip_all_tags',
				),
				array(
					'id'          => 'new_feed_url',
					'label'       => __( 'New podcast feed URL', 'simple-podcasting' ),
					'description' => __( 'Your podcast feed\'s new URL.', 'simple-podcasting' ),
					'type'        => 'text',
					'default'     => '',
					'placeholder' => __( 'New feed URL', 'simple-podcasting' ),
					'callback'    => 'esc_url_raw',
					'class'       => 'regular-text',
				),
			),
		);

		$settings['publishing'] = array(
			'title'       => __( 'Publishing', 'simple-podcasting' ),
			'description' => __( 'Use these URLs to share and publish your podcast feed. These URLs will work with any podcasting service (including iTunes).', 'simple-podcasting' ),
			'fields'      => array(
				array(
					'id'          => 'feed_url',
					'label'       => __( 'External feed URL', 'simple-podcasting' ),
					'description' => __( 'If you are syndicating your podcast using a third-party service (like Feedburner) you can insert the URL here, otherwise this must be left blank.', 'simple-podcasting' ),
					'type'        => 'text',
					'default'     => '',
					'placeholder' => __( 'External feed URL', 'simple-podcasting' ),
					'callback'    => 'esc_url_raw',
					'class'       => 'regular-text',
				),
				array(
					'id'          => 'feed_link',
					'label'       => __( 'Complete feed', 'simple-podcasting' ),
					'description' => '',
					'type'        => 'feed_link',
					'callback'    => 'esc_url_raw',
				),
				array(
					'id'          => 'feed_link_series',
					'label'       => __( 'Feed for a specific series', 'simple-podcasting' ),
					'description' => '',
					'type'        => 'feed_link_series',
					'callback'    => 'esc_url_raw',
				),
				array(
					'id'          => 'podcast_url',
					'label'       => __( 'Podcast page', 'simple-podcasting' ),
					'description' => '',
					'type'        => 'podcast_url',
					'callback'    => 'esc_url_raw',
				),
			),
		);

		$settings['castos-hosting'] = array(
			'title'       => __( 'Hosting', 'simple-podcasting' ),
			'description' => sprintf( __( 'Connect your WordPress site to your %s account.', 'simple-podcasting' ), '<a target="_blank" href="' . SSP_CASTOS_APP_URL . '">Castos</a>' ),
			'fields'      => array(
				array(
					'id'          => 'podmotor_account_email',
					'label'       => __( 'Your email', 'simple-podcasting' ),
					'description' => __( 'The email address you used to register your Castos account.', 'simple-podcasting' ),
					'type'        => 'text',
					'default'     => '',
					'placeholder' => __( 'email@domain.com', 'simple-podcasting' ),
					'callback'    => 'esc_email',
					'class'       => 'regular-text',
				),
				array(
					'id'          => 'podmotor_account_api_token',
					'label'       => __( 'Castos API token', 'simple-podcasting' ),
					'description' => __( 'Your Castos API token. Available from your Castos account dashboard.', 'simple-podcasting' ),
					'type'        => 'text',
					'default'     => '',
					'placeholder' => __( 'Enter your api token', 'simple-podcasting' ),
					'callback'    => 'sanitize_text_field',
					'class'       => 'regular-text',
				),
				array(
					'id'          => 'podmotor_disconnect',
					'label'       => __( 'Disconnect Castos', 'simple-podcasting' ),
					'description' => __( 'Disconnect your Castos account.', 'simple-podcasting' ),
					'type'        => 'checkbox',
					'default'     => '',
					'callback'    => 'wp_strip_all_tags',
					'class'       => 'disconnect-castos',
				),
			),
		);

		$fields = array();
		if ( ssp_is_connected_to_castos() ) {
			if ( ! ssp_get_external_rss_being_imported() ) {
				$fields = array(
					array(
						'id'          => 'podmotor_import',
						'label'       => __( 'Import your podcast', 'simple-podcasting' ),
						'description' => __( 'Import your podcast to your Castos hosting account.', 'simple-podcasting' ),
						'type'        => 'checkbox',
						'default'     => '',
						'callback'    => 'wp_strip_all_tags',
						'class'       => 'import-castos',
					),
				);
			}
		}
		$settings['import'] = array(
			'title'       => __( 'Import', 'simple-podcasting' ),
			'description' => sprintf( __( 'Use this option for a one time import of your existing WordPress podcast to your Castos account. If you encounter any problems with this import, please contact support at hello@castos.com.', 'simple-podcasting' ), '<a href="' . SSP_CASTOS_APP_URL . '">Castos</a>' ),
			'fields'      => $fields,
		);

		$settings['extensions'] = array(
			'title'               => __( 'Extensions', 'simple-podcasting' ),
			'description'         => __( 'These extensions add functionality to your Simple Simple Podcasting powered podcast.', 'simple-podcasting' ),
			'fields'              => array(),
			'disable_save_button' => true,
		);

		$settings = apply_filters( 'ssp_settings_fields', $settings );

		return $settings;
	}

	/**
	 * Encode feed password
	 *
	 * @param  string $password User input
	 *
	 * @return string           Encoded password
	 */
	public function encode_password( $password ) {

		if ( $password && strlen( $password ) > 0 && '' !== $password ) {
			$password = md5( $password );
		} else {
			$option   = get_option( 'ss_podcasting_protection_password' );
			$password = $option;
		}

		return $password;
	}

	/**
	 * Validate protectino message
	 *
	 * @param  string $message User input
	 *
	 * @return string          Validated message
	 */
	public function validate_message( $message ) {

		if ( $message ) {

			$allowed = array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'target' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'p'      => array(),
			);

			$message = wp_kses( $message, $allowed );
		}

		return $message;
	}

	/**
	 * Builds the array of field settings for the subscribe links, based on the options stored in the options table.
	 *
	 * @return array
	 */
	public function get_subscribe_field_options() {
		$subscribe_field_options = array();

		$options_handler             = new Options_Handler();
		$available_subscribe_options = $options_handler->available_subscribe_options;

		$subscribe_options = get_option( 'ss_podcasting_subscribe_options', array() );
		if ( empty( $subscribe_options ) ) {
			return $subscribe_field_options;
		}

		if ( isset( $_GET['feed-series'] ) && 'default' !== $_GET['feed-series'] ) {
			$feed_series_slug = sanitize_text_field( $_GET['feed-series'] );
			$series           = get_term_by( 'slug', $feed_series_slug, 'series' );
			$series_id        = $series->ID;
		}

		foreach ( $subscribe_options as $option_key ) {
			if ( isset( $available_subscribe_options[ $option_key ] ) ) {
				if ( isset( $series_id ) ) {
					$field_id = $option_key . '_url_' . $series_id;
					$value    = get_option( 'ss_podcasting_' . $field_id );
				} else {
					$field_id = $option_key . '_url';
					$value    = get_option( 'ss_podcasting_' . $field_id );
				}
			} else {
				continue;
			}
			$subscribe_field_options[] = array(
				'id'          => $field_id,
				// translators: %s: Service title eg iTunes
				'label'       => sprintf( __( '%s URL', 'simple-podcasting' ), $available_subscribe_options[ $option_key ] ),
				// translators: %s: Service title eg iTunes
				'description' => sprintf( __( 'Your podcast\'s %s URL.', 'simple-podcasting' ), $available_subscribe_options[ $option_key ] ),
				'type'        => 'text',
				'default'     => $value,
				// translators: %s: Service title eg iTunes
				'placeholder' => sprintf( __( '%s URL', 'simple-podcasting' ), $available_subscribe_options[ $option_key ] ),
				'callback'    => 'esc_url_raw',
				'class'       => 'regular-text',
			);
		}

		return $subscribe_field_options;
	}

	/**
	 * Checks if a user role exists, used in the SettingsController add_caps method
	 *
	 * @param $role
	 *
	 * @return bool
	 */
	public function role_exists( $role ) {
		if ( ! empty( $role ) ) {
			return $GLOBALS['wp_roles']->is_role( $role );
		}

		return false;
	}

}
