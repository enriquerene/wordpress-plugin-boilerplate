import { useBlockProps, RichText } from '@wordpress/block-editor';
import React from 'react';

const RightArrow = () => (
	<svg
		viewBox="0 0 14 14"
		width="8px"
		height="14px"
		style={{
			marginLeft: '4px',
			display: 'inline-block',
			shapeRendering: 'inherit',
			verticalAlign: 'middle',
			fill: 'currentColor',
		}}
	>
		<path d="m11.1 7.35-5.5 5.5a.5.5 0 0 1-.7-.7L10.04 7 4.9 1.85a.5.5 0 1 1 .7-.7l5.5 5.5c.2.2.2.5 0 .7Z" />
	</svg>
);

export default function save( { attributes } ) {
	const { imageUrl, imageAlt, title, description, linkText, linkUrl } = attributes;
	const blockProps = useBlockProps.save( {
		className: 'wppb-author-presentation',
	} );

	return (
		<div { ...blockProps }>
			<div className="wppb-author-presentation-text">
				<RichText.Content tagName="h4" value={ title } />
				<RichText.Content
					tagName="p"
					className="wppb-social-card-paragraph"
					value={ description }
				/>
				<a href={ linkUrl } className="wppb-author-presentation-link">
					<RichText.Content tagName="span" value={ linkText } />
					<RightArrow />
				</a>
			</div>
			<div className="wppb-author-presentation-img">
				{ imageUrl && <img src={ imageUrl } alt={ imageAlt } /> }
			</div>
		</div>
	);
}
