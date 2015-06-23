# Installation

- Download and uncompress
- Ensure the directory structure
```
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
```
or execute the following command
```shell
mkdir -p cache configs libs/plugins libs/sysplugins templates/css templates/fonts templates/js templates_c
```
- Check the owner is www-data and the permission is set to 644. 
``` shell
chgrp -Rc www-data .
find . -type f | xargs chmod -c g=r,o=
find . -type d | xargs chmod -c g=rx,o=
chmod -c g+w templates_c
```
