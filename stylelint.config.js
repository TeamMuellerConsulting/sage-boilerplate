import stylistic from "@stylistic/stylelint-plugin"

export default {
    plugins: [stylistic],
    extends: ["@stylistic/stylelint-config"],
    rules: {
        // benutze das @stylistic-Namespace-Präfix
        "@stylistic/indentation": 2,
        "@stylistic/string-quotes": "single",

        // Tailwind-At-Rules erlauben
        "at-rule-no-unknown": [true, {
            ignoreAtRules: [
                "tailwind",
                "layer",
                "apply",
                "variants",
                "responsive",
                "screen",
                "theme",
                "plugin",
                "source"
            ],
        }],

        // alte Regel deaktivieren
        "import-notation": null,

        // Basisschutz
        "color-no-invalid-hex": true,
        "block-no-empty": true,
        "declaration-block-no-duplicate-properties": true,
    },
    ignoreFiles: [
        "node_modules/**/*",
        "vendor/**/*",
        "public/**/*",
        "dist/**/*",
        "**/tailwind.css",
        "**/tailwind-utilities.css"
    ],
}


