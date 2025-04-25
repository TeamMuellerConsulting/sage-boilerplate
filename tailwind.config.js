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
      pattern: /^(mt|mb|pt|pb|pl|pr|ml|mr|text|bg|gap|grid|items|justify)-(0|1|2|3|4|5|6|8|10|12|16|20|24|32|40|48|56|64|72|80|96|px)$/,
    },
    {
      pattern: /^bg-(primary|secondary)$/,
      variants: ['dark'],
    }    
  ],
};

export default config;
