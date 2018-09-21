<?php

require '../vendor/xy2z/blader-core/src/init.php';

// Add routes
$blader->addRoute('GET', '/', 'home'); // Renders '../resources/views/home.blade.php'
$blader->not_found_view = '404'; // Renders '../resources/views/404.blade.php'

// Variables available in all views.
$blader->global_vars = [];

// Render view.
$blader->render();
