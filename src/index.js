const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;
const { __ } = wp.i18n;

registerBlockType( 'wp-fire-gutenburg/ice-block', {
	title: __( 'WP Ice Gutenberg' ),
	description: __( 'Ice Gutenberg Block' ),
	icon: 'universal-access-alt',
	category: 'layout',
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
	},
	edit: ( props ) => {
		console.log( props );
		const { attributes, setAttributes } = props;

		const onChangeContent = ( content ) => {
			setAttributes( { content } );
		};

		return (
			<div className={'wp-ice-block'}>
				<RichText
					tagName={'p'}
					onChange={onChangeContent}
					value={attributes.content}
				/>
			</div>
		);
	},
	save: ( props ) => {
		return (
			<div className={'wp-ice-block'}>
				<RichText.Content
					tagName={'p'}
					value={props.attributes.content}
				/>
			</div>
		);
	},
});
