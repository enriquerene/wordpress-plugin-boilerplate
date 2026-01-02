import React from 'react';

export const useBlockProps = () => {
  return {
    className: 'wp-block',
    style: {},
  };
};

export const RichText = ({ value, onChange, placeholder, tagName: Tag = 'div' }) => {
  return (
    <Tag
      contentEditable
      onInput={(e) => onChange(e.currentTarget.textContent)}
      dangerouslySetInnerHTML={{ __html: value }}
      data-placeholder={placeholder}
    />
  );
};

RichText.Content = ({ value, tagName: Tag = 'div' }) => {
  return <Tag dangerouslySetInnerHTML={{ __html: value }} />;
};

export const MediaUpload = ({ onSelect, render }) => {
  return render({
    open: () => {
      const url = prompt('Enter image URL:');
      if (url) {
        onSelect({ url, alt: 'Mocked Alt' });
      }
    },
  });
};

export const MediaUploadCheck = ({ children }) => {
  return <>{children}</>;
};

export const InspectorControls = ({ children }) => {
  return <div className="inspector-controls-mock">{children}</div>;
};
