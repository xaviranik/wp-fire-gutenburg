wp.blocks.registerBlockType( 'wp-fire-gutenburg/fire-block', {
    title: wp.i18n.__( 'WP Fire Gutenberg', 'wp-fire-gutenburg' ),
    description: wp.i18n.__( 'Custom gutenburg blocks', 'wp-fire-gutenburg' ),
    icon: 'smiley',
    category: 'common',

    edit: function () {
        return wp.element.createElement(
            'div',
            { className: 'wp-fire-block' },
            wp.element.createElement(
                'h2',
                null,
                wp.i18n.__( 'WP Fire Gutenberg', 'wp-fire-gutenburg' )
            ),
            wp.element.createElement(
                'p',
                null,
                wp.i18n.__( 'This is a custom Gutenberg block.', 'wp-fire-gutenburg' )
            )
        );
    },

    save: function () {
        return wp.element.createElement(
            'div',
            { className: 'wp-fire-block' },
            wp.i18n.__( 'Saved to database', 'wp-fire-gutenburg' )
        );
    }
} );
