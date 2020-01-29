### tongs ssass plugin

Render SASS files into CSS. A plugin for [Tongs](https://github.com/datashaman/tongs) static site generator.

For example:

    {
        "plugins": {
            "sass": {
                "outputStyle": "compressed"
            }
        }
    }

will invoke the following command:

    node-sass --output-style=compressed $sourcePath

for any file ending in `.sass` and `.scss`. The source will be removed and replaced by a file with `.css` containing the rendered stylesheet.

Bear in mind that your `node_modules` folder will not exist in the cloud if you use a cloud-based _source_ disk. If your _source_ is local, no problem - use `npm` packages in the build.
