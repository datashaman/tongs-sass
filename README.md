# tongs example plugin

Template plugin for [Tongs](https://github.com/datashaman/tongs) static site generator.

## setup

Create a project using this repository as a template:

    composer create-project --prefer-dist datashaman/tongs-plugin example-plugin

Run tests:

    cd example-plugin
    vendor/bin/phpunit

*nb* Remember to change the metadata in composer.json to match your preferred plugin name and class.
