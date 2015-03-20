# StaticContentManager plugin for CakePHP 3

# StaticContentManager
This  CakePHP v3.0 plugin can be used to manage static pages for the cakephp project. This plugin can be used to perform crud operations and viewing the content pages. This plugin used wysiwyg editor for modifying page content.

## Installation

. Download the plugin 
. place StaticContentManager folder in the plugins/ folder.
. Run the following command to add the tables to the database.

	```
	./bin/cake migrations migrate -p StaticContentManager"
	```
. Update bootstrap.php to load the plugin.

	```
	Plugin::load('StaticContentManager', ['bootstrap' => false, 'routes' => true]);
	```
. Access the plugins index page using 
	eg. http://www.example.com/static_content_manager/static_contents/