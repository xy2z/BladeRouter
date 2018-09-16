<?php

	// Simple example of Blader
	require_once '../vendor/autoload.php';

	use xy2z\Blader\Blader;

	$blader = new Blader;

	$blader->views_dir = __DIR__ . '/../views';
	$blader->cache_dir = __DIR__ . '/../cache';

	// Add routes
	$blader->addRoute('GET', '/', 'home'); // Renders ../views/home.blade.php
	$blader->addRoute('GET', '/about', 'about'); // Renders ../views/about.blade.php
	$blader->not_found_view = '404'; // Renders ../views/404.blade.php

	// Variables will be available for all views.
	$blader->global_template_vars = [
		'version' => '1.3.0'
	];

	// Render view.
	$blader->render();
