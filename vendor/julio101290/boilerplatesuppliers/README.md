[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplatesuppliers/v/stable)](https://packagist.org/packages/julio101290/boilerplatesuppliers) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplatesuppliers/downloads)](https://packagist.org/packages/julio101290/boilerplatesuppliers) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplatesuppliers/v/unstable)](https://packagist.org/packages/julio101290/boilerplatesuppliers) [![License](https://poser.okvpn.org/julio101290/boilerplatesuppliers/license)](https://packagist.org/packages/julio101290/boilerplatesuppliers)

## CodeIgniter 4 Boilerplate Suppliers
CodeIgniter4 Boilerplatesuppliers CRUD MVC for capture suppliers, with fields as companie, firstname, lastname and fields for CDFI 4.0


## Requirements
* PhpCfdi\SatCatalogos
* julio101290/boilerplatelog
* hermawan/codeigniter4-datatables

## Installation

### Run commands
	
 	composer require phpcfdi/sat-catalogos

   	composer require hermawan/codeigniter4-datatables

    	composer require julio101290/boilerplatelog

	composer require julio101290/boilerplatecompanies

  	composer require julio101290/boilerplatesuppliers

### Run command for migration and seeder

	php spark boilerplatecompanies:installcompaniescrud

 	php spark boilerplatelog:installlog

  	php spark boilerplatestorages:installstorages

	php spark boilerplatesuppliers:installsuppliers

# Make the Menu, Example

![image](https://github.com/user-attachments/assets/e258efbc-b0e2-416d-b1b2-4cdfb2f053c9)


# Ready

![image](https://github.com/user-attachments/assets/5a1166a2-dcf3-4fc8-a64d-b8fdef71c80f)


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
