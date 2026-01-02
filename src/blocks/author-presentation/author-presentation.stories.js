import Edit from './edit';
import React from 'react';
import './style.scss';
import './editor.scss';

export default {
	title: 'Blocks/AuthorPresentation',
	component: Edit,
	argTypes: {
		title: { control: 'text' },
		description: { control: 'text' },
		linkText: { control: 'text' },
		linkUrl: { control: 'text' },
		imageUrl: { control: 'text' },
		imageAlt: { control: 'text' },
	},
};

const Template = ( args ) => {
	return (
		<div className="wp-block-wp-plugin-boilerplate-author-presentation">
			<Edit
				attributes={ {
					title: args.title,
					description: args.description,
					linkText: args.linkText,
					linkUrl: args.linkUrl,
					imageUrl: args.imageUrl,
					imageAlt: args.imageAlt,
				} }
				setAttributes={ ( attr ) => console.log( 'Attributes updated:', attr ) }
			/>
		</div>
	);
};

export const Default = Template.bind( {} );
Default.args = {
	title: 'Addons',
	description: 'Integrate your tools with Storybook to connect workflows.',
	linkText: 'Discover all addons',
	linkUrl: 'https://storybook.js.org/addons/',
	imageUrl: 'https://storybook.js.org/images/addon-library.png',
	imageAlt: 'Integrate your tools with Storybook to connect workflows.',
};
