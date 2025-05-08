[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplatecfdi/v/stable)](https://packagist.org/packages/julio101290/boilerplatecfdi) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplatecfdi/downloads)](https://packagist.org/packages/julio101290/boilerplatecfdi) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplatecfdi/v/unstable)](https://packagist.org/packages/julio101290/boilerplatecfdi) [![License](https://poser.okvpn.org/julio101290/boilerplatecfdi/license)](https://packagist.org/packages/julio101290/boilerplatecfdi)

![image](https://github.com/user-attachments/assets/f18c88d6-94d3-4015-85a7-7b96466da66d)


## CodeIgniter 4 Boilerplate CFDI
Library for the administration of CFDI Mexican electronic invoices, printing, uploading, downloading, etc.

## Requirements
* PhpCfdi\SatCatalogos
* julio101290/boilerplatelog
* hermawan/codeigniter4-datatables
* phpcfdi/cfditopdf
* phpcfdi/cfdi-to-json"
* phpcfdi/xml-cancelacion

## Installation

### Run commands
	
 	composer require phpcfdi/sat-catalogos

   	composer require hermawan/codeigniter4-datatables

    	composer require julio101290/boilerplatelog

	composer require julio101290/boilerplatecompanies

  	composer require julio101290/boilerplatestorages

	composer require julio101290/boilerplatetypesmovement

	composer require julio101290/boilerplatecfdi


### Run command for migration and seeder

	php spark boilerplatecompanies:installcompaniescrud

 	php spark boilerplatelog:installlog

  	php spark boilerplatestorages:installstorages

	php spark boilerplatetypesmovement:installtypesmovement

	php spark boilerplatequotes:installquotes

  	php spark boilerplatecfdi:installcfdi 
	

# Make the Menu, Example

![image](https://github.com/user-attachments/assets/12755ccd-2c48-47bf-8445-abb950f69eca)


# Ready

![image](https://github.com/user-attachments/assets/410426ed-6c8d-430a-bc87-daa62640e69e)

![image](https://github.com/user-attachments/assets/f8e7f2df-1ba0-427c-8653-cf52d0d0fc7a)

![image](https://github.com/user-attachments/assets/b660473a-38bf-4e72-8bf7-5531b68fd17f)

![image](https://github.com/user-attachments/assets/e012bed0-b2dc-4317-8ce1-239f2e6d3e1d)



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
