# Installation

- Download (and uncompress if necessary) to your root document
- Edit the parameters in configs/settings.php
- Create database user
  - sudo mysql mysql < create_user.sql
- Change permission of directories 'templates_c' and 'avatar' to writable
  - chmod a+w templates_c avatar
- Run install.php to setup the database

