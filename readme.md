# mallow/testing

## Install

  composer require mallow/testing dev-master

## Define the Service Providers in config/app.php

     Mallow\Testing\MallowTestingLayout::class,

## Usage

  1. There is a default TestcaseLayout in /vendor/mallowphp/testing/src/BaseTestcase/LayoutTest.php .
  2. The default layout is defined for checking the API in JSON.So the input and output must be in JSON.
  3. You can also define your custom layout.Paste your testing code in /vendor/mallowphp/testing/src/BaseTestcase/LayoutTest.php .But,define it with class called "LayoutTest".
  4. If you want to run testcases without storing data in your main database.You can run following command(optional)
      **php artisan mallow:local-test
     This will automatically run the testcases in local memory without storing in your original database.
  5. Then run command,
      **php artisan mallow:test {Name of your test class}**
  6. This testing is for testing your basic CRUD and the responses you get after the POST,PUT data into database.