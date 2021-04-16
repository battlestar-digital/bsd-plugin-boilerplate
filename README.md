# Battlestar Digital Plugin Boilerplate
This modern boilerplate template uses namespaces for PHP and React for plugin settings.

## Initial Setup

### Prerequisites

Before you begin, ensure you have met the following requirements:
* You have installed the latest version of [Node.js](https://nodejs.org/en/download/)
* You have installed the latest version of NPM (included with Node.js)

### Installation

Copy the contents of the `bsd-plugin-boilerplate` folder into your `\wp-content\plugins` folder. The steps below will walk you through customizing these files for your new plugin.

First, we need to replace our generic plugin name and slug with your plugin name and slug.

1. Rename the root folder to your plugin's slug. 
1. Rename `bsd-plugin-boilerplate.php` to `your-plugin-slug.php`
1. Rename `includes\class-bsd-plugin-boilerplate.php` to `includes\class-your-plugin-slug.php`
1. Find and replace all instances of `bsd-plugin-boilerplate` with `your-plugin-slug`
1. Find and replace all instances of `bsd_plugin_boilerplate_admin` with `your_plugin_slug_admin`
1. Find and replace all instances of `BSD_Plugin_Boilerplate_Main_Plugin` with `Your_Plugin_Slug_Main_Plugin`
1. Find and replace all instances of `BSD_PLUGIN_BOILERPLATE_URL` with `YOUR_PLUGIN_SLUG_URL`
1. Find and replace all instances of `BSD_Plugin_Boilerplate` with `Your_Plugin_Slug`
1. Find and replace all instances of `BSD Plugin Boilerplate` with `Your Plugin Name`

Next, install the required Node modules and create a `dist` file:

1. Navigate to `your-plugin-slug\blocks` and run `npm install`
1. Run `npm run build`. This command creates the `dist` folder which contains the JS and CSS files enqueued by your plugin.

Finally, open your WordPress admin dashboard and activate the plugin.

Congratulations! You now have a fully-functional -- if somewhat barebones -- plugin.

### Screenshots

Out of the box, you'll have a settings icon in the Admin dashboard:

![Settings icon](/../readme_screenshots/readme_images/wordpress_boilerplate_plugin_admin_settings_icon.jpg?raw=true "Settings Icon")

You can, and probably should, replace the embedded SVG icon in `\includes\admins\menu.php`. [SVG Repo](https://www.svgrepo.com/) has a great selection of SVG icons.

To start, you'll have a single sample setting available in the settings page:

![Sample plugin option](/../readme_screenshots/readme_images/wordpress_boilerplate_plugin_react_settings_page.jpg?raw=true "Sample Plugin Option")

Obviously, you'll want to replace this with your own plugin option. 

## Customization

### Plugin Options

Creating your plugin settings requires two steps, and an optional third:

1. Register your setting by adding a new call to the `register_setting` function. Add this call in `\includes\init.php`, modeling (or updating) the example provided in lines 11-18.
1. Update `\blocks\app\admin-settings\index.js`. Okay, this isn't really a single-step process. Using the boilerplates sample setting as a guide, add your setting as follows:
    1. Create a new constant in `componentDidMount` (sample: `productVariations`).
    1. Add your setting to the settings array inside `setState` (sample: `BSD_Plugin_Boilerplate_sample_setting: productVariations`).
    1. Add a new function to run when your setting is updated. You can copy `sampleSettingsChange(newVal)`.
    1. Bind your new function (sample: `this.sampleSettingChange = this.sampleSettingChange.bind(this);` in the constructor).
    1. Add a new Panel Row in the render function. See the existing `<TextControl>` for an example. 
        1. Refer to the [Block Editor Handbook](https://developer.wordpress.org/block-editor/components/) for components you can use, such as the CheckboxControl, SelectControl, and TextareaControl
1. Optionally, but highly recommended, is to clean up after yourself. Add your setting to the array in `uninstall.php`

## Backlog

1. Add a Gulp script to ZIP only the files necessary for plugin distribution (e.g., ignore `node-modules`, `blocks\app`)
1. Add a script to rename files, variables, and constants with your plugin name and slug
1. Add PHPUnit for PHP unit tests
1. Add React Testing Library for React component testing
