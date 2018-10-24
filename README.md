# Blader

A lightweight microframework for static websites.

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


## Usage
```php
require '../vendor/xy2z/blader-core/src/init.php';

$blader->addRoute('GET', '/', 'home'); // Renders '../views/home.blade.php'
$blader->addRoute('GET', '/about', 'about'); // Renders '../views/about.blade.php'
$blader->not_found_view = '404'; // Renders '../views/404.blade.php' on 404.

$blader->render();
```

That's it.


## Credits

- [nikic/FastRoute](https://github.com/nikic/FastRoute)
- [EFTEC/BladeOne](https://github.com/EFTEC/BladeOne/)
