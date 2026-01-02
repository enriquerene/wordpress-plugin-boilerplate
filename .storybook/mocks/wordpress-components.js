import React from 'react';

export const Button = ({ children, ...props }) => <button {...props}>{children}</button>;
export const Panel = ({ children }) => <div>{children}</div>;
export const PanelBody = ({ children, title }) => (
  <details open>
    <summary>{title}</summary>
    <div>{children}</div>
  </details>
);
export const PanelRow = ({ children }) => <div>{children}</div>;
export const TextControl = ({ label, value, onChange }) => (
  <label>
    {label}
    <input type="text" value={value} onChange={(e) => onChange(e.target.value)} />
  </label>
);
