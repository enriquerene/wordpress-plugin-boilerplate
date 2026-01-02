import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { Button, PanelBody, TextControl } from '@wordpress/components';
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

export default function Edit( { attributes, setAttributes } ) {
	const { imageUrl, imageAlt, title, description, linkText, linkUrl } = attributes;
	const blockProps = useBlockProps( {
		className: 'wppb-author-presentation',
	} );

	const onSelectImage = ( media ) => {
		setAttributes( {
			imageUrl: media.url,
			imageAlt: media.alt,
		} );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Link Settings', 'plugin-name' ) }>
					<TextControl
						label={ __( 'Link URL', 'plugin-name' ) }
						value={ linkUrl }
						onChange={ ( val ) => setAttributes( { linkUrl: val } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<div className="wppb-author-presentation-text">
					<RichText
						tagName="h4"
						value={ title }
						onChange={ ( val ) => setAttributes( { title: val } ) }
						placeholder={ __( 'Write title...', 'plugin-name' ) }
					/>
					<RichText
						tagName="p"
						className="wppb-social-card-paragraph"
						value={ description }
						onChange={ ( val ) => setAttributes( { description: val } ) }
						placeholder={ __( 'Write description...', 'plugin-name' ) }
					/>
					<div className="wppb-author-presentation-link">
						<RichText
							tagName="span"
							value={ linkText }
							onChange={ ( val ) => setAttributes( { linkText: val } ) }
							placeholder={ __( 'Link text...', 'plugin-name' ) }
						/>
						<RightArrow />
					</div>
				</div>
				<div className="wppb-author-presentation-img">
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ onSelectImage }
							allowedTypes={ [ 'image' ] }
							value={ imageUrl }
							render={ ( { open } ) => (
								<Button
									className={ ! imageUrl ? 'button button-large' : '' }
									onClick={ open }
									style={ ! imageUrl ? { position: 'relative', zIndex: 10 } : {} }
								>
									{ ! imageUrl ? (
										__( 'Upload Image', 'plugin-name' )
									) : (
										<img src={ imageUrl } alt={ imageAlt } />
									) }
								</Button>
							) }
						/>
					</MediaUploadCheck>
				</div>
			</div>
		</>
	);
}
