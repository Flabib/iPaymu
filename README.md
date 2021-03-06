iPaymu-php
==============

The easiest way to integrate your website into [iPaymu payment gateway](https://ipaymu.com).

[![Build Status](https://travis-ci.org/flabib/ipaymu.svg?branch=master)](https://travis-ci.org/flabib/ipaymu)
[![Latest Stable Version](https://poser.pugx.org/flabib/ipaymu/v/stable)](https://packagist.org/packages/flabib/ipaymu)
[![Total Downloads](https://poser.pugx.org/flabib/ipaymu/downloads)](https://packagist.org/packages/flabib/ipaymu)
[![Latest Unstable Version](https://poser.pugx.org/flabib/ipaymu/v/unstable)](https://packagist.org/packages/flabib/ipaymu)
[![License](https://poser.pugx.org/flabib/ipaymu/license)](https://packagist.org/packages/flabib/ipaymu)
[![StyleCI](https://github.styleci.io/repos/59740344/shield?branch=master)](https://github.styleci.io/repos/59740344)

## Installation
The best way to use this package is using [composer](https://getcomposer.org/)
```
composer require flabib/ipaymu
```

## Usage

### Initialization
```php
<?php
use Flabib\iPaymu\iPaymu;

$production = true; // Set to false for sandbox
$iPaymu = new iPaymu('your-api-key', $production);
```

### Set URL
```php
$iPaymu->setURL([
    'ureturn' => 'https://your-website',
    'unotify' => 'https://your-website',
    'ucancel' => 'https://your-website',
]);
```

### Set Buyer
```php
<?php
$iPaymu->setBuyer([
    'name' => 'your-name',
    'phone' => 'your-phone',
    'email' => 'your-email',
]);
```

### Check API Key Validity
```php
$iPaymu->isApiKeyValid();
```

### Check Balance
```php
$iPaymu->checkBalance();
```

### Add Product to Cart
```php
$cart = $iPaymu->addCart([
    'name' => 'product-name',
    'quantity' => 'product-quantity',
    'price' => 'product-price',
]);
```

### Pay Cstore
Please add product to cart first before using this method
```php
$cart = $iPaymu->payCstore('indomaret/alfamart');
```

### Pay VA
```php
$cart = $iPaymu->payVA('cn/bni/bag/mandiri');
```

### Pay Bank
```php
$cart = $iPaymu->payBank();
```

### Check Transaction Status
```php
$iPaymu->checkTransaction("transaction-id");
```

## Authors

* **Fahdi Labib** - *Forked From* - [frankyso/iPaymu](https://github.com/frankyso/iPaymu)

See also the list of [contributors](https://github.com/flabib/iPaymu/contributors) who participated in this project.
