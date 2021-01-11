<?php

namespace PdSPodcast\Handlers;

/**
 * SSP Settings Handler
 *
 * @package PdS Podcast
 */
class Settings_Handler
{

	/**
	 * Build settings fields
	 *
	 * @return array Fields to be displayed on settings page.
	 */
	public function settings_fields()
	{
		global $wp_post_types;

		$post_type_options = array();

		// Set options for post type selection.
		foreach ($wp_post_types as $post_type => $data) {

			$disallowed_post_types = array(
				'page',
				'attachment',
				'revision',
				'nav_menu_item',
				'wooframework',
				'podcast',
			);
			if (in_array($post_type, $disallowed_post_types, true)) {
				continue;
			}

			$post_type_options[$post_type] = $data->labels->name;
		}

		// Set up available category options.
		$category_options = array(
			'' => __('-- None --', 'pds-podcast'),
			'Arts' => __('Arts', 'pds-podcast'),
			'Business' => __('Business', 'pds-podcast'),
			'Comedy' => __('Comedy', 'pds-podcast'),
			'Education' => __('Education', 'pds-podcast'),
			'Fiction' => __('Fiction', 'pds-podcast'),
			'Government' => __('Government', 'pds-podcast'),
			'History' => __('History', 'pds-podcast'),
			'Health & Fitness' => __('Health & Fitness', 'pds-podcast'),
			'Kids & Family' => __('Kids & Family', 'pds-podcast'),
			'Leisure' => __('Leisure', 'pds-podcast'),
			'Music' => __('Music', 'pds-podcast'),
			'News' => __('News', 'pds-podcast'),
			'Religion & Spirituality' => __('Religion & Spirituality', 'pds-podcast'),
			'Science' => __('Science', 'pds-podcast'),
			'Society & Culture' => __('Society & Culture', 'pds-podcast'),
			'Sports' => __('Sports', 'pds-podcast'),
			'Technology' => __('Technology', 'pds-podcast'),
			'True Crime' => __('True Crime', 'pds-podcast'),
			'TV & Film' => __('TV & Film', 'pds-podcast'),
		);

		// Set up available sub-category options.
		$subcategory_options = array(
			'' => __('-- None --', 'pds-podcast'),
			'Books' => array(
				'label' => __('Books', 'pds-podcast'),
				'group' => __('Arts', 'pds-podcast'),
			),
			'Design' => array(
				'label' => __('Design', 'pds-podcast'),
				'group' => __('Arts', 'pds-podcast'),
			),
			'Fashion & Beauty' => array(
				'label' => __('Fashion & Beauty', 'pds-podcast'),
				'group' => __('Arts', 'pds-podcast'),
			),
			'Food' => array(
				'label' => __('Food', 'pds-podcast'),
				'group' => __('Arts', 'pds-podcast'),
			),
			'Performing Arts' => array(
				'label' => __('Performing Arts', 'pds-podcast'),
				'group' => __('Arts', 'pds-podcast'),
			),
			'Visual Arts' => array(
				'label' => __('Visual Arts', 'pds-podcast'),
				'group' => __('Arts', 'pds-podcast'),
			),
			'Careers' => array(
				'label' => __('Careers', 'pds-podcast'),
				'group' => __('Business', 'pds-podcast'),
			),
			'Entrepreneurship' => array(
				'label' => __('Entrepreneurship', 'pds-podcast'),
				'group' => __('Business', 'pds-podcast'),
			),
			'Investing' => array(
				'label' => __('Investing', 'pds-podcast'),
				'group' => __('Business', 'pds-podcast'),
			),
			'Management' => array(
				'label' => __('Management', 'pds-podcast'),
				'group' => __('Business', 'pds-podcast'),
			),
			'Marketing' => array(
				'label' => __('Marketing', 'pds-podcast'),
				'group' => __('Business', 'pds-podcast'),
			),
			'Non-profit' => array(
				'label' => __('Non-profit', 'pds-podcast'),
				'group' => __('Business', 'pds-podcast'),
			),
			'Comedy Interviews' => array(
				'label' => __('Comedy Interviews', 'pds-podcast'),
				'group' => __('Comedy', 'pds-podcast'),
			),
			'Improv' => array(
				'label' => __('Improv', 'pds-podcast'),
				'group' => __('Comedy', 'pds-podcast'),
			),
			'Standup' => array(
				'label' => __('Standup', 'pds-podcast'),
				'group' => __('Comedy', 'pds-podcast'),
			),
			'Courses' => array(
				'label' => __('Courses', 'pds-podcast'),
				'group' => __('Education', 'pds-podcast'),
			),
			'How to' => array(
				'label' => __('How to', 'pds-podcast'),
				'group' => __('Education', 'pds-podcast'),
			),
			'Language Learning' => array(
				'label' => __('Language Learning', 'pds-podcast'),
				'group' => __('Education', 'pds-podcast'),
			),
			'Self Improvement' => array(
				'label' => __('Self Improvement', 'pds-podcast'),
				'group' => __('Education', 'pds-podcast'),
			),
			'Comedy Fiction' => array(
				'label' => __('Comedy Fiction', 'pds-podcast'),
				'group' => __('Fiction', 'pds-podcast'),
			),
			'Drama' => array(
				'label' => __('Drama', 'pds-podcast'),
				'group' => __('Fiction', 'pds-podcast'),
			),
			'Science Fiction' => array(
				'label' => __('Science Fiction', 'pds-podcast'),
				'group' => __('Fiction', 'pds-podcast'),
			),
			'Alternative Health' => array(
				'label' => __('Alternative Health', 'pds-podcast'),
				'group' => __('Health & Fitness', 'pds-podcast'),
			),
			'Fitness' => array(
				'label' => __('Fitness', 'pds-podcast'),
				'group' => __('Health & Fitness', 'pds-podcast'),
			),
			'Medicine' => array(
				'label' => __('Medicine', 'pds-podcast'),
				'group' => __('Health & Fitness', 'pds-podcast'),
			),
			'Mental Health' => array(
				'label' => __('Mental Health', 'pds-podcast'),
				'group' => __('Health & Fitness', 'pds-podcast'),
			),
			'Nutrition' => array(
				'label' => __('Nutrition', 'pds-podcast'),
				'group' => __('Health & Fitness', 'pds-podcast'),
			),
			'Sexuality' => array(
				'label' => __('Sexuality', 'pds-podcast'),
				'group' => __('Health & Fitness', 'pds-podcast'),
			),
			'Education for Kids' => array(
				'label' => __('Education for Kids', 'pds-podcast'),
				'group' => __('Kids & Family', 'pds-podcast'),
			),
			'Parenting' => array(
				'label' => __('Parenting', 'pds-podcast'),
				'group' => __('Kids & Family', 'pds-podcast'),
			),
			'Pets & Animals' => array(
				'label' => __('Pets & Animals', 'pds-podcast'),
				'group' => __('Kids & Family', 'pds-podcast'),
			),
			'Stories for Kids' => array(
				'label' => __('Stories for Kids', 'pds-podcast'),
				'group' => __('Kids & Family', 'pds-podcast'),
			),
			'Animation & Manga' => array(
				'label' => __('Animation & Manga', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Automotive' => array(
				'label' => __('Automotive', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Aviation' => array(
				'label' => __('Aviation', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Crafts' => array(
				'label' => __('Crafts', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Games' => array(
				'label' => __('Games', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Hobbies' => array(
				'label' => __('Hobbies', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Home & Garden' => array(
				'label' => __('Home & Garden', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Video Games' => array(
				'label' => __('Video Games', 'pds-podcast'),
				'group' => __('Leisure', 'pds-podcast'),
			),
			'Music Commentary' => array(
				'label' => __('Music Commentary', 'pds-podcast'),
				'group' => __('Music', 'pds-podcast'),
			),
			'Music History' => array(
				'label' => __('Music History', 'pds-podcast'),
				'group' => __('Music', 'pds-podcast'),
			),
			'Music Interviews' => array(
				'label' => __('Music Interviews', 'pds-podcast'),
				'group' => __('Music', 'pds-podcast'),
			),
			'Business News' => array(
				'label' => __('Business News', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'Daily News' => array(
				'label' => __('Daily News', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'Entertainment News' => array(
				'label' => __('Entertainment News', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'News Commentary' => array(
				'label' => __('News Commentary', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'Politics' => array(
				'label' => __('Politics', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'Sports News' => array(
				'label' => __('Sports News ', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'Tech News' => array(
				'label' => __('Tech News', 'pds-podcast'),
				'group' => __('News', 'pds-podcast'),
			),
			'Buddhism' => array(
				'label' => __('Buddhism', 'pds-podcast'),
				'group' => __('Religion & Spirituality', 'pds-podcast'),
			),
			'Christianity' => array(
				'label' => __('Christianity', 'pds-podcast'),
				'group' => __('Religion & Spirituality', 'pds-podcast'),
			),
			'Hinduism' => array(
				'label' => __('Hinduism', 'pds-podcast'),
				'group' => __('Religion & Spirituality', 'pds-podcast'),
			),
			'Islam' => array(
				'label' => __('Islam', 'pds-podcast'),
				'group' => __('Religion & Spirituality', 'pds-podcast'),
			),
			'Judaism' => array(
				'label' => __('Judaism', 'pds-podcast'),
				'group' => __('Religion & Spirituality', 'pds-podcast'),
			),
			'Spirituality' => array(
				'label' => __('Spirituality', 'pds-podcast'),
				'group' => __('Religion & Spirituality', 'pds-podcast'),
			),
			'Astronomy' => array(
				'label' => __('Astronomy', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Chemistry' => array(
				'label' => __('Chemistry', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Earth Sciences' => array(
				'label' => __('Earth Sciences', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Life Sciences' => array(
				'label' => __('Life Sciences', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Mathematics' => array(
				'label' => __('Mathematics', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Natural Sciences' => array(
				'label' => __('Natural Sciences', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Nature' => array(
				'label' => __('Nature', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Physics' => array(
				'label' => __('Physics', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Social Sciences' => array(
				'label' => __('Social Sciences', 'pds-podcast'),
				'group' => __('Science', 'pds-podcast'),
			),
			'Documentary' => array(
				'label' => __('Documentary', 'pds-podcast'),
				'group' => __('Society & Culture', 'pds-podcast'),
			),
			'Personal Journals' => array(
				'label' => __('Personal Journals', 'pds-podcast'),
				'group' => __('Society & Culture', 'pds-podcast'),
			),
			'Philosophy' => array(
				'label' => __('Philosophy', 'pds-podcast'),
				'group' => __('Society & Culture', 'pds-podcast'),
			),
			'Places & Travel' => array(
				'label' => __('Places & Travel', 'pds-podcast'),
				'group' => __('Society & Culture', 'pds-podcast'),
			),
			'Relationships' => array(
				'label' => __('Relationships', 'pds-podcast'),
				'group' => __('Society & Culture', 'pds-podcast'),
			),
			'Baseball' => array(
				'label' => __('Baseball', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Basketball' => array(
				'label' => __('Basketball', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Cricket' => array(
				'label' => __('Cricket', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Fantasy Sports' => array(
				'label' => __('Fantasy Sports ', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Football' => array(
				'label' => __('Football', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Golf' => array(
				'label' => __('Golf', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Hockey' => array(
				'label' => __('Hockey', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Rugby' => array(
				'label' => __('Rugby', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Running' => array(
				'label' => __('Running', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Soccer' => array(
				'label' => __('Soccer', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Swimming' => array(
				'label' => __('Swimming', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Tennis' => array(
				'label' => __('Tennis', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Volleyball' => array(
				'label' => __('Volleyball', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Wilderness' => array(
				'label' => __('Wilderness', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'Wrestling' => array(
				'label' => __('Wrestling', 'pds-podcast'),
				'group' => __('Sports', 'pds-podcast'),
			),
			'After Shows' => array(
				'label' => __('After Shows', 'pds-podcast'),
				'group' => __('TV & Film', 'pds-podcast'),
			),
			'Film History' => array(
				'label' => __('Film History', 'pds-podcast'),
				'group' => __('TV & Film', 'pds-podcast'),
			),
			'Film Interviews' => array(
				'label' => __('Film Interviews', 'pds-podcast'),
				'group' => __('TV & Film', 'pds-podcast'),
			),
			'Film Reviews' => array(
				'label' => __('Film Reviews', 'pds-podcast'),
				'group' => __('TV & Film', 'pds-podcast'),
			),
			'TV Reviews' => array(
				'label' => __('TV Reviews', 'pds-podcast'),
				'group' => __('TV & Film', 'pds-podcast'),
			),
		);

		$settings = array();

		$settings['general'] = array(
			'title' => __('General', 'pds-podcast'),
			'description' => __('General Settings', 'pds-podcast'),
			'fields' => array(
				array(
					'id' => 'use_post_types',
					'label' => __('Podcast post types', 'pds-podcast'),
					'description' => __('Use this setting to enable podcast functions on any post type - this will add all podcast posts from the specified types to your podcast feed.', 'pds-podcast'),
					'type' => 'checkbox_multi',
					'options' => $post_type_options,
					'default' => array(),
				),
				array(
					'id' => 'include_in_main_query',
					'label' => __('Include podcast in main blog', 'pds-podcast'),
					'description' => __('This setting may behave differently in each theme, so test it carefully after activation - it will add the \'podcast\' post type to your site\'s main query so that your podcast episodes appear on your home page along with your blog posts.', 'pds-podcast'),
					'type' => 'checkbox',
					'default' => '',
				),
				array(
					'id' => 'buzzsprout_enabled',
					'label' => __('Enable Buzzsprout fields ', 'pds-podcast'),
					'description' => __('Turn this on to enable the Buzzsprout specific fields on each episode.', 'pds-podcast'),
					'type' => 'checkbox',
					'default' => '',
				),
				array(
					'id' => 'buzzsprout_channel_id',
					'label' => __('Buzzsprout podcast ID ', 'pds-podcast'),
					'description' => __('Set this to get the Buzzsprout player to load automatically.', 'pds-podcast'),
					'type' => 'text',
					'default' => '',
				),
				array(
					'id' => 'itunes_fields_enabled',
					'label' => __('Enable iTunes fields ', 'pds-podcast'),
					'description' => __('Turn this on to enable the iTunes iOS11 specific fields on each episode.', 'pds-podcast'),
					'type' => 'checkbox',
					'default' => '',
				),
			),
		);

		$settings['player-settings'] = array(
			'title' => __('Player', 'pds-podcast'),
			'description' => __('Player Settings', 'pds-podcast'),
			'fields' => array(
				array(
					'id' => 'player_locations',
					'label' => __('Media player locations', 'pds-podcast'),
					'description' => __('Select where to show the podcast media player along with the episode data (download link, duration and file size)', 'pds-podcast'),
					'type' => 'checkbox_multi',
					'options' => array(
						'content' => __('Full content', 'pds-podcast'),
						'excerpt' => __('Excerpt', 'pds-podcast'),
						'excerpt_embed' => __('oEmbed Excerpt', 'pds-podcast'),
					),
					'default' => 'content',
				),
				array(
					'id' => 'player_content_location',
					'label' => __('Media player position', 'pds-podcast'),
					'description' => __('Select whether to display the media player above or below the full post content.', 'pds-podcast'),
					'type' => 'radio',
					'options' => array(
						'above' => __('Above content', 'pds-podcast'),
						'below' => __('Below content', 'pds-podcast'),
					),
					'default' => 'above',
				),
				array(
					'id' => 'player_content_visibility',
					'label' => __('Media player visibility', 'pds-podcast'),
					'description' => __('Select whether to display the media player to everybody or only logged in users.', 'pds-podcast'),
					'type' => 'radio',
					'options' => array(
						'all' => __('Everybody', 'pds-podcast'),
						'membersonly' => __('Only logged in users', 'pds-podcast'),
					),
					'default' => 'all',
				),
				array(
					'id' => 'player_meta_data_enabled',
					'label' => __('Enable Player meta data ', 'pds-podcast'),
					'description' => __('Turn this on to enable player meta data underneath the player. (download link, episode duration and date recorded).', 'pds-podcast'),
					'type' => 'checkbox',
					'default' => 'on',
				),
				array(
					'id' => 'player_style',
					'label' => __('Media player style', 'pds-podcast'),
					'description' => __('Select the style of media player you wish to display on your site.', 'pds-podcast'),
					'type' => 'radio',
					'options' => array(
						'standard' => __('Standard Compact Player', 'pds-podcast'),
						'larger' => __('HTML5 Player With Album Art', 'pds-podcast'),
					),
					'default' => 'standard',
				),
			),
		);

		$ss_podcasting_player_style = get_option('ss_podcasting_player_style', 'standard');
		if ('standard' !== $ss_podcasting_player_style) {
			$html_5_player_settings = array(
				array(
					'id' => 'player_mode',
					'label' => __('Player mode', 'pds-podcast'),
					'description' => __('Choose between Dark or Light mode, depending on your theme', 'pds-podcast'),
					'type' => 'radio',
					'options' => array(
						'dark' => __('Dark Mode', 'pds-podcast'),
						'light' => __('Light Mode', 'pds-podcast'),
					),
					'default' => 'dark',
				),
			);

			$settings['player-settings']['fields'] = array_merge($settings['player-settings']['fields'], $html_5_player_settings);
		}

		/* Since we're not using the plugin to publish, we don't need these settings
		$settings['feed-details'] = array(
			'title'       => __( 'Feed details', 'pds-podcast' ),
			// translators: placeholders are simply html tags to break up the content
			'description' => sprintf( __( 'This data will be used in the feed for your podcast so your listeners will know more about it before they subscribe.%1$sAll of these fields are optional, but it is recommended that you fill in as many of them as possible. Blank fields will use the assigned defaults in the feed.%2$s', 'pds-podcast' ), '<br/><em>', '</em>' ),
		);

		$feed_details_fields = array(
			array(
				'id' => 'data_title',
				'label' => __('Title', 'pds-podcast'),
				'description' => __('Your podcast title.', 'pds-podcast'),
				'type' => 'text',
				'default' => get_bloginfo('name'),
				'placeholder' => get_bloginfo('name'),
				'class' => 'large-text',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_subtitle',
				'label' => __('Subtitle', 'pds-podcast'),
				'description' => __('Your podcast subtitle.', 'pds-podcast'),
				'type' => 'text',
				'default' => get_bloginfo('description'),
				'placeholder' => get_bloginfo('description'),
				'class' => 'large-text',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_author',
				'label' => __('Author', 'pds-podcast'),
				'description' => __('Your podcast author.', 'pds-podcast'),
				'type' => 'text',
				'default' => get_bloginfo('name'),
				'placeholder' => get_bloginfo('name'),
				'class' => 'large-text',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_category',
				'label' => __('Primary Category', 'pds-podcast'),
				'description' => __('Your podcast\'s primary category.', 'pds-podcast'),
				'type' => 'select',
				'options' => $category_options,
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_subcategory',
				'label' => __('Primary Sub-Category', 'pds-podcast'),
				'description' => __('Your podcast\'s primary sub-category (if available) - must be a sub-category of the primary category selected above.', 'pds-podcast'),
				'type' => 'select',
				'options' => $subcategory_options,
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_category2',
				'label' => __('Secondary Category', 'pds-podcast'),
				'description' => __('Your podcast\'s secondary category.', 'pds-podcast'),
				'type' => 'select',
				'options' => $category_options,
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_subcategory2',
				'label' => __('Secondary Sub-Category', 'pds-podcast'),
				'description' => __('Your podcast\'s secondary sub-category (if available) - must be a sub-category of the secondary category selected above.', 'pds-podcast'),
				'type' => 'select',
				'options' => $subcategory_options,
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_category3',
				'label' => __('Tertiary Category', 'pds-podcast'),
				'description' => __('Your podcast\'s tertiary category.', 'pds-podcast'),
				'type' => 'select',
				'options' => $category_options,
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_subcategory3',
				'label' => __('Tertiary Sub-Category', 'pds-podcast'),
				'description' => __('Your podcast\'s tertiary sub-category (if available) - must be a sub-category of the tertiary category selected above.', 'pds-podcast'),
				'type' => 'select',
				'options' => $subcategory_options,
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_description',
				'label' => __('Description/Summary', 'pds-podcast'),
				'description' => __('A description/summary of your podcast - no HTML allowed.', 'pds-podcast'),
				'type' => 'textarea',
				'default' => get_bloginfo('description'),
				'placeholder' => get_bloginfo('description'),
				'callback' => 'wp_strip_all_tags',
				'class' => 'large-text',
			),
			array(
				'id' => 'data_image',
				'label' => __('Cover Image', 'pds-podcast'),
				'description' => __('Your podcast cover image - must have a minimum size of 1400x1400 px.', 'pds-podcast'),
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => 'esc_url_raw',
			),
			array(
				'id' => 'data_owner_name',
				'label' => __('Owner name', 'pds-podcast'),
				'description' => __('Podcast owner\'s name.', 'pds-podcast'),
				'type' => 'text',
				'default' => get_bloginfo('name'),
				'placeholder' => get_bloginfo('name'),
				'class' => 'large-text',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_owner_email',
				'label' => __('Owner email address', 'pds-podcast'),
				'description' => __('Podcast owner\'s email address.', 'pds-podcast'),
				'type' => 'text',
				'default' => get_bloginfo('admin_email'),
				'placeholder' => get_bloginfo('admin_email'),
				'class' => 'large-text',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_language',
				'label' => __('Language', 'pds-podcast'),
				// translators: placeholders are for a link to the ISO standards
				'description' => sprintf(__('Your podcast\'s language in %1$sISO-639-1 format%2$s.', 'pds-podcast'), '<a href="' . esc_url('http://www.loc.gov/standards/iso639-2/php/code_list.php') . '" target="' . wp_strip_all_tags('_blank') . '">', '</a>'),
				'type' => 'text',
				'default' => get_bloginfo('language'),
				'placeholder' => get_bloginfo('language'),
				'class' => 'all-options',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'data_copyright',
				'label' => __('Copyright', 'pds-podcast'),
				'description' => __('Copyright line for your podcast.', 'pds-podcast'),
				'type' => 'text',
				'default' => '&#xA9; ' . date('Y') . ' ' . get_bloginfo('name'),
				'placeholder' => '&#xA9; ' . date('Y') . ' ' . get_bloginfo('name'),
				'class' => 'large-text',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'explicit',
				'label' => __('Explicit', 'pds-podcast'),
				// translators: placeholders are for an Apple help document link
				'description' => sprintf(__('To mark this podcast as an explicit podcast, check this box. Explicit content rules can be found %s.', 'pds-podcast'), '<a href="https://discussions.apple.com/thread/1079151">here</a>'),
				'type' => 'checkbox',
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'complete',
				'label' => __('Complete', 'pds-podcast'),
				'description' => __('Mark if this podcast is complete or not. Only do this if no more episodes are going to be added to this feed.', 'pds-podcast'),
				'type' => 'checkbox',
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'publish_date',
				'label' => __('Source for publish date', 'pds-podcast'),
				'description' => __('Use the "Published date" of the post or use "Date recorded" from the Podcast episode details.', 'pds-podcast'),
				'type' => 'radio',
				'options' => array(
					'published' => __('Published date', 'pds-podcast'),
					'recorded' => __('Recorded date', 'pds-podcast'),
				),
				'default' => 'published',
			),
			array(
				'id' => 'consume_order',
				'label' => __('Show Type', 'pds-podcast'),
				// translators: placeholders are for help document link
				'description' => sprintf(__('The order your podcast episodes will be listed. %1$sMore details here.%2$s', 'pds-podcast'), '<a href="' . esc_url('https://www.simplepodcasting.com/ios-11-podcast-tags/') . '" target="' . wp_strip_all_tags('_blank') . '">', '</a>'),
				'type' => 'select',
				'options' => array(
					'' => __('Please Select', 'pds-podcast'),
					'episodic' => __('Episodic', 'pds-podcast'),
					'serial' => __('Serial', 'pds-podcast'),
				),
				'default' => '',
			),
			array(
				'id' => 'media_prefix',
				'label' => __('Media File Prefix', 'pds-podcast'),
				// translators: placeholders are for help document link
				'description' => sprintf(__('Enter your Podtrac, Chartable, or other media file prefix here. %1$sMore details here.%2$s', 'pds-podcast'), '<a href="' . esc_url('https://support.castos.com/article/95-adding-a-media-file-prefix-for-podtrac-chartable-and-other-tracking-services') . '" target="' . wp_strip_all_tags('_blank') . '">', '</a>'),
				'type' => 'text',
				'default' => '',
				'placeholder' => __('https://dts.podtrac.com/redirect/mp3/', 'pds-podcast'),
				'callback' => 'esc_url_raw',
				'class' => 'regular-text',
			),
			array(
				'id' => 'episode_description',
				'label' => __('Episode description', 'pds-podcast'),
				'description' => __('Use the excerpt or the post content in the description tag for episodes', 'pds-podcast'),
				'type' => 'radio',
				'options' => array(
					'excerpt' => __('Post Excerpt', 'pds-podcast'),
					'content' => __('Post Content', 'pds-podcast'),
				),
				'default' => 'excerpt',
			),
			array(
				'id' => 'exclude_feed',
				'label' => __('Exclude series from default feed', 'pds-podcast'),
				// translators: placeholders are html anchor tags to support document
				'description' => sprintf(__('When enabled, this will exclude any episodes in this series feed from the default feed. %1$sMore details here.%2$s', 'pds-podcast'), '<a href="' . esc_url('https://support.castos.com/article/114-excluding-series-episodes-from-the-default-feed') . '" target="' . wp_strip_all_tags('_blank') . '">', '</a>'),
				'type' => 'checkbox',
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'turbocharge_feed',
				'label' => __('Turbocharge podcast feed', 'pds-podcast'),
				// translators: placeholders are html anchor tags to support document
				'description' => sprintf(__('When enabled, this setting will speed up your feed loading time. %1$sMore details here.%2$s', 'pds-podcast'), '<a href="' . esc_url('https://support.castos.com/article/89-turbocharging-your-feed-to-maximize-available-episodes') . '" target="' . wp_strip_all_tags('_blank') . '">', '</a>'),
				'type' => 'checkbox',
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'redirect_feed',
				'label' => __('Redirect this feed to new URL', 'pds-podcast'),
				'description' => sprintf(__('Redirect your feed to a new URL (specified below).', 'pds-podcast'), '<br/>'),
				'type' => 'checkbox',
				'default' => '',
				'callback' => 'wp_strip_all_tags',
			),
			array(
				'id' => 'new_feed_url',
				'label' => __('New podcast feed URL', 'pds-podcast'),
				'description' => __('Your podcast feed\'s new URL.', 'pds-podcast'),
				'type' => 'text',
				'default' => '',
				'placeholder' => __('New feed URL', 'pds-podcast'),
				'callback' => 'esc_url_raw',
				'class' => 'regular-text',
			),
			array(
				'id' => '',
				'label' => __('Subscribe button links', 'pds-podcast'),
				'description' => __('To create Subscribe Buttons for your site visitors, enter the Distribution URL to your show in the directories below.', 'pds-podcast'),
				'type' => '',
				'placeholder' => __('Subscribe button links', 'pds-podcast'),
			),
		);

		$subscribe_options_array = $this->get_subscribe_field_options();
		$settings['feed-details']['fields'] = array_merge($feed_details_fields, $subscribe_options_array);

		$settings['security'] = array(
			'title' => __('Security', 'pds-podcast'),
			'description' => __('Change these settings to ensure that your podcast feed remains private. This will block feed readers (including iTunes) from accessing your feed.', 'pds-podcast'),
			'fields' => array(
				array(
					'id' => 'protect',
					'label' => __('Password protect your podcast feed', 'pds-podcast'),
					'description' => __('Mark if you would like to password protect your podcast feed - you can set the username and password below. This will block all feed readers (including iTunes) from accessing your feed.', 'pds-podcast'),
					'type' => 'checkbox',
					'default' => '',
					'callback' => 'wp_strip_all_tags',
				),
				array(
					'id' => 'protection_username',
					'label' => __('Username', 'pds-podcast'),
					'description' => __('Username for your podcast feed.', 'pds-podcast'),
					'type' => 'text',
					'default' => '',
					'placeholder' => __('Feed username', 'pds-podcast'),
					'class' => 'regular-text',
					'callback' => 'wp_strip_all_tags',
				),
				array(
					'id' => 'protection_password',
					'label' => __('Password', 'pds-podcast'),
					'description' => __('Password for your podcast feed. Once saved, the password is encoded and secured so it will not be visible on this page again.', 'pds-podcast'),
					'type' => 'text_secret',
					'default' => '',
					'placeholder' => __('Feed password', 'pds-podcast'),
					'callback' => array($this, 'encode_password'),
					'class' => 'regular-text',
				),
				array(
					'id' => 'protection_no_access_message',
					'label' => __('No access message', 'pds-podcast'),
					'description' => __('This message will be displayed to people who are not allowed access to your podcast feed. Limited HTML allowed.', 'pds-podcast'),
					'type' => 'textarea',
					'default' => __('You are not permitted to view this podcast feed.', 'pds-podcast'),
					'placeholder' => __('Message displayed to users who do not have access to the podcast feed', 'pds-podcast'),
					'callback' => array($this, 'validate_message'),
					'class' => 'large-text',
				),
			),
		);

		$settings['redirection'] = array(
			'title' => __('Redirection', 'pds-podcast'),
			'description' => __('Use these settings to safely move your podcast to a different location. Only do this once your new podcast is setup and active.', 'pds-podcast'),
			'fields' => array(
				array(
					'id' => 'redirect_feed',
					'label' => __('Redirect podcast feed to new URL', 'pds-podcast'),
					'description' => sprintf(__('Redirect your feed to a new URL (specified below).%1$sThis will inform all podcasting services that your podcast has moved and 48 hours after you have saved this option it will permanently redirect your feed to the new URL.', 'pds-podcast'), '<br/>'),
					'type' => 'checkbox',
					'default' => '',
					'callback' => 'wp_strip_all_tags',
				),
				array(
					'id' => 'new_feed_url',
					'label' => __('New podcast feed URL', 'pds-podcast'),
					'description' => __('Your podcast feed\'s new URL.', 'pds-podcast'),
					'type' => 'text',
					'default' => '',
					'placeholder' => __('New feed URL', 'pds-podcast'),
					'callback' => 'esc_url_raw',
					'class' => 'regular-text',
				),
			),
		);

		$settings['publishing'] = array(
			'title' => __('Publishing', 'pds-podcast'),
			'description' => __('Use these URLs to share and publish your podcast feed. These URLs will work with any podcasting service (including iTunes).', 'pds-podcast'),
			'fields' => array(
				array(
					'id' => 'feed_url',
					'label' => __('External feed URL', 'pds-podcast'),
					'description' => __('If you are syndicating your podcast using a third-party service (like Feedburner) you can insert the URL here, otherwise this must be left blank.', 'pds-podcast'),
					'type' => 'text',
					'default' => '',
					'placeholder' => __('External feed URL', 'pds-podcast'),
					'callback' => 'esc_url_raw',
					'class' => 'regular-text',
				),
				array(
					'id' => 'feed_link',
					'label' => __('Complete feed', 'pds-podcast'),
					'description' => '',
					'type' => 'feed_link',
					'callback' => 'esc_url_raw',
				),
				array(
					'id' => 'feed_link_series',
					'label' => __('Feed for a specific series', 'pds-podcast'),
					'description' => '',
					'type' => 'feed_link_series',
					'callback' => 'esc_url_raw',
				),
				array(
					'id' => 'podcast_url',
					'label' => __('Podcast page', 'pds-podcast'),
					'description' => '',
					'type' => 'podcast_url',
					'callback' => 'esc_url_raw',
				),
			),
		);

		$settings['castos-hosting'] = array(
			'title' => __('Hosting', 'pds-podcast'),
			'description' => sprintf(__('Connect your WordPress site to your %s account.', 'pds-podcast'), '<a target="_blank" href="' . SSP_CASTOS_APP_URL . '">Castos</a>'),
			'fields' => array(
				array(
					'id' => 'podmotor_account_email',
					'label' => __('Your email', 'pds-podcast'),
					'description' => __('The email address you used to register your Castos account.', 'pds-podcast'),
					'type' => 'text',
					'default' => '',
					'placeholder' => __('email@domain.com', 'pds-podcast'),
					'callback' => 'esc_email',
					'class' => 'regular-text',
				),
				array(
					'id' => 'podmotor_account_api_token',
					'label' => __('Castos API token', 'pds-podcast'),
					'description' => __('Your Castos API token. Available from your Castos account dashboard.', 'pds-podcast'),
					'type' => 'text',
					'default' => '',
					'placeholder' => __('Enter your api token', 'pds-podcast'),
					'callback' => 'sanitize_text_field',
					'class' => 'regular-text',
				),
				array(
					'id' => 'podmotor_disconnect',
					'label' => __('Disconnect Castos', 'pds-podcast'),
					'description' => __('Disconnect your Castos account.', 'pds-podcast'),
					'type' => 'checkbox',
					'default' => '',
					'callback' => 'wp_strip_all_tags',
					'class' => 'disconnect-castos',
				),
			),
		);

		$fields = array();
		if (ssp_is_connected_to_castos()) {
			if (!ssp_get_external_rss_being_imported()) {
				$fields = array(
					array(
						'id' => 'podmotor_import',
						'label' => __('Import your podcast', 'pds-podcast'),
						'description' => __('Import your podcast to your Castos hosting account.', 'pds-podcast'),
						'type' => 'checkbox',
						'default' => '',
						'callback' => 'wp_strip_all_tags',
						'class' => 'import-castos',
					),
				);
			}
		}
		$settings['import'] = array(
			'title' => __('Import', 'pds-podcast'),
			'description' => sprintf(__('Use this option for a one time import of your existing WordPress podcast to your Castos account. If you encounter any problems with this import, please contact support at hello@castos.com.', 'pds-podcast'), '<a href="' . SSP_CASTOS_APP_URL . '">Castos</a>'),
			'fields' => $fields,
		);

		$settings['extensions'] = array(
			'title' => __('Extensions', 'pds-podcast'),
			'description' => __('These extensions add functionality to your Simple PdS Podcast powered podcast.', 'pds-podcast'),
			'fields' => array(),
			'disable_save_button' => true,
		);
		*/

		$settings = apply_filters('ssp_settings_fields', $settings);

		return $settings;
	}

	/**
	 * Encode feed password
	 *
	 * @param string $password User input
	 *
	 * @return string           Encoded password
	 */
	public function encode_password($password)
	{

		if ($password && strlen($password) > 0 && '' !== $password) {
			$password = md5($password);
		} else {
			$option = get_option('ss_podcasting_protection_password');
			$password = $option;
		}

		return $password;
	}

	/**
	 * Validate protectino message
	 *
	 * @param string $message User input
	 *
	 * @return string          Validated message
	 */
	public function validate_message($message)
	{

		if ($message) {

			$allowed = array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'target' => array(),
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'p' => array(),
			);

			$message = wp_kses($message, $allowed);
		}

		return $message;
	}

	/**
	 * Builds the array of field settings for the subscribe links, based on the options stored in the options table.
	 *
	 * @return array
	 */
	public function get_subscribe_field_options()
	{
		$subscribe_field_options = array();

		$options_handler = new Options_Handler();
		$available_subscribe_options = $options_handler->available_subscribe_options;

		$subscribe_options = get_option('ss_podcasting_subscribe_options', array());
		if (empty($subscribe_options)) {
			return $subscribe_field_options;
		}

		if (isset($_GET['feed-series']) && 'default' !== $_GET['feed-series']) {
			$feed_series_slug = sanitize_text_field($_GET['feed-series']);
			$series = get_term_by('slug', $feed_series_slug, 'series');
			$series_id = $series->ID;
		}

		foreach ($subscribe_options as $option_key) {
			if (isset($available_subscribe_options[$option_key])) {
				if (isset($series_id)) {
					$field_id = $option_key . '_url_' . $series_id;
					$value = get_option('ss_podcasting_' . $field_id);
				} else {
					$field_id = $option_key . '_url';
					$value = get_option('ss_podcasting_' . $field_id);
				}
			} else {
				continue;
			}
			$subscribe_field_options[] = array(
				'id' => $field_id,
				// translators: %s: Service title eg iTunes
				'label' => sprintf(__('%s URL', 'pds-podcast'), $available_subscribe_options[$option_key]),
				// translators: %s: Service title eg iTunes
				'description' => sprintf(__('Your podcast\'s %s URL.', 'pds-podcast'), $available_subscribe_options[$option_key]),
				'type' => 'text',
				'default' => $value,
				// translators: %s: Service title eg iTunes
				'placeholder' => sprintf(__('%s URL', 'pds-podcast'), $available_subscribe_options[$option_key]),
				'callback' => 'esc_url_raw',
				'class' => 'regular-text',
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
	public function role_exists($role)
	{
		if (!empty($role)) {
			return $GLOBALS['wp_roles']->is_role($role);
		}

		return false;
	}

}
