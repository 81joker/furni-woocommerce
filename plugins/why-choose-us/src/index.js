import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import Save from './save';
import './style.scss';

registerBlockType( 'why-choose-us/why-choose-us', {
	title: 'Why Choose Us',
	icon: 'smiley',
	category: 'layout',
	attributes: {
		title: { type: 'string', default: 'Why Choose Us' },
		description: { type: 'string', default: '' },
		image: { type: 'string', default: null },
	},
	edit: Edit,
	save: Save,
} );
