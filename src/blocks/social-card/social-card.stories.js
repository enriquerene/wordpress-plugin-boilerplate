import Edit from './edit';
import React from 'react';
import './style.scss';
import './editor.scss';

export default {
  title: 'Blocks/SocialCard',
  component: Edit,
  argTypes: {
    imageUrl: { control: 'text' },
    imageAlt: { control: 'text' },
    title: { control: 'text' },
    description: { control: 'text' },
    linkText: { control: 'text' },
    linkUrl: { control: 'text' },
  },
};

const Template = (args) => {
  return (
    <div className="wp-block-wp-plugin-boilerplate-social-card">
      <Edit 
        attributes={args} 
        setAttributes={(attr) => console.log('Attributes updated:', attr)} 
      />
    </div>
  );
};

export const Default = Template.bind({});
Default.args = {
  imageUrl: 'https://storybook.js.org/tutorials/7.0/main-page.png',
  imageAlt: 'Social Card Example',
  title: 'Social Card Block',
  description: 'The Social Card block allows you to create featured content sections with an image, title, description, and a call-to-action link.',
  linkText: 'Explore Social Card',
  linkUrl: '#',
};
