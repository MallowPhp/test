# mallow/testing

## Install

  composer require mallow/testing dev-master

## Define the Service Providers in config/app.php

```php

  Mallow\Testing\MallowTestingLayout::class,

```php

## Usage

  - There is a default TestcaseLayout in /vendor/mallowphp/testing/src/BaseTestcase/LayoutTest.php .
  - The default layout is defined for checking the API in JSON.So the input and output must be in JSON.
  - You can also define your custom layout.Paste your testing code in /vendor/mallowphp/testing/src/BaseTestcase/LayoutTest.php .But,define it with class called "LayoutTest".
  - Then run command,

    ```bash

      php artisan mallow:test {Name of your test class}

    ```bash

  - This testing is for testing your basic CRUD and the responses you get after the POST,PUT data into database.