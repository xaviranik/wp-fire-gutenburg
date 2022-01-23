const { registerBlockType } = wp.blocks;

registerBlockType( 'wp-fire-gutenburg/ice-block', {
	title: 'WP Ice Gutenberg',
	description: 'Ice Gutenberg Block',
	icon: 'universal-access-alt',
	category: 'layout',
	edit: () => {
		return (
			<div className={'wp-ice-block'}>Ice Block</div>
		);
	},
	save: () => {
		return (
			<div className={'wp-ice-block'}>Ice Block Saved</div>
		);
	},
});
