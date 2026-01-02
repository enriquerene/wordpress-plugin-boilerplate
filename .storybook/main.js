

/** @type { import('@storybook/react-vite').StorybookConfig } */
const config = {
  "stories": [
    "../src/**/*.mdx",
    "../src/**/*.stories.@(js|jsx|mjs|ts|tsx)"
  ],
  "addons": [
    "@chromatic-com/storybook",
    "@storybook/addon-vitest",
    "@storybook/addon-a11y",
    "@storybook/addon-docs"
  ],
  "framework": "@storybook/react-vite",
  async viteFinal(config) {
    const { mergeConfig } = await import('vite');
    return mergeConfig(config, {
      resolve: {
        alias: {
          '@wordpress/i18n': '/.storybook/mocks/wordpress-i18n.js',
          '@wordpress/block-editor': '/.storybook/mocks/wordpress-block-editor.js',
          '@wordpress/components': '/.storybook/mocks/wordpress-components.js',
          '@wordpress/blocks': '/.storybook/mocks/wordpress-blocks.js',
        },
      },
      esbuild: {
        loader: 'jsx',
        include: /src\/.*\.[tj]sx?$|.storybook\/.*\.[tj]sx?$/,
        exclude: [],
      },
      optimizeDeps: {
        esbuildOptions: {
          loader: {
            '.js': 'jsx',
          },
        },
      },
    });
  },
};
export default config;