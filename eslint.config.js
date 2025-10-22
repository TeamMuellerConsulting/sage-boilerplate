import js from "@eslint/js"
import prettier from "eslint-plugin-prettier"

export default [
  {
    ignores: ["vendor/**", "node_modules/**", "public/**"],
  },
  js.configs.recommended,
  {
    files: ["resources/js/**/*.js"],
    languageOptions: {
      ecmaVersion: "latest",
      sourceType: "module",
      globals: {
        window: true,
        document: true,
        console: true,
        setTimeout: true,
        clearTimeout: true,
        setInterval: true,
        clearInterval: true,
      },
    },
    plugins: { prettier },
    rules: {
      // Allgemeine JS-Regeln
      "no-unused-vars": "warn",
      "no-console": "off",

      // Prettier-Integration
      "prettier/prettier": [
        "error",
        {
          // Verknüpft ESLint mit deiner .prettierrc
          semi: true,
          singleQuote: true,
          tabWidth: 2,
          trailingComma: "es5",
          printWidth: 100,
        },
      ],
    },
  },
]
