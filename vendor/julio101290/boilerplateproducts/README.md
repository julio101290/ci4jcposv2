[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplateproducts/v/stable)](https://packagist.org/packages/julio101290/boilerplateproducts) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplateproducts/downloads)](https://packagist.org/packages/julio101290/boilerplateproducts) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplateproducts/v/unstable)](https://packagist.org/packages/julio101290/boilerplateproducts) [![License](https://poser.okvpn.org/julio101290/boilerplateproducts/license)](https://packagist.org/packages/julio101290/boilerplateproducts)

![miniatura](https://github.com/user-attachments/assets/97c1d071-6f6c-44fe-89f2-bd2eb76c7310)


## CodeIgniter 4 Boilerplate Products CFDI V4.0
CodeIgniter4 Boilerplateproducts CRUD MVC contain capture category and producto CRUD per companie, contain name, admin inventory, SAT Fields invoices


## Requirements
* PhpCfdi\SatCatalogos
* julio101290/boilerplatelog
* hermawan/codeigniter4-datatables
* julio101290/boilerplatecompanies
* julio101290/boilerplatebranchoffice

## Installation

### Run commands
	
 	composer require phpcfdi/sat-catalogos

   	composer require hermawan/codeigniter4-datatables

     	composer require julio101290/boilerplatelog

	composer require julio101290/boilerplatecompanies

 	composer require julio101290/boilerplatebranchoffice

   	composer require julio101290/boilerplateproducts

### Run command for migration and seeder

	php spark boilerplatecompanies:installcompaniescrud

 	php spark boilerplatelog:installlog

  	php spark boilerplatebranchoffice:installbranchoffice

 	php spark boilerplateproducts:installproducts

 ### BaseController.php Config

 Add SAT Catalogos Factory and use global variabes from conection DNS with SQLite

 like

	 <?php
	
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	use CodeIgniter\HTTP\CLIRequest;
	use CodeIgniter\HTTP\IncomingRequest;
	use CodeIgniter\HTTP\RequestInterface;
	use CodeIgniter\HTTP\ResponseInterface;
	use Psr\Log\LoggerInterface;
 	//ADD
	use PhpCfdi\SatCatalogos\Factory;
	
	/**
	 * Class BaseController
	 *
	 * BaseController provides a convenient place for loading components
	 * and performing functions that are needed by all your controllers.
	 * Extend this class in any new controllers:
	 *     class Home extends BaseController
	 *
	 * For security be sure to declare any new methods as protected or private.
	 */
	abstract class BaseController extends Controller
	{
	    /**
	     * Instance of the main Request object.
	     *
	     * @var CLIRequest|IncomingRequest
	     */
	    protected $request;
	
	    /**
	     * An array of helpers to be loaded automatically upon
	     * class instantiation. These helpers will be available
	     * to all other controllers that extend BaseController.
	     *
	     * @var array
	     */
	    protected $helpers = [];
	    public $catalogosSAT;
	    public $unidadesSAT;
	    /**
	     * Be sure to declare properties for any property fetch you initialized.
	     * The creation of dynamic property is deprecated in PHP 8.2.
	     */
	    // protected $session;
	
	    /**
	     * Constructor.
	     */
	    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	    {
	        // Do Not Edit This Line
	        parent::initController($request, $response, $logger);
	
	        // Preload any models, libraries, etc, here.
	
	        // E.g.: $this->session = \Config\Services::session();
	        
	        date_default_timezone_set("America/Mazatlan");
	
		//ADD
	        $dsn = "sqlite:".ROOTPATH."writable/database/catalogossat.db";
	        $factory = new Factory();
	        $satCatalogos = $factory->catalogosFromDsn($dsn);
	        $this->catalogosSAT = $satCatalogos;
	        
	       
	       
	    }
	}

 
### Make folder and download Database SAT Catalogs
* Download and uncompress the file https://github.com/phpcfdi/resources-sat-catalogs/releases/latest/download/catalogs.db.bz2
* Put in the folder writable/database/catalogossat.db

### Make the menu Category
![image](https://github.com/user-attachments/assets/ae27afee-fe2d-4f28-9556-bde49f305105)

### Make the menu Products
![image](https://github.com/user-attachments/assets/357c23f7-a801-4ee9-8e96-6cd5ed4dcc3d)


# Ready

![image](https://github.com/user-attachments/assets/45bfe8be-8b4d-49bc-a1a9-8119beacb480)


![image](https://github.com/user-attachments/assets/02d65119-62b4-4040-984c-aae92f763c34)

![image](https://github.com/user-attachments/assets/cff9b80b-742e-4c5d-8504-e1b1e543c0c2)


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
