# Seeder plugin for Craft CMS 3.x

![Seeder](/resources/banner.png?raw=true)

## Usage

Seeder allows you to quickly create dummy entries through the command line. And you can just as easily remove the dummy data when you're done building the site.
With the plugin installed, running `./craft help seeder/generate` will show you which commands are available

Since the plugin is only usefull during the development and not on a live site, charging money for it would be stupid (you could just free trial it every time). Instead you can download it for free and if you want to support future development, you can support it on [beerpay.io](https://beerpay.io/studioespresso/craft3-seeder). Thanks! 

[![Beerpay](https://beerpay.io/studioespresso/craft3-seeder/badge.svg)](https://beerpay.io/studioespresso/craft3-seeder)

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require studioespresso/craft-seeder

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for "Seeder".

#### Entries (Section ID, count)

Use the command below, followed by the ``sectionId`` and the number of entries you want to create (defaults to 20 if ommited). 

```Shell
./craft seeder/generate/entries 1 15
```

#### Categories (Category group ID, count)
```Shell
./craft seeder/generate/categories 1 10
```

#### Users (Usergroup ID, count)
```Shell
./craft seeder/generate/users 1 5
```

## Clean up
Once you're done building out the site, the plugin gives you an easy way to remove the dummy data (entries, assets, categories and users). This can be done through the CP (click the Seeder section the sidebar) or through the command line with the following command:

```Shell
./craft seeder/clean-up/all
```

## Troubleshooting
The most common problem with the plugins is getting the following error:
````Shell
Unknown command: seeder/generate/entries
````
If you have the plugin installed in the CP and are seeing this message, craft can not connect to your database through the command line. Your site probably works correctly but CLI commands won't.

If you're running MAMP/XAMP, you should use `127.0.0.1` as hostname instead of `localhost`.  


## Roadmap

#### Core elements
- [x] Entries
- [x] Categories
- [x] Users
- [x] Entry fields
- [ ] User fields
- [ ] Category fields
- [ ] Asset fields 

#### Plugin elements
- [ ] Commerce products & variants

#### Core fields
- [x] Title
- [x] Plain text
- [x] Email
- [x] Url
- [x] Color
- [x] Date
- [x] Categories
- [x] Dropdown
- [x] Checkboxes
- [x] Radio buttons
- [x] Multi select
- [x] Assets
- [x] Matrix
- [x] Lightswitch
- [x] Table
- [x] Tags
- [x] Users

#### Plugin fields
- [x] [Redactor](https://github.com/craftcms/redactor)
- [x] [CKEditor](https://github.com/craftcms/ckeditor)
- [ ] [Super Table](https://github.com/verbb/super-table)