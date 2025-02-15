/**
 * WordPress dependencies
 */
import {__} from '@wordpress/i18n';
import {registerBlockType} from '@wordpress/blocks';

import EditPlayer from './components/EditPlayer';
import AudioPlayer from "./components/AudioPlayer";
import CastosPlayer from "./components/CastosPlayer";
import EditCastosPlayer from './components/EditCastosPlayer';
import EditPodcastList from "./components/EditPodcastList";

/**
 * Standard Audio Player Block
 */
registerBlockType('pds-podcast/audio-player', {
	title: __('Audio Player', 'pds-podcast'),
	icon: 'controls-volumeon',
	category: 'layout',
	supports: {
		multiple: false,
	},
	attributes: {
		id: {
			type: 'string',
		},
		audio_player: {
			type: 'string',
			source: 'html',
			selector: 'span',
		}
	},
	edit: EditPlayer,
	save: (props, className) => {
		const { id, audio_player } = props.attributes;
		return (
			<AudioPlayer className={className} audioPlayer={audio_player}/>
		);
	},
});

/**
 * Castos Player block
 */
registerBlockType('pds-podcast/castos-player', {
	title: __('Castos Player', 'pds-podcast'),
	icon: 'controls-volumeon',
	category: 'layout',
	supports: {
		multiple: false,
	},
	attributes: {
		id: {
			type: 'string',
		},
		image: {
			type: 'string',
		},
		file: {
			type: 'string',
		},
		title: {
			type: 'string',
		},
		duration: {
			type: 'string',
		},
		download: {
			type: 'string',
		},
		episode_data: {
			type: 'object',
		},
	},
	edit: EditCastosPlayer,
	save: (props, className) => {
		const { id, image, file, title, duration, download, episode_data } = props.attributes;

		if( episode_data ){
			return (
				<CastosPlayer
					className={className}
					episodeId={id}
					episodeImage={image}
					episodeFileUrl={file}
					episodeTitle={title}
					episodeDuration={duration}
					episodeDownloadUrl={download}
					episodeData={episode_data}
				/>
			);
		} else {
			return ('');
		}
	},
});

/**
 * Podcast list block
 */
registerBlockType('pds-podcast/podcast-list', {
	title: __('Podcast List', 'pds-podcast'),
	icon: 'megaphone',
	category: 'widgets',
	supports: {
		multiple: false,
	},
	attributes: {
		featuredImage: {
			type: 'boolean',
			default: false,
		},
		excerpt: {
			type: 'boolean',
			default: false,
		},
		player: {
			type: 'boolean',
			default: false,
		},
	},
	edit: EditPodcastList
});
