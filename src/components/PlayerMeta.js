import {__} from '@wordpress/i18n';
import {Component} from '@wordpress/element';

class PlayerMeta extends Component {
	render() {
		const {className, title, download, duration} = this.props;
		const downloadLink = download + '?ref=download';
		const openLink = download + '?ref=new_window';
		return (
			<p className={className}>
				<a href={downloadLink} title={title} className="podcast-meta-download">{__('Download File', 'pds-podcast')}</a> |&nbsp;
				<a href={openLink} target="_blank" title={title} className="podcast-meta-new-window">{__('Play in new window', 'pds-podcast')}</a> |&nbsp;
				<span className="podcast-meta-duration">{__('Duration', 'pds-podcast')}: {duration}</span>
			</p>
		);
	}
}

export default PlayerMeta;
