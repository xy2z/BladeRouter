# Blader

A lightweight microframework for static websites.

Using [BladeOne](https://github.com/EFTEC/BladeOne/) - a standalone version of Laravel's blade template engine.

## Install
```
composer require xy2z/blader
```

Requires PHP 7.0 or above.

## Usage

**index.php**

```php
require_once '../vendor/autoload.php';

use xy2z\Blader\Blader;

$blader = new Blader;
$blader->views_dir = __DIR__ . '/../views';
$blader->cache_dir = __DIR__ . '/../cache';

// Add routes
$blader->addRoute('GET', '/', 'home'); // Renders ../views/home.blade.php
$blader->addRoute('GET', '/about', 'about'); // Renders ../views/about.blade.php
$blader->not_found_view = '404'; // Renders ../views/404.blade.php on 404.

// Variables available in all views.
$blader->global_vars = [
	'version' => '1.3.0'
];

// Render view.
$blader->render();
```

See more in the [examples](https://github.com/xy2z/Blader/tree/master/examples) dir.


## Credits

- [nikic/FastRoute](https://github.com/nikic/FastRoute)
- [EFTEC/BladeOne](https://github.com/EFTEC/BladeOne/)
