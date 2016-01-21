# mallow/testing

## Install

  composer require mallow/testing

## Define Providers in config/app.php

  Mallow\Testing\MallowTestingLayout::class,

## Usage

  Paste your testing code in vendor/mallowphp/testing/src/commands/LayoutTest.php

  Then run command,

  php artisan mallow:test {Name of your test class}