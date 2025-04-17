import flowbite from 'flowbite/plugin.js';
import colors from './resources/data/colors.json' assert { type: 'json' };


/** @type {import('tailwindcss').Config} config */
const config = {
  mode:"jit",
  content: [
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './node_modules/flowbite/**/*.js',
    './resources/views/**/*.blade.php',
    './resources/**/*.{js,jsx,ts,tsx,vue}',
    './storage/framework/views/*.php',
    './web/app/plugins/contact-form-7/**/*.php',
  ],
  theme: {
    extend: {
      colors: Object.fromEntries(
        Object.entries(colors).map(([key, value]) => [key, value.value])
      )
    },
  },
  plugins: [
    flowbite
  ],
  safelist: [
    {
      pattern: /peer-placeholder-shown:.*/,
      variants: [''],
    },
    {
      pattern: /peer-focus:.*/,
      variants: [''],
    },
    {
      pattern: /^bg-(primary|secondary)$/,
      variants: ['dark'],
    }    
  ],
};

export default config;
