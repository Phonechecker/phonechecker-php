Phonechecker PHP Library
============
This library provides a simple api to integrate with Phonechecker and validate phone numbers.

Install with Composer
------------
```
composer require phonechecker/phonechecker-php
```

Now you can start validating your numbers:

```php
<?php
// import dependencies
require 'vendor/autoload.php';

// get the Phonechecker Client instance, replace with your project token
$phoneCheckerClient = new Client("PHONECHECKER_TOKEN");

// validate a number
$phoneCheckerClient->validationSyntax("55", "11", "934748118"); 
```
## Quick Examples
Checks if a number has whatsapp
```php
$phoneCheckerClient->validationWhatsapp("55", "11", "934748118"); 
```

Checks if a number rings and someone answers
```php
$phoneCheckerClient->validationLiveness("55", "11", "934748118"); 
```

Complete validation
```php
$phoneCheckerClient->validationComplete("55", "11", "934748118"); 
```

Usage notes
-------------
So far phonechecker only supports Brazil numbers, so the DDI must always be "55"

API Documentation
-------------
* <a href="https://app.swaggerhub.com/apis-docs/PhoneChecker/api/1.0.0-oas3" target="_blank">Full API Reference</a>
