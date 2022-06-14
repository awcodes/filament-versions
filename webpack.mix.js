const mix = require("laravel-mix");

mix.disableNotifications();

mix.setPublicPath("./resources/dist")
    .postCss("./resources/css/filament-versions.css", "filament-versions.css", [
        require("tailwindcss")("./tailwind.config.js"),
    ])
    .options({
        processCssUrls: false,
    });
