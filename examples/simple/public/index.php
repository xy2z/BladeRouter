<?php

	// Simple example of BladeRouter

	require_once '../vendor/autoload.php';


	use xy2z\BladeRouter\BladeRouter;

	$BladeRouter = new BladeRouter;

	$BladeRouter->not_found_view = '404'; // Renders ../views/404.blade.php

	$BladeRouter->views_dir = __DIR__ . '/../views';
	$BladeRouter->cache_dir = __DIR__ . '/../cache';

	// Add routes
	$BladeRouter->addRoute('GET', '/', 'home'); // Renders ../views/home.blade.php
	$BladeRouter->addRoute('GET', '/about', 'about'); // Renders ../views/about.blade.php

	// Variables will be available for all views.
	$BladeRouter->global_template_vars = [
		'version' => '1.3.0'
	];

	// Render view.
	$BladeRouter->render();
