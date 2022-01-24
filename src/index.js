const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

registerBlockType( 'wp-fire-gutenburg/ice-block', {
	title: 'WP Ice Gutenberg',
	description: 'Ice Gutenberg Block',
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
		const { attributes, setAttributes } = props;

		const onChangeContent = ( content ) => {
			setAttributes( { content } );
		};

		return (
			<RichText
				tagName={'p'}
				onChange={onChangeContent}
				value={attributes.content}
			/>
		);
	},
	save: ( props ) => {
		return (
			<div className={ 'wp-ice-block' }>
				<RichText.Content
					tagName={'p'}
					value={props.attributes.content}
				/>
			</div>
		);
	},
});
