# Blader

A lightweight template router.

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


## Examples
*public/index.php*
```php
require '../vendor/xy2z/blader-core/src/init.php';

$blader->addRoute('GET', '/', 'home'); // Renders '/views/home.blade.php'
$blader->addRoute('GET', '/about', 'about'); // Renders '/views/about.blade.php'

$blader->render();
```

*views/home.blade.php*
```blade
@extends('layout') {{-- Extends '/views/layout.blade.php' --}}

@section('content')
	Welcome!
@endsection
```

More examples coming soon.

## Credits

- [nikic/FastRoute](https://github.com/nikic/FastRoute)
- [EFTEC/BladeOne](https://github.com/EFTEC/BladeOne/)
