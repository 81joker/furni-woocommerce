const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InspectorControls } = wp.blockEditor;
const { IconButton, PanelBody } = wp.components;
alert( 'halloo' );
registerBlockType( 'custom/why-choose-us', {
	title: 'Why Choose Us',
	icon: 'smiley',
	category: 'layout',
	attributes: {
		title: { type: 'string', default: 'Why Choose Us XX' },
		description: { type: 'string', default: '' },
		image: { type: 'string', default: null },
	},
	edit: ( props ) => {
		const {
			attributes: { title, description, image },
			setAttributes,
		} = props;

		return (
			<div>
				<InspectorControls>
					<PanelBody title="Image">
						<MediaUpload
							onSelect={ ( media ) =>
								setAttributes( { image: media.url } )
							}
							type="image"
							value={ image }
							render={ ( { open } ) => (
								<IconButton
									onClick={ open }
									icon="upload"
									isPrimary
								>
									Choose Image
								</IconButton>
							) }
						/>
					</PanelBody>
				</InspectorControls>
				<RichText
					tagName="h2"
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					placeholder="Enter title..."
				/>
				<RichText
					tagName="p"
					value={ description }
					onChange={ ( value ) =>
						setAttributes( { description: value } )
					}
					placeholder="Enter description..."
				/>
				{ image && <img src={ image } alt="Why Choose Us Image" /> }
			</div>
		);
	},
	save: ( props ) => {
		const {
			attributes: { title, description, image },
		} = props;

		return (
			<div className="why-choose-section">
				<h2>{ title }</h2>
				<p>{ description }</p>
				{ image && <img src={ image } alt="Why Choose Us Image" /> }
			</div>
		);
	},
} );
