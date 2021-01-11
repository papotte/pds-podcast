import {__} from '@wordpress/i18n';
import {Component} from '@wordpress/element';
import {InspectorControls} from '@wordpress/block-editor';
import {PanelBody, PanelRow, FormToggle} from '@wordpress/components';
import apiFetch from '@wordpress/api-fetch';

import PodcastListItem from './PodcastListItem';

class EditPodcastList extends Component {
	constructor({className}) {
		super(...arguments);
		this.state = {
			className,
			episodes: [],
		};
	}

	componentDidMount() {
		const fetchPost = 'ssp/v1/episodes';
		apiFetch({path: fetchPost})
			.then(posts => {
				const episodes = []
				Object.keys(posts).map(function (key) {
					const episode = posts[key];
					episodes.push(episode);
				});
				this.setState({
					episodes: episodes,
				});
		});
	}

	render() {
		const {className, episodes} = this.state;

		const {attributes, setAttributes} = this.props;

		const {featuredImage, excerpt, player} = attributes;

		const toggleFeaturedImage = () => {
			setAttributes({
				featuredImage: !featuredImage
			});
		}

		const togglePlayer = () => {
			setAttributes({
				player: !player
			});
		}

		const toggleExcerpt = () => {
			setAttributes({
				excerpt: !excerpt
			});
		}

		const controls = (
			<InspectorControls key="inspector-controls">
				<PanelBody key="panel-1" title={__('Featured Image', 'pds-podcast')}>
					<PanelRow>
						<label htmlFor="featured-image-form-toggle">
							{__('Show Featured Image', 'pds-podcast')}
						</label>
						<FormToggle
							id="high-contrast-form-toggle"
							label={__('Show Featured Image', 'pds-podcast')}
							checked={featuredImage}
							onChange={toggleFeaturedImage}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody key="panel-2" title={__('Podcast Player', 'pds-podcast')}>
					<PanelRow>
						<label htmlFor="podcast-player-form-toggle">
							{__('Show Podcast Player', 'pds-podcast')}
						</label>
						<FormToggle
							id="podcast-player-form-toggle"
							label={__('Show Podcast Player', 'pds-podcast')}
							checked={player}
							onChange={togglePlayer}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody key="panel-3" title={__('Podcast Excerpt', 'pds-podcast')}>
					<PanelRow>
						<label htmlFor="podcast-excerpt-form-toggle">
							{__('Show Podcast Excerpt', 'pds-podcast')}
						</label>
						<FormToggle
							id="podcast-excerpt-form-toggle"
							label={__('Show Podcast Excerpt', 'pds-podcast')}
							checked={excerpt}
							onChange={toggleExcerpt}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		);

		const episodeItems = episodes.map((post) =>
			<PodcastListItem key={"podcast-list-item-" + post.id} className={className} post={post} attributes={attributes} />
		);

		return [
			controls, (
				<div key={"episode-items"}>{episodeItems}</div>
			)];
	}
}

export default EditPodcastList;
