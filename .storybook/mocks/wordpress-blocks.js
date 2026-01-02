export const registerBlockType = (name, settings) => {
  console.log(`Block registered: ${name}`, settings);
  return settings;
};
