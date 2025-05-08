[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplatbackup/v/stable)](https://packagist.org/packages/julio101290/boilerplatbackup) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplatbackup/downloads)](https://packagist.org/packages/julio101290/boilerplatbackup) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplatbackup/v/unstable)](https://packagist.org/packages/julio101290/boilerplatbackup) [![License](https://poser.okvpn.org/julio101290/boilerplatbackup/license)](https://packagist.org/packages/julio101290/boilerplatbackup)

## CodeIgniter 4 Boilerplate Backup
 This library is a extension for CodeIgniter4 boilerplate . MariaDB/MySQL backups database easy interface 

## Installation

### Run command 

    composer require julio101290/boilerplatbackup

### Run command for migration and seeder

	php spark boilerplatebackup:installbackup
 
### Config michalsn/codeigniter4-uuid
Download this repo and then enable it by editing app/Config/Autoload.php and adding the Michalsn\UuidModel namespace to the $psr4 array. For example, if you copied it into app/ThirdParty:

	<?php
	
	$psr4 = [
	'Config'      => APPPATH . 'Config',
	APP_NAMESPACE => APPPATH,
	'App'         => APPPATH,
	'Michalsn\Uuid' => APPPATH . 'ThirdParty/codeigniter4-uuid/src',
	];

### Make the menu
![image](https://github.com/user-attachments/assets/62864d9c-d596-4a26-a3af-04c691b19f31)



# Ready
![image](https://github.com/user-attachments/assets/17555945-06de-43f8-8755-40dc8272948f)


Usage
-----
You can find how it works with the read code routes, controller and views etc. Finnally... Happy Coding!

Changelog
--------
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

Contributing
------------
Contributions are very welcome.

License
-------

This package is free software distributed under the terms of the [MIT license](LICENSE.md).
