# Blader

A lightweight template router - for websites with minimal dynamic needs.

Using [BladeOne](https://github.com/EFTEC/BladeOne/) - a standalone version of Laravel's blade template engine.

## Install
```
composer create-project xy2z/blader mysite
cd mysite/public
php -S 127.0.0.1:81
```

Go to http://127.0.0.1:81


### Requirements

- PHP 7.0 or above.


## Basic Usage
```php
require '../vendor/xy2z/blader-core/src/init.php';

$blader->addRoute('GET', '/', 'home'); // Renders '../views/home.blade.php'
$blader->addRoute('GET', '/about', 'about'); // Renders '../views/about.blade.php'

$blader->not_found_view = '404'; // Renders '../views/404.blade.php' on 404.

$blader->render();
```

That's it.


## Features

#### Global variables
In your `/public/index.php`, add:

```php
$blader->global_vars = [
	'foo' => 'bar',
];
```

#### Config
A default config file is added in `config/app.php`. You can delete this if you don't need it.

You can add as many files here as you want. `PHP`, `INI` and `JSON` files are supported.

You can access the config everywhere by calling `Config::get('filename.key')`.

Use `Config::get('app.name')` to access the `name` key in `config/app.php`:


#### Route specific headers
```php
$blader->addRoute('GET', '/rss', 'rss', function() {
	header('Content-type: application/rss+xml; charset=utf-8');
});
```

#### Adding route specific variables
```php
$blader->addRoute('GET', '/rss', 'rss', function() {
	// Return all variables you want in the view.
	return [
		'foo' => 'bar',
	];
});

// 'views/rss.blade.php' can now print $foo
```


## Credits

- [nikic/FastRoute](https://github.com/nikic/FastRoute)
- [EFTEC/BladeOne](https://github.com/EFTEC/BladeOne/)
