# Installation

1. Download and uncompress
2. Ensure the directory structure
    .
    |-cache
    |-configs
    |-libs
    |---plugins
    |---sysplugins
    |-templates
    |---css
    |---fonts
    |---js
    |-templates_c
   or execute the following command
    ```shell
	mkdir -p cache configs libs/plugins libs/sysplugins templates/css templates/fonts templates/js templates_c
    ```
3. Check the owner is www-data and the permission is set to 644. 
    ```shell
	sudo chown -Rc www-data:www-data .
	sudo chmod -Rc 644 .
 
