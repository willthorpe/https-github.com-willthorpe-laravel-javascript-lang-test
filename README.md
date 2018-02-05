# Laravel JavaScript Lang

[![Packagist](https://img.shields.io/packagist/v/Pod-Point/laravel-javascript-lang.svg)](https://packagist.org/packages/pod-point/laravel-javascript-lang)

A Laravel package that exposes translations to JavaScript.

## Installation

Require the package in composer:

```javascript
"require": {
    "pod-point/laravel-javascript-lang": "^1.0"
},
```

Add the service provider to your `config/app.php` providers array:

```php
'providers' => [
    PodPoint\JsLang\Providers\ServiceProvider::class
]
```

Then finally, publish the config files:

```php
php artisan vendor:publish --provider="PodPoint\JsLang\Providers\ServiceProvider"
```

## Usage

Now the varable `$jslang` is available in your view. We recommend attaching it to a data tag on your body element:

```html
<body data-jslang='{{ $jslang }}'>
```

There is a provided JavaScript module with a helper method you can use to retrieve the translations:

```js
import jsLang from '../lib/jslang';

const string = jsLang.get('orders.form.error');
```

Or you can get the data yourself:

```js
JSON.parse(document.body.getAttribute('data-jslang'))
```
