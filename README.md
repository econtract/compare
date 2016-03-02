E-Contract BVBA - Compare package
=============================================

This package offers the integration of the Aanbieders.be comparison collection API. This API can be used by partners and affiliates of Aanbieders to leverage information from the Aanbieders comparison calculation engine on their own websites.




## Installation

Pull this package in through Composer:

```js

    {
        "require": {
            "econtract/compare": "2.*"
        }
    }

```

Next, you will need to add several values to your `.env` file:

```

    API_staging=false                       // Is this a staging server?
    API_key=your_public_api_key             // Public API key
    API_secret=your_secret_api_key          // Private API key

```

In order to use the API (and thus this package), an API key is required. If you are in need of such a key, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).


### Laravel installation

Add the service provider to your `config/app.php` file:

```php

    'providers'             => array(

        //...
        \Econtract\Compare\CompareServiceProvider::class,

    )

```

Add the API as an alias to your `config/app.php` file

```php

    'facades'               => array(

        //...
        'Api'                   => \Econtract\Compare\Facades\Compare::class,

    ),

```





## Usage

### Laravel usage

You can access the API using the alias you have selected in your `config/app.php` file:

```php
    
    $products = Api::getProducts(
        array(
            'sg'        => 'consumer',
            'cat'       => 'internet',
            'lang'      => 'nl',
        )
    );

    $suppliers = Api::getSuppliers(
        array(
            'sg'        => 'consumer',
            'cat'       => 'internet',
            'lang'      => 'nl',
        )
    );

    $comparisons = Api::createComparison(
        array(
            'sg'        => 'consumer',
            'cat'       => 'gas',
            'lang'      => 'nl',
            'u'         => '4000',
            'ut'        => 'kwh',
            'zip'       => '3540',
            't'         => 'no',
            'd'         => '0',
        )
    );

```

For information regarding all possible parameters and their properties, we kindly refer you to [the API documentation](http://apihelp.econtract.be/).


### Non-laravel usage

```php

    include('vendor/autoload.php');

    use Econtract/Compare/CompareService;


    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();


    $compareService = new CompareService();
    $compareService->getProducts(
        array(
            'sg'        => 'consumer',
            'cat'       => 'internet',
            'lang'      => 'nl'
        )
    );

```




## License

This package is proprietary software and may not be copied or redistributed without explicit permission.




## Contact

Evert Engelen (owner)

- Email: evert@aanbieders.be


Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57